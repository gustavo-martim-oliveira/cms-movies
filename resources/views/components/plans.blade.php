<div class="row row--grid">
    @forelse ($plans as $plan)
        <!-- price -->
        <div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
            <div class="price {{ $plan->value != 0 ? 'price--premium' : '' }}">

                <div class="price__item price__item--first"><span>{{$plan->title}}</span> <span>{{ $plan->value != 0 ? 'R$ ' . number_format($plan->value, 2, ',', '.') : 'Grátis' }}</span></div>
                <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> {{ $plan->period != 0 ? $plan->period . ($plan->period > 1 ? '/Meses': '/Mês') : 'S/prazo' }} </span></div>
                <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Até {{ $plan->configuration['video_size'] == 'infinite' ? '4K' : $plan->configuration['video_size'] }}</span></div>

                @if($plan->configuration['rating'] == 'true')
                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Avaliações</span></div>
                @else
                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Avaliações</span></div>
                @endif

                @if($plan->configuration['comments'] == 'true')
                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Comentários</span></div>
                @else
                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Comentários</span></div>
                @endif

                @if($plan->configuration['upload_download'] == 'true')
                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Enviar/Download de vídeos</span></div>
                @else
                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Enviar/Download de vídeos</span></div>
                @endif

                @if($plan->configuration['support'] == 'true')
                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> S/Suporte</span></div>
                @else
                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> S/Suporte</span></div>
                @endif

                <a href="{{ route('front.checkout', $plan->id) }}" class="price__btn">Escolher plano</a>

            </div>
        </div>
        <!-- end price -->
    @empty
        <p>Nenhum plano para ser ativado no momento!</p>
    @endforelse

</div>
