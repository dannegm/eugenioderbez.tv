<!doctype html>
<html>
<head>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<script src="{{URL::asset('/panel/materialize/js/materialize.min.js')}}"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/mustache.js/0.8.1/mustache.min.js"></script>
	<script src="{{URL::asset('/panel/js/persist.js')}}"></script>
	<script src="{{URL::asset('/panel/js/sweet.js')}}"></script>
	@section('scripts')

	@show

	<script src="{{URL::asset('/panel/js/index.js')}}"></script>

	<link rel="stylesheet" href="{{URL::asset('/panel/materialize/css/materialize.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('/panel/css/sweet.css')}}">
	@section('styles')

	@show

	<link rel="stylesheet" href="{{URL::asset('/panel/css/style.css')}}">
	<title>{{$title}} | Dashboard</title>
</head>
<body>
	@section('sidebar')
		<header>
			<ul class="side-nav fixed">
				@if(Auth::check())
				<li class="avatar">
					<img src="{{URL::asset('/panel/img/avatarPlaceholder.png')}}" />
					<h1>{{Auth::user()->name}}</h1>
					<h2><span>@</span>{{Auth::user()->username}}</h2>
				</li>
				@endif
				<li class="bold">
					<a href="{{route('appanel')}}" class="waves-effect waves-teal">
						<i class="mdi-action-home"></i> Inicio
					</a>
				</li>
				<li class="bold">
					<a href="{{route('appanel.nota.index')}}" class="waves-effect waves-teal">
						<i class="mdi-editor-format-quote"></i> Notas
					</a>
				</li>
				<li class="bold">
					<a href="{{route('appanel.video.index')}}" class="waves-effect waves-teal">
						<i class="mdi-av-videocam"></i> Videos
					</a>
				</li>
				<li class="bold">
					<a href="{{route('appanel.meme.index')}}" class="waves-effect waves-teal">
						<i class="mdi-hardware-keyboard-alt"></i> Memes
					</a>
				</li>

			<li class="separator"></li>

				<li class="bold">
					<a href="{{route('appanel.picture.index')}}" class="waves-effect waves-teal">
						<i class="mdi-image-camera-alt"></i> Imágenes
					</a>
				</li>
				<li class="bold">
					<a href="{{route('appanel.category.index')}}" class="waves-effect waves-teal">
						<i class="mdi-action-dashboard"></i> Categorías
					</a>
				</li>
				<li class="bold">
					<a href="{{route('appanel.user.index')}}" class="waves-effect waves-teal">
						<i class="mdi-action-account-child"></i> Usuarios
					</a>
				</li>

			<li class="separator"></li>

				<li class="bold">
					<a href="{{route('appanel.client.index')}}" class="waves-effect waves-teal">
						<i class="mdi-editor-attach-money"></i> Clientes
					</a>
				</li>

			<li class="separator"></li>

				<li class="bold">
					<a href="{{route('logout')}}" class="waves-effect waves-teal">
						<i class="mdi-action-exit-to-app"></i> Salir
					</a>
				</li>
			</ul>
		</header>
	@show

	@section('content')
	@show
</body>
</html>





