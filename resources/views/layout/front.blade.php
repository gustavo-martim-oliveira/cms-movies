<!DOCTYPE html>
<html lang="pt-BR">
@include('front.inc.head')

<body class="body">
	@include('front.inc.header')

	@yield('content')

	@include('front.inc.footer')
    @include('front.inc.scripts')
</body>

</html>
