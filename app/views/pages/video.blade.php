@extends('header')
@section('content')
<body id="video">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
		<div class="row">
			<div class="content-video top">
				<div class="row">
					<div class="col-md-24">
						<div class="row">
							<div class="col-md-24">
								<div class="lineas-3">
									{{$video->categoria->name}}
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-24">
								<div class="video-content">
									<!-- VIDEO CONTENT -->
									<div class="col-md-16 video-article">
										<script type="text/javascript">
										/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
										var disqus_shortname = 'eugenioderbez'; // required: replace example with your forum shortname

										/* * * DON'T EDIT BELOW THIS LINE * * */
										(function () {
											var s = document.createElement('script'); s.async = true;
											s.type = 'text/javascript';
											s.src = '//' + disqus_shortname + '.disqus.com/count.js';
											(document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);

											$('.like').click(function () {
												$.post('', {
													'uid': '',
													'type': 'videos'
												}, function (r) {
													r = JSON.parse(r);
													$('.nlikes').text(r.likes + ' Me gusta');
												});
											});
										}());
										</script>
										<article>
											<h1>{{ $video->title }}</h1>
											<figure class="video-container">
												<ul class="social-video">
													<li class="fb">
														<span>
															<a href="http://www.facebook.com/sharer.php?s=100&p[url]={{URL::to('/').'/video/'.$video->id}}">
																<img src="{{URL::asset('img/face.png')}}">
															</a>
														</span>
													</li>
													<li class="tt">
														<span>
															<a href="https://twitter.com/share" data-via="eugenioderbez" data-lang="es">
																<img src="{{URL::asset('img/twit.png')}}">
															</a>
														</span>
													</li>
												</ul>
												<iframe width="853" height="480" src="//www.youtube.com/embed/{{ $video->youtube}}?rel=0&autoplay=1" frameborder="0" allowfullscreen></iframe>
											</figure>
											<div class="contain">
												<ul class="share videos">
													<li class="fb">
														<span class="front"><img src="img/face.png"></span>
														<span class="back">
															<a href="http://www.facebook.com/sharer.php?s=100&p[url]={{URL::to('/').'/video/'.$video->id}}">
																<img src="{{URL::asset('img/face.png')}}">
															</a>
														</span>
													</li>
													<li class="tw">
														<span class="front"><img src="img/twit.png"></span>
														<span class="back">
															<a href="https://twitter.com/share" class="twitter-share-button" data-via="eugenioderbez" data-lang="es">Twittear</a>
														</span>
													</li>
												</ul>
											</div>
											{{$video->credits}}
										</article>
										@if(!Agent::isMobile())
											<!-- ANUNCIO SUPER -->

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
											<!-- ANUNCIO SUPER -->
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
										<!-- comments -->
										<div class="row">
											<div class="col-md-24">
												<section class="comments">
													<div class="comments-box">
														<div class="text">Comentarios</div>
													</div>
													<div class="comment-bottom">
														@include('comments')
													</div>
												</section>
											</div>
										</div>
									</div>
									@if(!Agent::isMobile())
									<!-- SIDEBAR -->
									<aside class="col-md-8">
										<?php $i = 1; ?>
										@foreach ($videos as $video)
											<div class="vid-content">
												<article class="video" data-uid="{{$video->vuid}}" style="background: #000 url('pictures/small/{{--$video->img->url--}}') center no-repeat; background-size: cover;">
													<a href="video/{{$video->id}}" title="{{$video->title}}">
														<div class="ft">
															<h1>{{str_replace('"', '', $video->title)}}</h1>
														</div>
														<div class="amas">
															<i class="mas"></i>
															<span>{{$video->categoria->name}}</span>
														</div>
													</a>
												</article>
											</div>
											@if($i == 3)
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
											<?php break; ?>
											@endif
											<?php $i++ ?>
										@endforeach

										<h3>recomendados</h3>
										@foreach ($destacadas as $d)
											<div class="vid-content">
												<article class="video" data-uid="{{$d->id}}" style="background: #000 url('pictures/small/{{$d->img->url}}') center no-repeat; background-size: cover;">
													<a href="video/{{$d->id}}" title="{{$d->title}}">
														<div class="ft">
															<h1>{{str_replace('"', '', $d->title)}}</h1>
														</div>
														<div class="amas">
															<i class="mas"></i>
															<span>{{$d->categoria->name}}</span>
														</div>
													</a>
												</article>
											</div>
										@endforeach
									</aside>
									@endif
									<div style="clear:both"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
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
	@endif
@include('footer')
</div>
</body>
@stop