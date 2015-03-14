@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Videos</span>
	</nav>

	<!-- Destacados -->
	<div class="row">
		<div class="col s6">
			<h5>Videos destacadas</h5>
			<div style="position:relative" id="nota" data-send="{{route('appanel.video.destacados')}}" class="destacados card-panel grey lighten-3 valign-wrapper video_d">
				<h5 class="valign grey-text text-lighten-1">Arrastra aquí tu contenido destacado</h5>
				@foreach($slider as $s)
					<div style="background: url({{URL::asset('pictures/sq/'.$s->img->url)}}) repeat scroll center center transparent;" data-type="video" data-id="{{$s->id}}" class="list">
						<h3>{{$s->title}}</h3>
						<span class="remove">x</span>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col s6">
			<h5>Home Destacados</h5>
			<div style="position:relative" id="nota" data-send="{{route('appanel.nota.destacadosg')}}" class="destacadosg card-panel grey lighten-3 valign-wrapper video_d">
				<h5 class="valign grey-text text-lighten-1">Arrastra aquí tu contenido destacado</h5>
				@foreach($hslider as $s)
					<div style="background: url({{URL::asset('pictures/sq/'.$s[0]->img->url)}}) repeat scroll center center transparent;" data-type="{{$s[0]->type}}" data-id="{{$s[0]->id}}" class="list">
						<h3>{{$s[0]->title}}</h3>
						<span class="removeg">x</span>
					</div>
				@endforeach
			</div>
		</div>
	</div>

	<!-- Listado -->
	<div class="row">
	@foreach ($videos as $video)
		@if($video->status == 2)
		<div class="col s4 drag" style="opacity:0.3" data-item="{{$video->id}}" id="item-{{$video->id}}">
		@else
		<div class="col s4 drag" data-item="{{$video->id}}" id="item-{{$video->id}}">
		@endif
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="{{URL::asset('pictures/sq/'.$video->img->url)}}">
					<span class="card-title">{{$video->title}}</span>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">{{$video->categoria->name}} <i class="mdi-navigation-more-vert right"></i></span>
					<p>{{Clean::desc($video->subtitle, 60)}}</p>
					@if($video->status == 2)
						<p style="color:red">BORRADOR</p>
					@endif
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Opciones <i class="mdi-navigation-close right"></i></span>
					<ul class="collection">
						<li class="collection-item"><a href="{{route('appanel.video.edit', array('id' => $video->id))}}"><i class="mdi-content-create"></i> Editar</a></li>
						<li class="collection-item"><a class="delete" href="{{route('appanel.video.destroy', array('id' => $video->id))}}"><i class="mdi-action-delete"></i> Borrar</a></li>
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="video/create" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
				{{$videos->links()}}
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
{{--$videos imprime json--}}