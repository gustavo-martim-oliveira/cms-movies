@extends('layout.front')
@section('content')
    <section class="sign__content section--bg" data-bg="{{asset('front/img/section.jpg')}}">
        <div class="container ">
            <div class="row ">
                <div class="col-lg-8">
                    Pagamento
                </div>
                <div class="col-lg-4 bg-white">
                    Dados do plano
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    @vite('resources/js/auth/register.js')
@endpush
