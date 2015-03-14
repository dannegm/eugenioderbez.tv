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