<?php

class VideoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$videos = Nota::with('categoria')->paginate(2);//->toJson();
		$videos = Video::orderBy('id', 'desc')->whereStatus(1)->orWhere('status', '=', 2)->paginate(12);

		//videos destacados
		$destacadas = Configurando::where('tipe', '=', 'video_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Video::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//home destacados
		$hdestacadas = Configurando::where('tipe', '=', 'general_destacados')->first();
		$hdata = (array) json_decode($hdestacadas->data);

		foreach($hdata['destacados'] as $v){
			if($v->type == 'nota'){
				$hslide = Nota::whereId($v->id)->get();
				$hslider[] = $hslide;
			}else{
				$hslide = Video::whereId($v->id)->get();
				$hslider[] = $hslide;
			}
		}

		$data = array(
			'title' => 'Videos',
			'videos' => $videos,
			'slider' => $slider,
			'hslider' => $hslider,
		);
		return View::make('appanel/videos/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::categoryType('video')->get();
		$data = array(
			'title' => 'Nuevo video',
			'categories' => $categories
		);
		return View::make('appanel/videos/create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//validation videos
		$rules = array(
			'title' => 'required',
			'subtitle' => 'required',
			'credits' => 'required',
			'youtube' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'subtitle.required' => 'Coloca un subtitulo',
			'credits.required' => 'No has colocado contenido',
			'youtube.required' => 'Debes colocar un video de youtube',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.video.create')
				->withErrors($validator)
				->withInput();
		} else {
			$yt = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", Input::get('youtube'), $ytIDs);
			$youtube_ID = empty($ytIDs[0]) ? 'none' : $ytIDs[0];

			$video = new Video;
			$video->title = Input::get('title');
			$video->subtitle = Input::get('subtitle');
			$video->credits = Input::get('credits');
			$video->tags = Input::get('tags');
			$video->youtube = $youtube_ID;
			$video->author = Auth::id();
			$video->type = 'video';
			$video->pic = Input::get('pic');
			$video->category = Input::get('category');
			if(Input::has('status')) {
				$video->status = 1;
			}else{
				$video->status = 2;
			}
			$video->save();
		}

		return Redirect::route('appanel.video.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		echo 'show'.$id;
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$categories = Category::categoryType('video')->get();
		$video = Video::find($id);
		$data = array(
			'title' => 'Editar',
			'video' => $video,
			'categories' => $categories
		);
		return View::make('appanel/videos/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//validation videos
		$rules = array(
			'title' => 'required',
			'subtitle' => 'required',
			'credits' => 'required',
			'youtube' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'subtitle.required' => 'Coloca un subtitulo',
			'credits.required' => 'No has colocado contenido',
			'youtube.required' => 'Debes colocar un video de youtube',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'pic.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.video.edit', array('id'=>$id))
				->withErrors($validator)
				->withInput();
		} else {
			$yt = preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", Input::get('youtube'), $ytIDs);
			$youtube_ID = empty($ytIDs[0]) ? 'none' : $ytIDs[0];

			$video = Video::find($id);
			$video->title = Input::get('title');
			$video->subtitle = Input::get('subtitle');
			$video->credits = Input::get('credits');
			$video->tags = Input::get('tags');
			$video->youtube = $youtube_ID;
			$video->tags = Input::get('tags');
			$video->author = Auth::id();
			$video->pic = Input::get('pic');
			$video->category = Input::get('category');
			if(Input::has('status')) {
				$video->status = 1;
			}else{
				$video->status = 2;
			}
			$video->save();
		}

		return Redirect::to('appanel/video/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$video = Video::find($id);
		$video->status = 0;
		$video->save();

		return Redirect::to('appanel/video/');
	}

	public function destacados(){
		$json = json_encode($_POST['positions']);
		$config = Configurando::where('tipe', '=', 'video_destacados')->first();
		$config->data = $json;
		$config->save();
		print_r($json);
	}

}
