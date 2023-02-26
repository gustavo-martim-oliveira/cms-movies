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
            <div class="row ">
                <div class="col-lg-8" style="background: #FFF">
                    <input id="card-holder-name" type="text">

                    <!-- Stripe Elements Placeholder -->
                    <div id="card-element"></div>

                    <button id="card-button" data-secret="{{ $intent->client_secret }}">
                        Update Payment Method
                    </button>
                </div>
                <div class="col-lg-4">
                    <x-plans checkout="true" :plan="$plan" />
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        const stripe = Stripe('stripe-public-key');

        const elements = stripe.elements();
        const cardElement = elements.create('card');

        cardElement.mount('#card-element');

        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );

            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        });
    </script>
@endpush
