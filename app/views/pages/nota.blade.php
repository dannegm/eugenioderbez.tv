@extends('header')

@section('content')

@if(Agent::isMobile())
<style type="text/css">
.nota article{
	margin:0 auto 15px !important;
}
</style>
@endif

<body id="nota">
	<div class="wrapper-container">
	@include('nav')
	<div class="container">
	@if(!Agent::isMobile())
	<!-- SLIDER -->
	<div class="row">
		<div class="col-md-24">
			<div id="slider" class="sl-slider-wrapper top">
				<div class="sl-slider">
					<div class="sl-slide" data-uid="{{$nota->id}}" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
						<div class="sl-slide-inner" style="background-image: url('pictures/large/{{$nota->img->url}}');">
							<div class="bottom-preguntame">
								<div class="row">
									<div class="col-md-20 col-md-offset-2">
										<h1>{{$nota->title}}</h1>
										<p>{{Clean::desc($nota->description, 250) }}</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<nav id="navi-arrows" class="nav-arrows">
					@if($prev != '')
					<span class="nav-arrow-prev"><a href="{{route('nota', array('id'=>$prev->id))}}">Anterior</a></span>
					@endif
					@if(!$next->isEmpty())
					<span class="nav-arrow-next"><a href="{{route('nota', array('id'=>$next[0]->id))}}">Siguiente</a></span>
					@endif
				</nav>
			</div>
		</div>
	</div>
	@else
	<!-- POSTS NAVIGATION -->
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

	<!-- NOTA -->
	<div class="row">
		<div class="col-md-24">
			<section class="notas">
				@if(!Agent::isMobile())
					@foreach ($lasts as $last)
					<div class="nota">
						<article data-uid="{{$last->id}}" style="background: #000 url('pictures/small/{{$last->img->url}}') center no-repeat; background-size: cover;">
						<a href="nota/{{$last->id}}" title="{{$last->title}}">
							<span class="cat">{{$last->categoria->name}}</span>
							<div class="ft">
								<h1>{{$last->title}}</h1>
							</div>
						</a>
						</article>
						<p>{{Clean::desc($last->description, 50)}}...</p>
					</div>
					@endforeach
					<div class="ad-cuadro-inline">
								<!-- SQ_Ads_P5 -->
								<ins class="adsbygoogle"
								style="display:inline-block;width:240px;height:200px"
								data-ad-client="ca-pub-3284457972326292"
								data-ad-slot="7339020361"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
					</div>
				@endif
				<article class="articulo">
					<div class="contain special">
						<ul class="share">
							<li class="fb">
								<span class="front"><img src="img/face.png"></span>
								<span class="back">
									<a href="http://www.facebook.com/sharer.php?s=100&p[url]={{URL::to('/').'/nota/'.$nota->id}}">
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
					{{$nota->content}}
					@if(!Agent::isMobile())
					<!--	<div class="ad-horizontal"></div> -->
					@endif
					<span class="fuente">{{$nota->fuente}}</span>
				</article>
			</section>
		</div>
	</div>

	<!-- COMMENTS -->
	<div class="row">
		<div class="col-md-24">
			<section class="comments">
				@foreach ($lasts as $last)
				<div class="nota">
					<article data-uid="{{$last->id}}" style="background: #000 url('pictures/small/{{$last->img->url}}') center no-repeat; background-size: cover;">
					<a href="nota/{{$last->id}}" title="{{$last->title}}">
						<span class="cat">{{$last->categoria->name}}</span>
						<div class="ft">
							<h1>{{$last->title}}</h1>
						</div>
					</a>
					</article>
					<p>{{Clean::desc($last->description, 50)}}...</p>
				</div>
				@endforeach
				<div class="ad-cuadro-inline">
								<!-- SQ_Ads_P5 -->
								<ins class="adsbygoogle"
								style="display:inline-block;width:240px;height:200px"
								data-ad-client="ca-pub-3284457972326292"
								data-ad-slot="7339020361"></ins>
								<script>
								(adsbygoogle = window.adsbygoogle || []).push({});
								</script>
				</div>
				@if(!Agent::isMobile())
				<div class="comments-box">
					<div class="text">Comentarios</div>
				</div>
				<div class="comment-bottom">
					@include('comments')
				</div>
				@endif
			</section>
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