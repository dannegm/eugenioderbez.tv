@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Notas</span>
	</nav>

	<!-- Destacados -->
	<div class="row">
		<div class="col s6">
			<h5>Notas destacadas</h5>
			<div style="position:relative" id="nota" data-send="{{route('appanel.nota.destacados')}}" class="destacados card-panel grey lighten-3 valign-wrapper nota_d">
				<h5 class="valign grey-text text-lighten-1">Arrastra aquí tu contenido destacado</h5>
				@foreach($slider as $s)
					<div style="background: url({{URL::asset('pictures/sq/'.$s->img->url)}}) repeat scroll center center transparent;" data-type="nota" data-id="{{$s->id}}" class="list">
						<h3>{{$s->title}}</h3>
						<span class="remove">x</span>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col s6">
			<h5>Home Destacados</h5>
			<div style="position:relative" id="nota" data-send="{{route('appanel.nota.destacadosg')}}" class="destacadosg card-panel grey lighten-3 valign-wrapper nota_d">
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
	@foreach ($notas as $nota)
		@if($nota->status == 2)
		<div class="col s4 drag" style="opacity:0.3" data-item="{{$nota->id}}" id="item-{{$nota->id}}">
		@else
		<div class="col s4 drag" data-item="{{$nota->id}}" id="item-{{$nota->id}}">
		@endif
			<div class="card small">
				<div class="card-image waves-effect waves-block waves-light">
					<img class="activator" src="{{URL::asset('pictures/sq/'.$nota->img->url)}}">
					<span class="card-title">{{$nota->title}}</span>
				</div>
				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">{{$nota->categoria->name}} <i class="mdi-navigation-more-vert right"></i></span>
					<p>{{Clean::desc($nota->description, 100)}}</p>
					@if($nota->status == 2)
						<p style="color:red">BORRADOR</p>
					@endif
				</div>
				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4">Opciones <i class="mdi-navigation-close right"></i></span>
					<ul class="collection">
						<li class="collection-item"><a href="nota/{{$nota->id}}/edit"><i class="mdi-content-create"></i> Editar</a></li>
						<li class="collection-item"><a class="delete" href="nota/{{$nota->id}}/destroy"><i class="mdi-action-delete"></i> Borrar</a></li>
					</ul>
				</div>
			</div>
		</div>
	@endforeach
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="nota/create" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
	</div>

	<!-- Footer -->
	<footer id="footer" class="page-footer blue-grey darken-2">
		<div class="row">
			<div class="col l6 s12">
				{{$notas->links()}}
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
