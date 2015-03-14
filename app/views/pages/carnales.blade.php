@extends('header')
@section('content')
<body id="carnales">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="content-videos top">
				<!-- SIDEBAR -->
				<aside class="col-md-7 sidebar">
					<div class="row">
						<h4>
							Categorías
						</h4>
						<ul>
							@foreach($categories as $c)
							<li><a href="videos/{{$c->id}}">{{$c->name}}</a></li>
							@endforeach
						</ul>

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

						<h4>
							Populares
						</h4>
						<div class="populares">
							<?php $i = 1 ?>
							@foreach ($populares as $video)
							<div class="vid-content">
								<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->img->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->id }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->categoria->name}}</span>
										</div>
									</a>
								</article>
								<p>{{Clean::desc($video->subtitle, 0, 50) }}... </p>
							</div>
							@if($i == 3)
								<?php break; ?>
							@endif
							<?php $i++ ?>
							@endforeach
						</div>
					</div>
				</aside>
				<!-- VIDEO BODY -->
				<div class="col-md-17 carnales">
				@if(!Agent::isMobile())
				<!-- SLIDER -->
					<div id="slider" class="sl-slider-wrapper">
						<div class="sl-slider">
							@foreach($slider as $video )
							<div class="sl-slide" data-uid="{{ $video->id }}" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
								<div class="sl-slide-inner" style="background-image: url('pictures/normal/{{$video->img->url}}');">
									<h1><a href="video/{{ $video->id }}">{{ $video->title }}</a></h1>
								</div>
							</div>
							@endforeach
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
				@else
				<!-- SLIDER -->

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

				<h4 class="the_new">Lo nuevo <span>></span></h4>
				@if(!Agent::isMobile())
					<!-- RECIENTES -->
					<section class="recientes">
						<h3>Videos recientes</h3>
						<div>
							<?php $i = 1 ?>
							@foreach ($videos as $video)
							<div class="vid-content">
								<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->img->url}}') center no-repeat; background-size: cover;">
									<a href="video/{{ $video->id }}" title="{{ $video->title }}">
										<div class="ft">
											<h1>{{ $video->title }}</h1>
										</div>
										<div class="amas">
											<i class="mas"></i>
											<span>{{ $video->categoria->name }}</span>
										</div>
									</a>
								</article>
								<p>{{ Clean::desc($video->subtitle, 50) }}... </p>
							</div>
								@if($i == 6)
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
											<div class="ad-horizontal">
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
								@endif
							<?php $i++ ?>
							@endforeach
						</div>
					</section>
				@else
					<!-- RECIENTES -->
					<section class="container-vid-movil">
						<h4 class="new-videos">Nuevos Videos</h4>
						<section class="recientes">
							<div>
								@foreach ($videos as $video)
								<div class="vid-content">
									<article class="video" data-uid="{{ $video->id }}" style="background: #000 url('pictures/small/{{$video->img->url}}') center no-repeat; background-size: cover;">
										<a href="video/{{ $video->id }}" title="{{ $video->title }}">
											<div class="ft">
												<h1>{{ $video->title }}</h1>
											</div>
											<div class="amas">
												<i class="mas"></i>
												<span>{{ $video->categoria->name }}</span>
											</div>
										</a>
									</article>
									<p>{{ substr($video->subtitle, 0, 50) }}... </p>
								</div>
								@endforeach
							</div>
						</section>
					</section>
				@endif
				<div class="pagination">{{$videos->links()}}</div>
				</div>
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
@include('footer')
</div>
</body>
@stop