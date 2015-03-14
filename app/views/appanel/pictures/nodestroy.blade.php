@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">{{$title}}</span>
	</nav>

	<div class="row">
		<div class="col s6 offset-s3">
		<br>
		<br>
		<br>
			Esta imágen está asociada como portada de una nota, un video  o un meme, por lo tanto no puede ser borrada.
			<br>
		<a  class="waves-effect waves-light btn" href="{{route('appanel.picture.index')}}">Regresar a imágenes</a>
		</div>
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