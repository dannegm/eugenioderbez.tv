@extends('appanel/template')
@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">{{$title}}</span>
	</nav>

	<div class="container">

		<!-- Manejo de errores -->
		@if ($errors->has())
			<?php $dis = '' ?>
			@foreach ($errors->all() as $error)
				<?php $dis .= $error.'</br>' ?>
			@endforeach
			<script>
			$(window).load(function(){
				swal({
					title: 'Verfica lo siguiente',
					html: '{{$dis}}',
					type:'error',
				});
			});
			</script>
		@endif
		<!-- Manejo de errores -->

		<!-- Formulario -->
		{{Form::open(array('url' => route('appanel.meme.store')))}}
			<div class="row">
				<div class="input-field col s12">
					<label>Vine</label>
					<input type="text" name="vine">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<label>Tags</label>
					<input type="text" name="tags" value="">
					<input type="hidden" name="type" value="2">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<div>
						@if($errors->has())
							@if(Input::old('status') == 1)
								<input type="checkbox" checked id="status" name="status" value="1">
							@else
								<input type="checkbox" id="status" name="status" value="1">
							@endif
						@else
							<input type="checkbox" checked id="status" name="status" value="1">
						@endif
						<label for="status">Publicado</label>
					</div>
				</div>
				<div class="input-field col s6">
					<button class="btn waves-effect waves-light right">Guardar</button>
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

		$('#status').change(function() {
			var $input = $( this );
			if( $input.prop('checked') == true )
				$('label[for="status"]').html('Publicado');
			else
				$('label[for="status"]').html('Borrador');
		}).change();
	});
</script>

@stop