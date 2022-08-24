@extends('layout.front')
@section('content')
    <!-- page title -->
	<section class="section section--first section--bg" data-bg="{{asset('front/img/section.jpg')}}">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section__wrap">
						<!-- section title -->
                        <h2 class="section__title">Meu perfil</h2>
                        <!-- end section title -->

                        <!-- breadcrumb -->
                        <ul class="breadcrumb">
                            <li class="breadcrumb__item"><a href="{{route('front.index')}}">Home</a></li>
                            <li class="breadcrumb__item breadcrumb__item--active">Meu perfil</li>
                        </ul>
                        <!-- end breadcrumb -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end page title -->

    <!-- content -->
	<div class="content content--profile">
		<!-- profile -->
		<div class="profile">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="profile__content">
							<div class="profile__user">
								<div class="profile__meta">
									<h3>{{ auth()?->user()->name }} {{ auth()?->user()->last_name ?? ''}}</h3>
                                    @if(auth()->user()->isAdmin())
                                        <span><b>{{auth()->user()->currentPlan()}}</b></span>
                                    @else
                                        <span>Plano atual: <b>{{auth()->user()->currentPlan()->details->title }}</b></span>
                                    @endif
								</div>
							</div>

							<!-- content tabs nav -->
							<ul class="nav nav-tabs content__tabs content__tabs--profile" id="content__tabs" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Perfil</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Assinatura</a>
								</li>

								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Configurações</a>
								</li>
							</ul>
							<!-- end content tabs nav -->

							<!-- content mobile tabs nav -->
							<div class="content__mobile-tabs content__mobile-tabs--profile" id="content__mobile-tabs">
								<div class="content__mobile-tabs-btn dropdown-toggle" role="navigation" id="mobile-tabs" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<input type="button" value="Profile">
									<span></span>
								</div>

								<div class="content__mobile-tabs-menu dropdown-menu" aria-labelledby="mobile-tabs">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item"><a class="nav-link active" id="1-tab" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Perfil</a></li>

										<li class="nav-item"><a class="nav-link" id="2-tab" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Assinatura</a></li>

										<li class="nav-item"><a class="nav-link" id="3-tab" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Configurações</a></li>
									</ul>
								</div>
							</div>
							<!-- end content mobile tabs nav -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end profile -->

		<div class="container">
			<!-- content tabs -->
			<div class="tab-content">
				<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="1-tab">
					<div class="row row--grid">

						<!-- stats -->
						<div class="col-12 col-sm-6 col-xl-3">
							<div class="stats">
								<span>Comentários efetuados</span>
								<p><a href="#">2 573</a></p>
								<i class="icon ion-ios-chatbubbles"></i>
							</div>
						</div>
						<!-- end stats -->

						<!-- stats -->
						<div class="col-12 col-sm-6 col-xl-3">
							<div class="stats">
								<span>Avaliações efetuadas</span>
								<p><a href="#">1 021</a></p>
								<i class="icon ion-ios-star-half"></i>
							</div>
						</div>
						<!-- end stats -->

                        <!-- stats -->
						<div class="col-12 col-sm-6 col-xl-3">
							<div class="stats">
								<span>Comentários recebidos</span>
								<p><a href="#">2 573</a></p>
								<i class="icon ion-ios-chatbubbles"></i>
							</div>
						</div>
						<!-- end stats -->

						<!-- stats -->
						<div class="col-12 col-sm-6 col-xl-3">
							<div class="stats">
								<span>Avaliações recebidas</span>
								<p><a href="#">1 021</a></p>
								<i class="icon ion-ios-star-half"></i>
							</div>
						</div>
						<!-- end stats -->

						<!-- dashbox -->
						<div class="col-12 col-xl-6">
							<div class="dashbox">
								<div class="dashbox__title">
									<h3><i class="icon ion-ios-film"></i> Seus vídeos</h3>

									<div class="dashbox__wrap">
										<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
										<a class="dashbox__more" href="#">Ver todos</a>
									</div>
								</div>

								<div class="dashbox__table-wrap">
									<table class="main__table main__table--dash">
										<thead>
											<tr>
												<th>TÍTULO</th>
												<th>CATEGORIA</th>
												<th>DATA DE ENVIO</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- end dashbox -->

						<!-- dashbox -->
						<div class="col-12 col-xl-6">
							<div class="dashbox">
								<div class="dashbox__title">
									<h3><i class="icon ion-ios-star-half"></i> Avaliações em seus vídeos</h3>

									<div class="dashbox__wrap">
										<a class="dashbox__refresh" href="#"><i class="icon ion-ios-refresh"></i></a>
										<a class="dashbox__more" href="#">Ver todos</a>
									</div>
								</div>

								<div class="dashbox__table-wrap">
									<table class="main__table main__table--dash">
										<thead>
											<tr>
												<th>VÍDEO</th>
												<th>AUTOR</th>
												<th>AVALIAÇÃO</th>
                                                <th>DATA DE AVALIAÇÃO</th>
											</tr>
										</thead>
										<tbody>

										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- end dashbox -->
					</div>
				</div>

				<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="2-tab">
                    @if(!auth()->user()->isAdmin())
                        <div class="row row--grid">

                            <!-- price -->
                            <div class="col-12 col-md-6 col-lg-4 order-md-2 order-lg-1">
                                <div class="price">
                                    <div class="price__item price__item--first"><span>Básico</span> <span>Grátis</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> S/prazo</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> 720p</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Avaliações</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Comentários</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Enviar/Download de vídeos</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> S/Suporte</span></div>
                                    <a href="#" class="price__btn">Escolher plano</a>
                                </div>
                            </div>
                            <!-- end price -->

                            <!-- price -->
                            <div class="col-12 col-md-12 col-lg-4 order-md-1 order-lg-2">
                                <div class="price price--premium">
                                    <div class="price__item price__item--first"><span>Premium</span> <span>R$34.99 <sub>/mês</sub></span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> 1 Mês</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> 1080p (Full HD)</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Avaliações</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Comentários</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Enviar/Download de vídeos</span></div>
                                    <div class="price__item price__item--none"><span><i class="icon ion-ios-close"></i> Suporte 24/7</span></div>
                                    <a href="#" class="price__btn">Escolher plano</a>
                                </div>
                            </div>
                            <!-- end price -->

                            <!-- price -->
                            <div class="col-12 col-md-6 col-lg-4 order-md-3">
                                <div class="price price--premium">
                                    <div class="price__item price__item--first"><span>Super Premium</span> <span>R$84.99 <sub>/mês</sub></span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> 1 Mês</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Até 4K</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Avaliações</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Comentários</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Enviar/Download de vídeos</span></div>
                                    <div class="price__item"><span><i class="icon ion-ios-checkmark"></i> Suporte 24/7</span></div>
                                    <a href="#" class="price__btn">Escolher plano</a>
                                </div>
                            </div>
                            <!-- end price -->
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12 d-flex align-items-center justify-content-center flex-column" style="color: #FFF; min-height: 100px">
                                <h2>Somente para clientes.</h2>
                                <h5>Está área é exclusiva somente para os clientes da plataforma.</h5>
                            </div>
                        </div>
                    @endif
				</div>

				<div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="3-tab">
					<div class="row">
						<!-- details form -->
						<div class="col-12 col-lg-6">
							<form action="{{route('front.auth.user.change-profile')}}" method="post" class="form form--profile sendForm">
                                @csrf
                                @method('put')
								<div class="row row--form">
									<div class="col-12">
										<h4 class="form__title">Perfil</h4>
									</div>

									<div class="col-12">
										<div class="form__group">
											<label class="form__label" for="email">Email</label>
											<input id="email" type="text" style="background: transparent !important" disabled readonly class="form__input" value="{{auth()?->user()->email}}" placeholder="{{auth()?->user()->email}}">
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="form__group">
											<label class="form__label" for="firstname">Nome</label>
											<input id="firstname" type="text" name="name" class="form__input" value="{{auth()?->user()->name}}" placeholder="{{auth()?->user()->name}}">
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="form__group">
											<label class="form__label" for="lastname">Sobrenome</label>
											<input id="lastname" type="text" name="last_name" class="form__input" value="{{auth()?->user()->last_name}}" placeholder="{{auth()?->user()->last_name}}">
										</div>
									</div>

									<div class="col-12">
										<button class="form__btn" type="submit">Salvar</button>
									</div>
								</div>
							</form>
						</div>
						<!-- end details form -->

						<!-- password form -->
						<div class="col-12 col-lg-6">
							<form action="{{route('front.auth.user.change-password')}}" method="post" class="form form--profile sendForm">
                                @csrf
                                @method('put')
								<div class="row row--form">
									<div class="col-12">
										<h4 class="form__title">Alterar senha</h4>
									</div>

									<div class="col-12 col-md-12 col-lg-12 col-xl-12">
										<div class="form__group">
											<label class="form__label" for="oldpass">Senha atual</label>
											<input id="oldpass" type="password" name="current_password" required minlength="6" maxlength="40" class="form__input">
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="form__group">
											<label class="form__label" for="newpass">Nova senha</label>
											<input id="newpass" type="password" name="new_password" required minlength="6" maxlength="40" class="form__input">
										</div>
									</div>

									<div class="col-12 col-md-6 col-lg-12 col-xl-6">
										<div class="form__group">
											<label class="form__label" for="confirmpass">Confirme a nova senha</label>
											<input id="confirmpass" type="password" name="confirm_password" required minlength="6" maxlength="40" class="form__input">
										</div>
									</div>

									<div class="col-12">
										<button class="form__btn" type="submit">Alterar senha</button>
									</div>
								</div>
							</form>
						</div>
						<!-- end password form -->
					</div>
				</div>
			</div>
			<!-- end content tabs -->
		</div>
	</div>
	<!-- end content -->

@endsection

@push('scripts')
    @vite('resources/js/components/sendForm.js');
@endpush
