@extends('layout.front')
@section('content')
    <section class="section section--first section--bg" data-bg="{{asset('front/img/section.jpg')}}" style="background: url('{{asset('front/img/section.jpg')}}') center center / cover no-repeat;">
        <div class="container">
            <div class="row">
                <div class="col-12 p-5">
                    <div class="section__wrap">
                        <!-- section title -->
                        <h2 class="section__title">Checkout</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">Checkout</li>
                        </ul>
                        <!-- end breadcrumb -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sign__content section--bg" style="background: #151419">
        <div class="container ">
            <div class="row">

                <div class="col-lg-8 bg-white my-1">

                    <div class="row mb-2">

                        <div class="col-12">
                            <h1>Olá {{ auth()->user()->name }}!</h1>
                            <p>Preencha os campos abaixo para concluir a sua assinatura!</p>
                        </div>

                    </div>

                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="form-checkout">
                                <h2>Cartão de crédito</h2>

                                <div id="error-handling" style="display: none">
                                    <div class="alert alert-danger my-3">
                                        <p><strong>Erro:</strong></p>
                                        <p id="error-message"></p>
                                    </div>
                                </div>

                                <input type="text" id="card-holder-name" name="card-name" value="{{ auth()->user()->name . ' ' .auth()->user()->lastname }}" placeholder="Titular do cartão" required>
                                <div id="card-element"></div>  <!-- Stripe Elements Placeholder -->
                                <button id="card-button" data-secret="{{ $intent->client_secret }}">
                                    Continuar pagamento
                                </button>
                            </div>
                        </div>

                        <!--Advises-->
                        <div class="col-md-6 mt-3 mt-md-0">

                            @if (auth()->user()->activePlan() != false && auth()->user()->activePlan()->details->value != 0)
                                <div class="alert alert-danger">
                                    <p><strong>Atenção!</strong><br>você possui plano ativo.</p>
                                    <ul class="mb-1">
                                        <li>Plano <strong>{{ auth()->user()->activePlan()->details->title }}</strong>
                                            <ol>
                                                <li><strong>Início:</strong> {{auth()->user()->activePlan()->start->format('d/m/Y H:i') }}</li>
                                                <li><strong>Fim:</strong> {{auth()->user()->activePlan()->end->format('d/m/Y H:i') }}</li>
                                            </ol>
                                        </li>
                                    </ul>
                                    <p>
                                        Ao continuar com essa transação, você perderá o
                                        tempo restante de
                                        <span>
                                            <strong>
                                                {{ now()->diffforHumans(auth()->user()->activePlan()->end, \Carbon\CarbonInterface::DIFF_ABSOLUTE)}}
                                            </strong>
                                        </span>
                                        do seu plano atual e entrará em vigor o novo plano.</p>
                                </div>
                            @endif
                            <div class="text-center">
                                <h2>Transação segura!</h2>
                                <span>Os dados do seu cartão não serão salvos em nossa plataforma.</span>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4">
                    <x-plans checkout="true" :plan="$plan" />
                </div>

            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite('resources/js/components/swal.js')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('pk_test_51MY9c2IifhVbSWuFzEFgIURewbIFIoLvJJYM6SKEk77zCLBVsZ1ENEbkJwcs4qqkML74VKnoLGqwuxoLAbzoMXKX00OORYYUNC');
        const elements = stripe.elements();
        const cardStyle = {
            style: {
                base: {
                    color: "#32325d",
                    fontFamily: 'Arial, sans-serif',
                    fontSmoothing: "antialiased",
                    fontSize: "16px",
                    "::placeholder": {
                        color: "#32325d"
                    }
                },
                invalid: {
                    fontFamily: 'Arial, sans-serif',
                    color: "#fa755a",
                    iconColor: "#fa755a"
                }
            },
        }

        const cardElement = elements.create('card', cardStyle);
        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {

            cardButton.innerHTML = 'Aguarde...'
            cardButton.setAttribute('disabled', 'disabled')

            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {

                cardButton.innerHTML = 'Continuar pagamento'
                cardButton.removeAttribute('disabled')

                stripeErrorHandling({type: 'stripe', error: error});
            } else {

                axios.post('{{route('front.checkout.process')}}', {

                    'intent' : setupIntent,
                    'plan' : '{{ encrypt($plan->id) }}'

                })
                .then(res => {

                    Swal.fire('Sucesso!', 'Assinatura realizada com sucesso.', 'success')
                        .then(() => {
                            location.href = "{{ route('front.auth.profile') }}"
                        })

                })
                .catch(error => {

                    stripeErrorHandling({type: 'platform', error: error.message});

                })
            }
        });

        let stripeErrorHandling = (error) => {
            switch(error.type){

                case "stripe":
                    showingError(error.error.message)
                    Swal.fire('Erro!', error.error.message, 'error')
                break;

                case "platform":
                    Swal.fire('Erro!', error.error.message, 'error')
                        .then(() => {
                            location.reload()
                        })
                break;

            }
        }

        let showingError = (message) => {
            let error_handling = document.getElementById('error-handling');
            let error_message = document.getElementById('error-message');

            error_handling.style="display:block;";
            error_message.innerHTML = message;
        }

    </script>
@endpush
