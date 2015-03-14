@extends('appanel/template')

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('/panel/css/redactor.css')}}">
@stop

@section('scripts')
	<script src="{{URL::asset('/panel/js/fontsize.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/fullscreen.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/redactor.min.js')}}"></script>
	<script src="{{URL::asset('/panel/js/dnn.upload.js')}}"></script>
	<script>
	$(document).ready(function(){
		$('#description').redactor({
			plugins: ['fullscreen'],
			buttons: ['html'],
			minHeight: 50
		});
		$('#content').redactor({
			plugins: ['fullscreen'],
			buttons: ['html', 'bold', 'italic', 'deleted', 'unorderedlist', 'orderedlist', 'outdent', 'indent', 'link', 'alignment', 'horizontalrule'],
			convertVideoLinks: true,
			convertLinks: true,
			toolbarFixedBox: true,
			minHeight: 150
		});
	});
	</script>
@stop

@section('content')
<main>
	<!-- Header -->
	<nav id="top" class="top-nav">
		<span class="page-title">Nuevo video</span>
	</nav>
	<input type="file" id="file" class="hidden" />

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
	{{Form::open(array('url' => route('appanel.video.store')))}}
		<div class="row">
			<div class="input-field col s12 big">
				<label>Título</label>
				<input type="text" name="title" value="{{Input::old('title')}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6">
				<div id="droppeable" class="card-panel grey lighten-5 z-depth-1 upload">
					<input type="hidden" class="pic" name="pic" value="{{Input::old('pic')}}" />
					<input type="hidden" class="urlcover" name="urlcover" value="{{Input::old('urlcover')}}" />
					<div class="response">
						<div class="progress">
							<div id="uploadStatus" class="determinate" style="width: 70%"></div>
						</div>
					</div>
					<div class="options">
						<button id="ajaxdrop" data-upload="{{route('upload')}}" class="openFile btn col s10 offset-s1">Sube o Arrastra una imágen</button>
					</div>
				</div>
			</div>
			<div class="input-field col s6">
				<label>Categoría</label>
				<br />

				<select name="category">

					<option value="" disabled selected>Elige una categoría</option>
					@foreach($categories as $c)
						@if($c->id == Input::old('category'))
							<option selected value="{{$c->id}}">{{$c->name}}</option>
						@else
							<option value="{{$c->id}}">{{$c->name}}</option>
						@endif
					@endforeach

				</select>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Descripción</label>
				<textarea id="description" name="subtitle" placeholder="Subtítulo">{{Input::old('subtitle')}}</textarea>
			</div>
			<div class="input-field col s12">
				<label>Contenido</label>
				<textarea id="content" name="credits" placeholder="Créditos">{{Input::old('credits')}}</textarea>
			</div>
		</div>
		<div class="row">
			<input type="hidden" name="type" value="youtube">
			<div class="input-field col s6">
				<label>Link de YouTube</label>
				<input type="text" name="youtube" value="{{Input::old('youtube')}}">
			</div>
			<div class="input-field col s6">
				<label>Tags</label>
				<input type="text" name="tags" value="{{Input::old('tags')}}">
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
					<label for="status">Publicada</label>
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
				$('label[for="status"]').html('Publicada');
			else
				$('label[for="status"]').html('Borrador');
		}).change();
	});
</script>
@stop