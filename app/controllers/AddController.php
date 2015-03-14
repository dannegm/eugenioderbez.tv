<?php

class AddController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$videos = Nota::with('categoria')->paginate(2);//->toJson();
		$adds = Add::orderBy('id', 'desc')->whereStatus(1)->paginate(12);

		$data = array(
			'title' => 'Anuncios',
			'adds' => $adds,
		);
		return View::make('appanel/anuncios/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(!Input::get('idCliente')){

		}else{
			$id = Input::get('idCliente');
			$adds_home = Position::whereIn('id', [1,2,3])->get();
			$adds_videos = Position::whereIn('id', [4,5])->get();
			$adds_notas = Position::whereIn('id', [6,7])->get();
			$adds_video = Position::whereIn('id', [8,9])->get();
			$adds_memeteca = Position::whereIn('id', [10])->get();

			$cliente = Client::find($id);
			$data = array(
				'title' => 'Nuevo anuncio',
				'cliente' => $cliente,
				'home' => $adds_home,
				'videos' => $adds_videos,
				'notas' => $adds_notas,
				'video' => $adds_video,
				'memeteca' => $adds_memeteca,
			);
			return View::make('appanel/anuncios/create', $data);
		}
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
			'name' => 'required',
			'price' => 'required|integer',
			'start' => 'required',
			'duration' => 'required',
			'position' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'cliente_id' => 'required',
			'link' => 'required'
		);

		$messages = array(
			'name.required' => 'Coloca un nombre identificativo',
			'price.required' => 'Has dejado el costo vacío',
			'cliente_id.required' => 'Ve a la sección de cliente y elige uno',
			'price.integer' => 'El costo debe ser un valor numérico entero, sin comas ni puntos',
			'start.required' => 'La fecha de inicio es imprescindible',
			'duration.required' => 'La fecha de fin es imprescindible',
			'position.required' => 'Coloca la posición del anuncio',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'integer' => 'Si ves este mensaje haces algo raro >:(',
			'pic.exists' => 'Estás asociando una imágen que no existe',
			'link.required' => 'Es necesario colocar un link de destino'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.add.create', array('idCliente' => Input::get('cliente_id')))
				->withErrors($validator)
				->withInput();
		} else {
			$add = new Add;
			$add->price = Input::get('price');
			$add->name = Input::get('name');
			$add->start = Input::get('start');
			$add->duration = Input::get('duration');
			$add->position_id = Input::get('position')[0];
			$add->pic_id = Input::get('pic');
			$add->client_id = Input::get('cliente_id');
			if(Input::has('status')) {
				$add->status = 1;
			}else{
				$add->status = 2;
			}
			$add->link = Input::get('link');
			$add->save();
			$id = $add->id;

			//asignamos el id del anuncio a la posición
			$position = Position::find(Input::get('position')[0]);
			$position->anuncio_id = $id;
			$position->status = 1;
			$position->save();
		}

		return Redirect::route('appanel.add.edit', array($id));
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
		$add = Add::find($id);
		$cliente = Client::where('id', '=', $add->client_id)->get();
		//Añadimos las posiciones de los anuncios

		$adds_home = Position::whereIn('id', [1,2,3])->get();
		$adds_videos = Position::whereIn('id', [4,5])->get();
		$adds_notas = Position::whereIn('id', [6,7])->get();
		$adds_video = Position::whereIn('id', [8,9])->get();
		$adds_memeteca = Position::whereIn('id', [10])->get();

		$data = array(
			'title' => 'Editar Anuncio',
			'add' => $add,
			'cliente' => $cliente,
			'home' => $adds_home,
			'videos' => $adds_videos,
			'notas' => $adds_notas,
			'video' => $adds_video,
			'memeteca' => $adds_memeteca,
		);
		return View::make('appanel/anuncios/edit', $data);
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
			'name' => 'required',
			'price' => 'required',
			'start' => 'required',
			'duration' => 'required',
			'pic' => 'required|integer|exists:pictures,id',
			'link' => 'required'
		);

		$messages = array(
			'name.required' => 'Coloca un nombre identificativo',
			'price.required' => 'Has dejado el costo vacío',
			'start.required' => 'La fecha de inicio es imprescindible',
			'duration.required' => 'La fecha de fin es imprescindible',
			'pic.required' => 'Debes arrastrar o subir una imágen',
			'integer' => 'Si ves este mensaje haces algo raro >:(',
			'pic.exists' => 'Estás asociando una imágen que no existe',
			'link.required' => 'Es necesario colocar un link de destino'
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.add.edit', array('id' => $id))
				->withErrors($validator)
				->withInput();
		} else {
			$add = Add::find($id);
			$add->price = Input::get('price');
			$add->name = Input::get('name');
			$add->start = Input::get('start');
			$add->duration = Input::get('duration');
			if(Input::has('position')) {
				$add->position_id = Input::get('position')[0];
			}			
			$add->pic_id = Input::get('pic');
			if(Input::has('status')) {
				$add->status = 1;
			}else{
				$add->status = 0;
			}
			$add->link = Input::get('link');
			$add->save();

			//si existe position nuevo
			if(Input::has('position')) {
				//limpiamos la referencia del anuncio en otras posiciones
				$posTable = (new Position())->getTable();
				DB::table($posTable)->where('anuncio_id', '=', $id)->update(array('status' => 0, 'anuncio_id' => 0));	
				//asignamos el id del anuncio a la posición
				$position = Position::find(Input::get('position')[0]);
				$position->anuncio_id = $id;
				$position->status = 1;
				$position->save();
			}
		}

		return Redirect::to('appanel/add/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$add = Add::find($id);
		$client_id = $add->client_id;

		//limpiamos la referencia del anuncio en otras posiciones
		$posTable = (new Position())->getTable();
		DB::table($posTable)->where('anuncio_id', '=', $add->id)->update(array('status' => 0, 'anuncio_id' => 0));

		$add->delete();

		return Redirect::route('appanel.client.edit', array('id' => $client_id));
	}

}
