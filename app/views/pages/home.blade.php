@extends('header')

@section('content')
<body id="home">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<header>
				<div class="col-md-24">
					<figure class="ciudad top"></figure>
				</div>
			</header>
		</div>
		<!-- SLIDER -->
		@if(!Agent::isMobile())
		<div class="row">
			<div class="col-md-24">
				<section class="slider">

					<h1 style="margin:0;padding:10px 0 0 0;margin-bottom:20px;font-family:SierraMadre;text-align:center;font-size:40px;-webkit-font-smoothing:antialiased">Destacados</h1>

					<div id="slider" class="sl-slider-wrapper">
						@foreach($slider as $s)
						<div class="sl-slider">
							<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<a href="{{$s[0]->type == "youtu" ? "video" : $s[0]->type}}/{{$s[0]->id}}">
								<div class="sl-slide-inner" style="background-image: url('pictures/medium/{{$s[0]->img->url}}'); background-position: center; background-size: cover">
									<h1>{{$s[0]->title}}</h1>
								</div>
								</a>
							</div>
						</div>
						@endforeach
					<?php //print_r($slider) ?>

						<nav id="nav-arrows" class="nav-arrows">
							<span class="nav-arrow-prev">Anterior</span>
							<span class="nav-arrow-next">Siguiente</span>
						</nav>

						<nav id="nav-dots" class="nav-dots">
							<span class="nav-dot-current"></span>
							<span></span>
							<span></span>
							<span></span>
							<span></span>
						</nav>
					</div>

					<p class="slider-home"></p>

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
				</section>
			</div>
		</div>
		@else
		<section class="slider">
			<h1 style="margin:0;padding:10px 0 30px 0;margin-bottom:-20px;font-family:SierraMadre;text-align:center;font-size:25px;-webkit-font-smoothing:antialiased">Destacados</h1>
			<div id="slider" class="sl-slider-wrapper">
				<div class="sl-slider">
					<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[0]->img->url}}'); background-position: center;">
							<h1><a href="video/{{$videos[0]->id}}">{{$videos[0]->title}}</a></h1>
						</div>
					</div>
				</div>
				<div class="sl-slider">
					<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$notas[0]->img->url}}'); background-position: center;">
							<h1><a href="video/{{$notas[0]->id}}">{{$notas[0]->title}}</a></h1>
						</div>
					</div>
				</div>
				<div class="sl-slider">
					<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[1]->img->url}}'); background-position: center;">
							<h1><a href="video/{{$videos[1]->id}}">{{$videos[1]->title}}</a></h1>
						</div>
					</div>
				</div>
				<div class="sl-slider">
					<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$notas[1]->img->url}}'); background-position: center;">
							<h1><a href="video/{{$notas[1]->id}}">{{$notas[1]->title}}</a></h1>
						</div>
					</div>
				</div>
				<div class="sl-slider">
					<div class="sl-slide" data-uid="uid_HBTMfanO" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$videos[2]->img->url}}'); background-position: center;">
							<h1><a href="video/{{$videos[0]->id}}">{{$videos[0]->title}}</a></h1>
						</div>
					</div>
				</div>



				<nav id="nav-arrows" class="nav-arrows">
					<span class="nav-arrow-prev">Anterior</span>
					<span class="nav-arrow-next">Siguiente</span>
				</nav>

				<nav id="nav-dots" class="nav-dots">
					<span class="nav-dot-current"></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</nav>
			</div>
			<p class="slider-home"></p>
		</section>
		@endif

		@if(Agent::isMobile())
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

		<!-- VIDEOS -->
		<div class="row">
			<div class="col-md-24">
				<section class="videos">
					<h1 class="title">Videos</h1>
					<div class="articles">
						@foreach ($videos as $video)
						<div class="vid-content">
							<article class="video" data-uid="{{$video->id}}" style="background: #000 url('pictures/small/{{$video->img->url}}') center no-repeat; background-size: cover;">
								<a href="video/{{$video->id}}" title="{{Clean::desc($video->subtitle, 200)}}">
									<div class="ft">
										<h1>{{$video->title}}</h1>
									</div>
									<div class="amas">
										<i class="mas"></i>
										<span>{{$video->categoria->name}}</span>
									</div>
								</a>
							</article>
							<p>{{Clean::desc($video->subtitle, 60)}}...</p>
						</div>
						@endforeach
					</div>
					<div class="view-more">
						<a href="carnales">ver más...</a>
					</div>
				</section>
			</div>
		</div>

		@if(Agent::isMobile())
		<div class="ad-cuadro">
			<!-- SQ_Ads_P5 -->
			<ins class="adsbygoogle"
			style="display:inline-block;width:300px;height:250px"
			data-ad-client="ca-pub-3284457972326292"
			data-ad-slot="7339020361"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
		</div>
		@endif

		<!-- PREGUNTAME -->
		<div class="row">
			<div class="col-md-24">
				<section class="preguntame">
					<h1 class="title">Pregúntame</h1>
					<div class="articles">
						@foreach ($notas as $nota)
						<div class="nota">
							<article data-uid="{{$nota->id}}" style="background: #000 url('pictures/small/{{$nota->img->url}}') center no-repeat; background-size: cover;">
								<a href="nota/{{$nota->id}}" title="Grandes actores que no han ganado el Oscar.">
									<span class="cat">{{$nota->name}}</span>
									<div class="ft">
										<h1>{{$nota->title}}</h1>
										<span>{{$nota->categoria->name}}</span>
									</div>
								</a>
							</article>
							<p>{{Clean::desc($nota->description, 60)}}...</p>
						</div>
						@endforeach
					</div>
					<div class="view-more">
						<a href="preguntame">ver más...</a>
					</div>
				</section>
			</div>
		</div>

		<!-- ABUSO OPORTUNO -->
		<div class="row">
			<div class="col-md-24">
				<aside id="redes">
					<div class="row">
						<div class="col-md-8 col-md-offset-4">
							<div id="twitter">
								<div class="bg">
									<img  class="img-responsive" id="twheader" src="img/twheader.png" />
									<div class="scroll">
										<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/EugenioDerbez" data-widget-id="499709910397906944">Tweets por @EugenioDerbez</a>
										<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<!-- ANUNCIO CUADRADO -->

							<?php
								if($sq->status == 1){
									$fin = new DateTime($sq->add->duration);
									$hoy = new DateTime(date('Y-m-d'));
									$interval = $fin->diff($hoy);
									$rest = $interval->format('%R%a');
									if($rest > 0){
							?>
								<div class="ad-cuadro">
									<!-- SQ_Ads_P5 -->
									<ins class="adsbygoogle"
									style="display:inline-block;width:300px;height:250px"
									data-ad-client="ca-pub-3284457972326292"
									data-ad-slot="7339020361"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							<?php
									}else{
							?>
									<div class="ad-horizontal">
										<a href="{{$sq->add->link}}">
											<img src="{{URL::to('pictures/'.$sq->add->img->url)}}">
										</a>
									</div>
							<?php			
									}
								}else{
							?>
								<div class="ad-cuadro">
									<!-- SQ_Ads_P5 -->
									<ins class="adsbygoogle"
									style="display:inline-block;width:300px;height:250px"
									data-ad-client="ca-pub-3284457972326292"
									data-ad-slot="7339020361"></ins>
									<script>
									(adsbygoogle = window.adsbygoogle || []).push({});
									</script>
								</div>
							<?php
								}
							?>
							<!-- ANUNCIO CUADRADO -->

							<div class="side">
								<div id="linksitunes">
									<a id="linkit2" href="https://itunes.apple.com/mx/movie/no-eres-tu-soy-yo/id435869493"></a>
									<a id="linkit1" href="https://itunes.apple.com/mx/movie/no-se-aceptan-devoluciones/id794259708"></a>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</aside>
			</div>
		</div>
		@if(Agent::isMobile())
			<div class="ad-movil">
				<ins class="adsbygoogle"
				    style="display:inline-block;width:320px;height:50px"
				    data-ad-client="ca-pub-3284457972326292"
				    data-ad-slot="5368565168"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		@else
			<!-- ANUNCIO SUPER BOTTOM -->
			<?php
				if($super_b->status == 1){
					$fin = new DateTime($super_b->add->duration);
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
					<div class="ad-horizontal">
						<a href="{{$super_b->add->link}}">
							<img src="{{URL::to('pictures/'.$super_b->add->img->url)}}">
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
			<!-- ANUNCIO SUPER BOTTOM -->
		@endif
	</div>
@include('footer')
</div>
</body>
@stop