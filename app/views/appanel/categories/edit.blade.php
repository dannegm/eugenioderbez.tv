@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Notas</span>
	</nav>

	<div class="container">
	{{Form::model($cat, array('route' => array('appanel.category.update', $cat->id), 'method' => 'PUT'))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Nombre de la categoría</label>
				<input type="text" name="name" value="{{$cat->name}}" class="form-control">
			</div>
			<div class="input-field col s6">
				<label>Tipo</label>
				<br />
				<select name="objects">
					<option value="nota"
						@if($cat->objects == "nota")
						{{" selected"}}
						@endif
					>Nota</option>
					<option value="video"
						@if($cat->objects == "video")
						{{" selected"}}
						@endif
					>Video</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<div class="form-group">
					<input type="checkbox" id="status" name="status" value="1"
						@if($cat->status == "1")
						{{" checked"}}
						@endif
					>
					<label for="status">Activa</label>
				</div>
			</div>
		 	<div class="input-field col s6">
				<button class="btn waves-effect waves-light right">Actualizar</button>
			</div>
		</div>
	{{Form::close()}}
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
<script>
	$(document).ready(function() {
		$('select').material_select();
	});
</script>
@stop