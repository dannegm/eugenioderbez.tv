<?php
class IndexController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Index Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function index(){

		//videos y notas
		$videos = Video::lasts()->take(6)->get();
		$notas = Nota::lasts()->take(3)->get();

		//nav
		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		//destacados home
		$destacadas = Configurando::where('tipe', '=', 'general_destacados')->first();
		$data = (array) json_decode($destacadas->data);

		foreach($data['destacados'] as $v){
			if($v->type == 'nota'){
				$slide = Nota::whereId($v->id)->get();
				$slider[] = $slide;
			}else{
				$slide = Video::whereId($v->id)->get();
				$slider[] = $slide;
			}
		}

		//anuncios
		$super = Position::find(1);
		$super_b = Position::find(2);
		$sq = Position::find(3);

		$data = array(
			'title' => 'Eugenio Derbez',
			'slider' => $slider,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas' => $notas,
			'notas_nav' => $notas_nav,
			'super' => $super,
			'super_b' => $super_b,
			'sq' => $sq
		);
		return View::make('pages/home', $data);
	}

	public function carnales(){

		//videos
		$videos = Video::orderBy('id', 'desc')->paginate(12);

		//categorías
		$categories = Category::categoryType('video')->orderBy('name', 'asc')->get();

		//nav
		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		//videos destacados
		$destacadas = Configurando::where('tipe', '=', 'video_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Video::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//videos populares
		$populares = Video::orderBy('views', 'desc')->take(3)->get();

		//anuncios
		$super = Position::find(4);
		$sq = Position::find(5);

		$data = array(
			'title' => 'Eugenio Derbez',
			'videos' => $videos,
			'categories' => $categories,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'slider' => $slider,
			'populares' => $populares,
			'super' => $super,
			'sq' => $sq
		);
		return View::make('pages/carnales', $data);
	}

	public function derbez(){
		$data = array(
			'title' => 'Eugenio Derbez',
		);
		return View::make('pages/derbez', $data);
	}

	public function legales(){
		$videos_nav = Cache::remember('videos', 1440, function()
		{
			return Video::nav()->get();
		});
		$notas_nav= Cache::remember('videos', 1440, function()
		{
			return Nota::nav()->get();
		});
		$data = array(
			'title' => 'Eugenio Derbez',
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/legales', $data);
	}

	public function meme($id){
		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		$meme = Meme::find($id);

		$meme->views = $meme->views + 1;
		$meme->save();

		$data = array(
			'title' => 'Eugenio Derbez',
			'meme' => $meme,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav
		);
		return View::make('pages/meme', $data);
	}

	public function memeteca(){
		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		if(!Agent::isMobile()){
			$memes = Meme::where('status', '=', 1)->orWhere('status', '=', 2)->take(12)->orderBy('id', 'desc')->get();

			$super = Position::find(10);

			$data = array(
				'title' => 'Eugenio Derbez',
				'memes' => $memes,
				'videos_nav' => $videos_nav,
				'notas_nav' => $notas_nav,
				'super' => $super
			);
			return View::make('pages/memeteca', $data);
		}else{
			$memes = Meme::where('status', '=', 1)->orWhere('status', '=', 2)->orderBy('id', 'desc')->paginate(12);

			$super = Position::find(10);

			$data = array(
				'title' => 'Eugenio Derbez',
				'memes' => $memes,
				'videos_nav' => $videos_nav,
				'notas_nav' => $notas_nav,
				'super' => $super
			);
			return View::make('pages/memeteca', $data);
		}
	}

	public function memetecaPages(){
		$memes = Meme::where('status', '=', 1)->orWhere('status', '=', 2)->orderBy('id', 'desc')->paginate(12);
		$data = array(
			'memes' => $memes,
		);

		return View::make('pages/memetecaPages', $data);
	}

	public function nota($id){
		$nota = Nota::find($id);

		$lasts = Nota::lasts()->take(2)->get();

		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		$prev = Nota::where('id', '<', $nota->id)->whereStatus(1)->orderBy('id','desc')->first();
		$next = Nota::where('id', '>', $nota->id)->where('status', '=', 1)->get();

		$nota->views = $nota->views + 1;
		$nota->save();
		$data = array(
			'title' => 'Eugenio Derbez',
			'nota' => $nota,
			'lasts' => $lasts,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'next' => $next,
			'prev' => $prev
		);
		return View::make('pages/nota', $data);
	}

	public function preguntame(){
		$notas = Nota::orderBy('id', 'desc')->paginate(10);

		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		//destacadas
		$destacadas = Configurando::where('tipe', '=', 'nota_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Nota::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//anuncios
		$super = Position::find(6);
		$super_b = Position::find(7);

		$data = array(
			'title' => 'Eugenio Derbez',
			'notas' => $notas,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'slider' => $slider,
			'super' => $super,
			'super_b' => $super_b
		);
		return View::make('pages/preguntame', $data);
	}

	public function video($id){
		$videos = Cache::remember('videos', 1440, function()
		{
			return Video::orderBy('id', 'desc')->take(3)->get();
		});

		//recomendados
		$destacadas = Configurando::where('tipe', '=', 'video_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Video::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//video
		$video = Video::find($id);

		//nav
		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		$video->views = $video->views + 1;
		$video->save();

		$super = Position::find(8);
		$sq = Position::find(9);

		$data = array(
			'id' => $video,
			'title' => 'Eugenio Derbez',
			'video' => $video,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'destacadas' => $slider,
			'notas_nav' => $notas_nav,
			'super' => $super,
			'sq' => $sq
		);

		return View::make('pages/video', $data);
	}

	public function categoryVideos($id){
		$videos = Category::find($id)->videos()->whereStatus(1)->paginate(12);

		$videos_nav = Video::nav()->remember(4)->get();
		$notas_nav = Nota::nav()->remember(4)->get();

		$categories = Category::categoryType('video')->orderBy('name', 'asc')->get();

		$super = Position::find(4);
		$sq = Position::find(5);

		$data = array(
			'title' => 'Eugenio Derbez',
			'categories' => $categories,
			'videos' => $videos,
			'videos_nav' => $videos_nav,
			'notas_nav' => $notas_nav,
			'super' => $super,
			'sq' => $sq
		);
		return View::make('pages/videos', $data);
	}

}
