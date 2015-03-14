<?php

class NotaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$notas = Nota::with('categoria')->paginate(2);//->toJson();
		$notas = Nota::orderBy('id', 'desc')->whereStatus(1)->orWhere('status', '=', 2)->paginate(12);

		//notas destacadas
		$destacadas = Configurando::where('tipe', '=', 'nota_destacados')->first();
		$data = (array) json_decode($destacadas->data);
		foreach($data['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$slider = Nota::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//destacados home
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
			'title' => 'Notas',
			'notas' => $notas,
			'slider' => $slider,
			'hslider' => $hslider
		);
		return View::make('appanel/notas/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::categoryType('nota')->get();
		$data = array(
			'title' => 'Nueva nota',
			'categories' => $categories
		);
		return View::make('appanel/notas/create', $data);
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
			'content' => 'required',
			'description' => 'required',
			'cover' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'content.required' => 'No has colocado contenido',
			'description.required' => 'No has colocado descripción',
			'cover.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'cover.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.nota.create')
				->withErrors($validator)
				->withInput();
		} else {
			$nota = new Nota;
			$nota->title = Input::get('title');
			$nota->content = Input::get('content');
			$nota->category = Input::get('category');
			$nota->description = Input::get('description');
			$nota->tags = Input::get('tags');
			$nota->fuente = Input::get('fuente');
			$nota->cover = Input::get('cover');
			$nota->author = Auth::id();
			if(null !== Input::get('status')){
				$nota->status = 1;
			}else{
				$nota->status = 2;
			}
			$nota->save();

			return Redirect::to(route('appanel.nota.index'));
		}
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
		$categories = Category::categoryType('nota')->get();
		$nota = Nota::find($id);
		$data = array(
			'title' => 'Editar',
			'nota' => $nota,
			'categories' => $categories
		);
		return View::make('appanel/notas/edit', $data);
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
			'content' => 'required',
			'description' => 'required',
			'cover' => 'required|integer|exists:pictures,id',
			'category' => 'required|integer|exists:categories,id',
		);

		$messages = array(
			'title.required' => 'Has dejado el título vacío',
			'content.required' => 'No has colocado contenido',
			'description.required' => 'No has colocado descripción',
			'cover.required' => 'Debes arrastrar o subir una imágen',
			'category.required' => 'Selecciona una categoría',
			'integer' => 'Si ves este mensaje haces algo raro',
			'category.exists' => 'Estás asociando una categoría que no existe',
			'cover.exists' => 'Estás asociando una imágen que no existe'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.nota.edit', array('id'=>$id))
				->withErrors($validator)
				->withInput();
		} else {
			$nota = Nota::find($id);

			$nota->title = Input::get('title');
			$nota->content = Input::get('content');
			$nota->category = Input::get('category');
			$nota->description = Input::get('description');
			$nota->tags = Input::get('tags');
			$nota->fuente = Input::get('fuente');
			$nota->cover = Input::get('cover');
			$nota->author = Auth::id();
			if(null !== Input::get('status')){
				$nota->status = 1;
			}else{
				$nota->status = 2;
			}
			$nota->save();

			return Redirect::to('appanel/nota/'.$id.'/edit');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nota = Nota::find($id);
		$nota->status = 0;
		$nota->save();

		return Redirect::to('appanel/nota/');
	}

	public function destacados(){
		$json = json_encode($_POST['positions']);
		$config = Configurando::where('tipe', '=', 'nota_destacados')->first();
		$config->data = $json;
		$config->save();
		print_r($json);
	}

	public function destacadosg(){
		$json = json_encode($_POST['positions']);
		$config = Configurando::where('tipe', '=', 'general_destacados')->first();
		$config->data = $json;
		$config->save();
		print_r($json);
	}
}
