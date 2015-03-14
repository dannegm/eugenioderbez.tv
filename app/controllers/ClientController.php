<?php

class ClientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$videos = Nota::with('categoria')->paginate(2);//->toJson();
		$clientes = Client::orderBy('id', 'desc')->whereStatus(1)->paginate(20);
		$positions = Position::all();

		$data = array(
			'title' => 'Clientes',
			'clientes' => $clientes,
			'positions' => $positions,
		);
		return View::make('appanel/clientes/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = array(
			'title' => 'Nuevo cliente',
		);
		return View::make('appanel/clientes/create', $data);
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
			'email' => 'required|email',
			'phone' => 'required',
			'company' => 'required',
		);

		$messages = array(
			'name.required' => 'Has dejado el nombre vacío',
			'email.required' => 'Debes colocar un email de contacto',
			'phone.required' => 'Es obligatorio un teléfono de contacto',
			'company.required' => 'No has colocado compañía',
			'email.email' => 'Debes colocar un email válido',
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.client.create')
				->withErrors($validator)
				->withInput();
		} else {

			$cliente = new Client;
			$cliente->name = Input::get('name');
			$cliente->email = Input::get('email');
			$cliente->phone = Input::get('phone');
			$cliente->company = Input::get('company');
			$cliente->status = Input::get('status');
			$cliente->save();
		}

		return Redirect::route('appanel.client.index');
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
		$cliente = Client::find($id);
		$data = array(
			'title' => 'Editar Cliente',
			'cliente' => $cliente,
		);
		return View::make('appanel/clientes/edit', $data);
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
			'email' => 'required|email',
			'phone' => 'required',
			'company' => 'required',
		);

		$messages = array(
			'name.required' => 'Has dejado el nombre vacío',
			'email.required' => 'Debes colocar un email de contacto',
			'phone.required' => 'Es obligatorio un teléfono de contacto',
			'company.required' => 'No has colocado compañía',
			'email.email' => 'Debes colocar un email válido',
		);

		//check validation
		$validator = Validator::make(Input::all(), $rules, $messages);

		if ($validator->fails()) {
			$messages = $validator->messages();
			return Redirect::route('appanel.client.create')
				->withErrors($validator)
				->withInput();
		} else {
			$cliente = new Client;
			$cliente->name = Input::get('name');
			$cliente->email = Input::get('email');
			$cliente->phone = Input::get('phone');
			$cliente->company = Input::get('company');
			$cliente->save();
		}

		return Redirect::to('appanel/cliente/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$cliente = Client::find($id);
		$cliente->status = 0;
		$cliente->save();

		return Redirect::to('appanel/client/');
	}

}
