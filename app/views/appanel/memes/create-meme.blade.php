@extends('appanel/template')

@section('scripts')
	<script src="{{URL::asset('/panel/js/dnn.upload.js')}}"></script>
@stop

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
				<div class="input-field col s12 big">
					<label>Descripción</label>
					<input type="text" name="description" value="{{Input::old('description')}}">
				</div>
			</div>
			<div class="row">
				<div class="input-field col s6">
					<div id="droppeable" class="card-panel grey lighten-5 z-depth-1 upload">
						<input type="hidden" class="pic" name="cover" value="{{Input::old('cover')}}" />
						<input type="hidden" class="urlcover" name="urlcover" value="{{Input::old('urlcover')}}" />
						<input type="hidden" name="type" value="1">
						<div class="response">
							<div class="progress">
								<div id="uploadStatus" class="determinate" style="width: 70%"></div>
							</div>
						</div>
						<div class="options">
							<button id="ajaxdrop" data-upload="{{route('upload')}}" class="openFile btn col s10 offset-s1">Sube o arrastra una imágen</button>
						</div>
					</div>
				</div>
				<div class="input-field col s6">
					<label>Tags</label>
					<input type="text" name="tags" value="" >
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

		back = $('.urlcover').val();
		$('#droppeable').css({
			'background-image': "url('" + back + "')"
		});

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