@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Categorías</span>
	</nav>

	<div class="row">
		<!-- Listado Notas -->
		<div class="col s6">
			<ul class="collection with-header">
				<li class="collection-header"><h4>Notas</h4></li>

				@foreach ($notas as $cat)
				<li class="collection-item"><a href="category/{{$cat->id}}/edit">{{$cat->name}}</a></li>
				@endforeach
			</ul>
		</div>
		<!-- Listado Videos -->
		<div class="col s6">
			<ul class="collection with-header">
				<li class="collection-header"><h4>Videos</h4></li>

				@foreach ($videos as $cat)
				<li class="collection-item"><a href="category/{{$cat->id}}/edit">{{$cat->name}}</a></li>
				@endforeach
			</ul>
		</div>
	</div>

	<!-- Floating button -->
	<div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
		<a href="category/create" class="btn-floating btn-large red">
			<i class="large mdi-content-create"></i>
		</a>
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
{{--$notas imprime json--}}