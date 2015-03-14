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
				type: 'error',
			});
		});
		</script>
	@endif
	<!-- Manejo de errores -->

	<!-- Formulario -->
	{{Form::open(array('url' => route('appanel.add.store')))}}
		<div class="row">
			<div class="input-field col s12 big">
				<input type="hidden" name="cliente_id" value="{{$cliente->id}}">
				<input type="text" value="{{$cliente->name}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Nombre del anuncio</label>
				<input type="text" name="name" value="{{Input::old('name')}}">
			</div>
		</div>
		<div class="row">
			<div class="input-field col s12">
				<label>Costo</label>
				<input type="text" name="price" value="{{Input::old('price')}}">
			</div>
		</div>
		<div class="row">
			<div class="col s6">
				<label>Inicio</label>
				<input type="date" name="start" value="{{Input::old('start')}}">
			</div>
			<div class="col s6">
				<label>Fin</label>
				<input type="date" name="duration" value="{{Input::old('duration')}}">
			</div>
		</div>
		<div class="row">
			<div class="col s12">
				<ul class="tabs">
					<li class="tab col s2"><a class="active" href="#test1">Home</a></li>
					<li class="tab col s2"><a href="#test2">Videos</a></li>
					<li class="tab col s2"><a href="#test3">Notas</a></li>
					<li class="tab col s2"><a href="#test4">Video</a></li>
					<li class="tab col s2"><a href="#test5">Memeteca</a></li>
				</ul>
			</div>
			<div id="test1" class="col s12 check">
				@foreach($home as $h)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$h->name}}</span>
						</div>
							<div class="card-action">
								<p>
									<?php $disabled = ($h->status == 1) ? 'disabled': ''?>
									{{Form::checkbox('position[]', $h->position, Input::old('position[]'), array('id'=>'item-'.$h->position, $disabled))}}
									<label for="item-{{$h->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test2" class="col s12 check">
				@foreach($videos as $vs)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
							<div class="card-content white-text">
								<span class="card-title" style="color:#999">{{$vs->name}}</span>
							</div>
							<div class="card-action">
								<p>
									<?php $disabled = ($vs->status == 1) ? 'disabled': ''?>
									{{Form::checkbox('position[]', $vs->position, Input::old('position[]'), array('id'=>'item-'.$vs->position, $disabled))}}
									<label for="item-{{$vs->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test3" class="col s12 check">
				@foreach($notas as $n)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$n->name}}</span>
						</div>
							<div class="card-action">
								<p>
									<?php $disabled = ($n->status == 1) ? 'disabled': ''?>
									{{Form::checkbox('position[]', $n->position, Input::old('position[]'), array('id'=>'item-'.$n->position, $disabled))}}
									<label for="item-{{$n->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test4" class="col s12 check">
				@foreach($video as $v)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$v->name}}</span>
						</div>
							<div class="card-action">
								<p>
									<?php $disabled = ($v->status == 1) ? 'disabled': ''?>
									{{Form::checkbox('position[]', $v->position, Input::old('position[]'), array('id'=>'item-'.$v->position, $disabled))}}
									<label for="item-{{$v->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div id="test5" class="col s12 check">
				@foreach($memeteca as $m)
					<div class="col s12 m4">
						<div class="card grey lighten-5">
						<div class="card-content white-text">
							<span class="card-title" style="color:#999">{{$m->name}}</span>
						</div>
							<div class="card-action">
								<p>
									<?php $disabled = ($m->status == 1) ? 'disabled': ''?>
									{{Form::checkbox('position[]', $m->position, Input::old('position[]'), array('id'=>'item-'.$m->position, $disabled))}}
									<label for="item-{{$m->position}}">Activar</label>
								</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<div class="row">
				<div class="input-field col s12">
					<p class="warning">
						Estos son los tamaños necesarios para cada anuncio (ancho)x(alto) en pixeles<br>
						<b>Cualquier otro tamaño perjudicará la estética del sitio</b>
						<table>
							<tr>
								<td>Home Mega <b>1020 x 150</b></td>
								<td>Home SQ <b>300 x 250</b></td>
								<td>Home Super<b>728 x 90</b></td>
							</tr>
							<tr>
								<td>Videos Super<b>728 x 90</b></td>
								<td>Videos SQ <b>300 x 250</b></td>
								<td></td>
							</tr>
							<tr>
								<td>Notas Mega <b>1020 x 150</b></td>
								<td>Notas Super <b>728 x 90</b></td>
								<td></td>
							</tr>
							<tr>
								<td>Video Super<b>728 x 90</b></td>
								<td>Video SQ <b>300 x 250</b></td>
								<td></td>
							</tr>
							<tr>
								<td>Memeteca Mega<b>1020 x 150</b></td>
								<td></td>
								<td></td>
							</tr>
						</table>
					</p>
					<div id="droppeable" class="card-panel grey lighten-5 z-depth-1 upload">
						<input type="hidden" class="pic" name="pic" value="{{Input::old('pic')}}" />
						<input type="hidden" class="urlcover" name="urlcover" value="{{Input::old('urlcover')}}" />
						<div class="response">
							<div class="progress">
								<div id="uploadStatus" class="determinate" style="width: 70%"></div>
							</div>
						</div>
						<div class="options">
							<button id="ajaxdrop" data-upload="{{route('upload')}}" class="openFile btn col s10 offset-s1">Sube o arrastra una imágen</button>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<div class="input-field col s12">
								<label>Link del anuncio</label>
								<input type="text" name="link" value="{{Input::old('link')}}">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<button class="btn waves-effect waves-light right">Guardar</button>
				</div>
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

		$('.check input[type="checkbox"]').change(function(){
			if (this.checked) {
				$('.card').removeClass('red').addClass('grey');
				parent = $(this).closest('.card');
				parent.removeClass('grey').addClass('red');
				text = parent.find('.card-title').text();
				$('td').removeClass('red');
				$('td:contains('+text+')').addClass('red lighten-5');
				$('.check input[type="checkbox"]').not(this).attr('checked',false);
			}else{
				$('td').removeClass('red');
				parent = $(this).closest('.card');
				parent.removeClass('red').addClass('grey');
			}
		});
	});
</script>
@stop