<!-- header -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="header__content">
                    <!-- header logo -->
                    <a href="{{route('front.index')}}" class="header__logo">
                        <img src="{{asset('front/img/logo.svg')}}" alt="">
                    </a>
                    <!-- end header logo -->

                    <!-- header nav -->
                    <ul class="header__nav">

                        <li class="header__nav-item">
                            <a href="{{route('front.index')}}" class="header__nav-link">Home</a>
                        </li>


                        <!-- dropdown -->
                        <li class="header__nav-item">
                            <a class="dropdown-toggle header__nav-link" href="#" role="button" id="dropdownMenuHome" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catálogo <i class="icon ion-ios-arrow-down"></i></a>

                            <ul class="dropdown-menu header__dropdown-menu" aria-labelledby="dropdownMenuHome">
                                <li><a href="#">Ação</a></li>
                                <li><a href="#">Aventura</a></li>
                                <li><a href="#">Terror</a></li>
                            </ul>
                        </li>
                        <!-- end dropdown -->

                        <li class="header__nav-item">
                            <a href="#" class="header__nav-link">Planos</a>
                        </li>


                    </ul>
                    <!-- end header nav -->

                    <!-- header auth -->
                    <div class="header__auth">
                        <form action="#" class="header__search">
                            <input class="header__search-input" type="text" placeholder="Pesquisar...">
                            <button class="header__search-button" type="button">
                                <i class="icon ion-ios-search"></i>
                            </button>
                            <button class="header__search-close" type="button">
                                <i class="icon ion-md-close"></i>
                            </button>
                        </form>

                        <button class="header__search-btn" type="button">
                            <i class="icon ion-ios-search"></i>
                        </button>

                        @guest()
                        <a href="{{route('front.login')}}" class="header__sign-in">
                            <i class="icon ion-ios-log-in"></i>
                            <span>Logar</span>
                        </a>
                        @endguest

                        @auth
                        <a href="{{route('front.logout')}}" class="header__sign-in">
                            <i class="icon ion-ios-log-out"></i>
                            <span>Logout</span>
                        </a>
                        @endauth
                    </div>
                    <!-- end header auth -->

                    <!-- header menu btn -->
                    <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <!-- end header menu btn -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- end header -->
