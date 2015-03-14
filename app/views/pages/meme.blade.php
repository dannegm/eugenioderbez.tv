@extends('header')
@section('scripts')
@stop
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
				<div class="container">
					<div class="row">
						<div class="col-md-16">
							@if(isset($meme->img->url))
								<img class="img-responsive" src="{{URL::asset('/pictures/normal/'.$meme->img->url)}}">
							@else
								<iframe src="https://vine.co/v/{{$meme->id_vine}}/embed/simple" width="600" height="600" frameborder="0"></iframe><script src="https://platform.vine.co/static/scripts/embed.js"></script>
							@endif
						</div>
						<div class="col-md-8">
							<div class="contain">
								<h1>
								{{$meme->description}}
								</h1>
								<ul class="share">
									<li class="fb">
										<span class="front"><img src="img/face.png"></span>
										<span class="back">
											<a href="http://www.facebook.com/sharer.php?s=100&p[url]={{URL::to('/').'/meme/'.$meme->id}}">
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@include('footer')

</div>
</body>
@stop