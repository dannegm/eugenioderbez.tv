<?php

class MemeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$memes = Meme::orderBy('id', 'desc')->whereStatus(1)->orWhere('status', '=', 2)->paginate(12);
		$data = array(
			'title' => 'Memes',
			'memes' => $memes
		);
		return View::make('appanel/memes/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Input::get('type') == 'meme'){
			$data = array(
				'title' => 'Nuevo Meme',
			);
			return View::make('appanel/memes/create-meme', $data);
		}elseif (Input::get('type') == 'vine') {
			$data = array(
				'title' => 'Nuevo Vine',
			);
			return View::make('appanel/memes/create-vine', $data);
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		if(Input::get('type') == 1){
			$type = 'meme';

			//validation videos
			$rules = array(
				'description' => 'required',
				'cover' => 'required|integer|exists:pictures,id'
			);

			$messages = array(
				'description.required' => 'Debes colocar una descripción',
				'cover.required' => 'Debes arrastrar o subir una imágen',
				'cover.exists' => 'Estás asociando una imágen que no existe'
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);


			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.meme.create', array('type' => $type))
					->withErrors($validator)
					->withInput();
			} else {

				$meme = new Meme;
				$meme->description = Input::get('description');
				$meme->tags = Input::get('tags');
				$meme->type = Input::get('type');
				$meme->pic = Input::get('cover');

				if(Input::has('status')) {
					$meme->status = 1;
				}else{
					$meme->status = 2;
				}
				$meme->save();
			}
		}else{
			$type = 'vine';

			//validation videos
			$rules = array(
				'vine' => 'required',
			);

			$messages = array(
				'vine.required' => 'Debes colocar una url de vine',
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);


			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.meme.create', array('type' => $type))
					->withErrors($validator)
					->withInput();
			} else {
				$vine = Input::get('vine');
				$vine = explode("/", $vine);
				$vine = end($vine);

				$meme = new Meme;
				$meme->id_vine = $vine;
				$meme->tags = Input::get('tags');
				$meme->type = Input::get('type');

				if(Input::has('status')) {
					$meme->status = 1;
				}else{
					$meme->status = 2;
				}
				$meme->save();
			}
		}

		return Redirect::route('appanel.meme.index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$meme = Meme::find($id);
		if($meme->type == 1){
			$data = array(
				'title' => 'Edit Meme',
				'meme' => $meme,
			);
			return View::make('appanel/memes/edit-meme', $data);
		}else{
			$data = array(
				'title' => 'Edit Vine',
				'meme' => $meme,
			);
			return View::make('appanel/memes/edit-vine', $data);
		}
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(Input::get('type') == 1){
			$type = 'meme';

			//validation videos
			$rules = array(
				'description' => 'required',
				'cover' => 'required|integer|exists:pictures,id'
			);

			$messages = array(
				'description.required' => 'Debes colocar una descripción',
				'cover.required' => 'Debes arrastrar o subir una imágen',
				'cover.exists' => 'Estás asociando una imágen que no existe'
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);


			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.meme.edit', array('id' => $id, 'type' => $type))
					->withErrors($validator)
					->withInput();
			} else {

				$meme = Meme::find($id);
				$meme->description = Input::get('description');
				$meme->tags = Input::get('tags');
				$meme->type = Input::get('type');
				$meme->pic = Input::get('cover');

				if(Input::has('status')) {
					$meme->status = 1;
				}else{
					$meme->status = 2;
				}
				$meme->save();
			}
		}else{
			$type = 'vine';

			//validation videos
			$rules = array(
				'vine' => 'required',
			);

			$messages = array(
				'vine.required' => 'Debes colocar una url de vine',
			);

			//check validation
			$validator = Validator::make(Input::all(), $rules, $messages);


			if ($validator->fails()) {
				$messages = $validator->messages();
				return Redirect::route('appanel.meme.edit', array('id' => $id, 'type' => $type))
					->withErrors($validator)
					->withInput();
			} else {
				$vine = Input::get('vine');
				$vine = explode("/", $vine);
				$vine = end($vine);

				$meme = Meme::find($id);
				$meme->id_vine = $vine;
				$meme->tags = Input::get('tags');
				$meme->type = Input::get('type');

				if(Input::has('status')) {
					$meme->status = 1;
				}else{
					$meme->status = 2;
				}
				$meme->save();
			}
		}

		return Redirect::route('appanel.meme.edit', array('id' => $id));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$meme = Meme::find($id);
		$meme->status = 0;
		$meme->save();

		return Redirect::to('appanel/meme/');
	}


}
