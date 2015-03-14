@extends('header')
@section('scripts')
	<script src="{{URL::asset('js/b.js')}}"></script>
	<script src="{{URL::asset('js/masonry.min.js')}}"></script>
@stop

@if(Agent::isMobile())
<style>
	ul.memes{
		width:100% !important;
	}
	ul.memes li{
		margin:5px auto;	
	}
</style>
@else
<style>
	ul.memes{
		width:940px !important;
	}
</style>
@endif

@section('content')
<body id="memeteca">
	<div class="wrapper-container">
	@include('nav')
	<div class="container-fluid">
		<div class="row">
			<div class="memeteca">
				<div class="escudo">
					<img class="img-responsive" src="img/memeteca.png">
				</div>
				@if(!Agent::isMobile())
					<!-- ANUNCIO MEGA -->
					<?php
						if($super->status == 1){
							$fin = new DateTime($super->add->duration);
							$hoy = new DateTime(date('Y-m-d'));
							$interval = $fin->diff($hoy);
							$rest = $interval->format('%R%a');
							if($rest > 0){
					?>
							<div class="ad-horizontal">
								<!-- HRAds - P1 -->
								<ins class="adsbygoogle"
								style="display:inline-block;width:728px;height:90px"
								data-ad-client="ca-pub-3284457972326292"
								data-ad-slot="5083557964"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
					<?php
							}else{
					?>
							<div class="ad-mega">
								<a href="{{$super->add->link}}">
									<img src="{{URL::to('pictures/'.$super->add->img->url)}}">
								</a>
							</div>
					<?php			
							}
						}else{
					?>
							<div class="ad-horizontal">
								<!-- HRAds - P1 -->
								<ins class="adsbygoogle"
								style="display:inline-block;width:728px;height:90px"
								data-ad-client="ca-pub-3284457972326292"
								data-ad-slot="5083557964"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
							</div>
					<?php
						}
					?>
					<!-- ANUNCIO MEGA -->
				@else
					<div class="ad-movil">
						<ins class="adsbygoogle"
						style="display:inline-block;width:320px;height:50px"
						data-ad-client="ca-pub-3284457972326292"
						data-ad-slot="5368565168"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
					</div>
				@endif

				<!-- MEMETECA DESKTOP -->
				@if(!Agent::isMobile())
					<ul class="memes">
						@foreach($memes as $m)
							@if($m->type == 1)
								<li>
									<a href="{{route('meme', array('id' => $m->id))}}">
										<div class="superposition">
											<p>{{$m->description}}</p>	
										</div>
										<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">
									</a>
								</li>
							@else
							<li>
								<iframe src="https://vine.co/v/{{$m->id_vine}}/embed/simple" width="300" height="300" frameborder="0"></iframe><script src="https://platform.vine.co/static/scripts/embed.js"></script>
							</li>
							@endif
						@endforeach
					</ul>
				@endif
				<!-- MEMETECA DESKTOP -->

				<!-- MEMETECA MOVIL -->
				@if(Agent::isMobile())
					<ul class="memes">
						@foreach($memes as $m)
							@if($m->type == 1)
								<li>
									<a href="{{route('meme', array('id' => $m->id))}}">
										<div class="superposition">
											<p>{{$m->description}}</p>	
										</div>
										<img class="img-responsive" src="{{URL::asset('/pictures/small/'.$m->img->url)}}">
									</a>
								</li>
							@else
							<li>
								<iframe src="https://vine.co/v/{{$m->id_vine}}/embed/simple" width="300" height="300" frameborder="0"></iframe>
								<script src="https://platform.vine.co/static/scripts/embed.js"></script>
							</li>
							@endif
						@endforeach
					</ul>
					<div class="pagination">
						{{$memes->links()}}
					</div>
				@endif
				<!-- MEMETECA MOVIL -->
			</div>
		</div>
	</div>
@include('footer')
<script>
$(document).ready(function(){

	@if(!Agent::isMobile())
	window.onload = function(){

		var $container = $('ul.memes');
		// initialize
		$container.masonry({
			columnWidth: 300,
			itemSelector: '.memes li',
			//isFitWidth: true,
			gutter: 20
		});

		//load memes
		pages = {{$memes->count()}};
		current = 1;
		canLoad = true;

		$('.memes').animate({
			opacity: 1,
		}, 500);

		$(window).scroll(function() {
			var scrollpoint = ($("body").height() - $('#footer').position().top) - 200,
            scrollpos = $(window).scrollTop();

        	if (scrollpos > scrollpoint && canLoad) {
        		canLoad = false;
			//if($(window).scrollTop() + $(window).height() == $(document).height()) {
				page = current + 1;
				$.ajax({
					type: 'GET',
					url: '{{route('memetecapages')}}',
					data: {page : page},
					cache: false,
				}).done(function(html){
						var el = $(html);
						$('.memes').append(el, true);
						$('.memes').masonry('layout');
						$('.memes').masonry('reloadItems');
						current = current + 1;
						console.log('{{route('memetecapages')}}/?page=' + current);
						canLoad = true;
				});
			}
		});
	}
	@else
		$('.memes').animate({
			opacity: 1,
		}, 500);
	@endif
});
</script>
</div>
</body>
@stop