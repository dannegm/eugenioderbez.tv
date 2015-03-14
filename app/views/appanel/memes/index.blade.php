@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Memes</span>
	</nav>

	<!-- Listado -->
	<div class="row">
	@foreach ($memes as $meme)
		@if($meme->status == 2)
		<div class="col s4" style="opacity:0.3" id="item-{{$meme->id}}">
		@else
		<div class="col s4" id="item-{{$meme->id}}">
		@endif
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					@if(isset($meme->img->url))
						<img class="activator" src="{{URL::asset('pictures/sq/'.$meme->img->url)}}">
					@else
						<img class="activator" src="{{URL::asset('img/vine-meme.png')}}">
					@endif
					<span class="card-title">{{$meme->title}}</span>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4"> <i class="mdi-navigation-more-vert right"></i></span>
					<p>{{Clean::desc($meme->description, 100)}}</p>
					@if($meme->status == 2)
						<p style="color:red">BORRADOR</p>
					@endif
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Opciones <i class="mdi-navigation-close right"></i></span>
					<ul class="collection">
						<li class="collection-item"><a href="meme/{{$meme->id}}/edit"><i class="mdi-content-create"></i> Editar</a></li>
						<li class="collection-item"><a class="delete" href="meme/{{$meme->id}}/destroy"><i class="mdi-action-delete"></i> Borrar</a></li>
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="#" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
		<ul>
			<li><a href="meme/create?type=meme" class="btn-floating blue tooltipped" data-position="left" data-delay="1" data-tooltip="Nuevo meme"><i class="large mdi-editor-insert-photo"></i></a></li>
			<li><a href="meme/create?type=vine" class="btn-floating green tooltipped" data-position="left" data-delay="1" data-tooltip="Nuevo vine"><i class="large mdi-av-videocam"></i></a></li>
		</ul>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
				{{$memes->links()}}
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