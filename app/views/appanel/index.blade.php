@extends('appanel/template')

@section('content')
<main>
	<nav id="top" class="top-nav">
		<span class="page-title">Inicio</span>
	</nav>

	<!-- Destacados -->
	<div class="row">
		<div class="col s12">
			<div style="position:relative" id="nota" data-send="{{route('appanel.nota.destacados')}}" class="destacados card-panel grey lighten-3 valign-wrapper nota_d">
				<h5 class="valign grey-text text-lighten-1">Aquí contenido principal</h5>
				@foreach($notas as $n)
					<div style="background: url({{URL::asset('pictures/sq/'.$n->img->url)}}) repeat scroll center center transparent;" data-id="{{$n->id}}" class="list">
						<h3>{{$n->title}}</h3>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- Destacados -->
	<div class="row">
		<div class="col s12">
			<div style="position:relative" id="video" data-send="{{route('appanel.video.destacados')}}" class="destacados card-panel grey lighten-3 valign-wrapper video_d">
				<h5 class="valign grey-text text-lighten-1">Aquí contenido principal</h5>
				@foreach($videos as $v)
					<div style="background: url({{URL::asset('pictures/sq/'.$v->img->url)}}) repeat scroll center center transparent;" data-id="{{$v->id}}" class="list">
						<h3>{{$v->title}}</h3>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="#" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
		<ul>
			<li><a href="nota/create" class="btn-floating blue tooltipped" data-position="left" data-delay="1" data-tooltip="Nueva nota"><i class="large mdi-editor-format-quote"></i></a></li>
			<li><a href="video/create" class="btn-floating green tooltipped" data-position="left" data-delay="1" data-tooltip="Nuevo video"><i class="large mdi-av-videocam"></i></a></li>
			<li><a href="meme/create" class="btn-floating orange tooltipped" data-position="left" data-delay="1" data-tooltip="Nuevo meme"><i class="large mdi-hardware-keyboard-alt"></i></a></li>
		</ul>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
			</div>
		</div>
		<div class="footer-copyright">
			<div class="row">
				<div class="col s12">
					<span>© 2015 AMB Multimedia</span>
				</div>
			</div>
		</div>
	</footer>

</main>
@stop