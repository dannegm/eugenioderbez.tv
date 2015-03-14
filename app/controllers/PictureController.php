<?php

class PictureController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pictures = Picture::orderBy('id', 'desc')->paginate(100);
		$data = array(
			'title' => 'lista de imágenes',
			'pictures' => $pictures
		);
		return View::make('appanel/pictures/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{

	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$picture = Picture::find($id);
		$data = array(
			'title' => 'Vista previa',
			'picture' => $picture,
		);

		return View::make('appanel/pictures/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$nota = Nota::where('cover', '=', $id)->where('status', '=', '1')->get();
		$video = Nota::where('cover', '=', $id)->where('status', '=', '1')->get();
		$meme = Nota::where('cover', '=', $id)->where('status', '=', '1')->get();
		$user = Nota::where('cover', '=', $id)->where('status', '=', '1')->get();

		if($nota->isEmpty() && $video->isEmpty() && $meme->isEmpty() && $user->isEmpty()){
			$picture = Picture::find($id);
			
			unlink(public_path('pictures/'.$picture->url));
			unlink(public_path('pictures/large/'.$picture->url));
			unlink(public_path('pictures/normal/'.$picture->url));
			unlink(public_path('pictures/small/'.$picture->url));
			unlink(public_path('pictures/thumb/'.$picture->url));
			unlink(public_path('pictures/sq/'.$picture->url));
			unlink(public_path('pictures/sqm/'.$picture->url));
			unlink(public_path('pictures/medium/'.$picture->url));

			$picture->delete();

			return Redirect::to(route('appanel.picture.index'));
		}else{
			$data = array(
				'title' => 'Imposible Borrar'
			);
			return View::make('appanel/pictures/nodestroy', $data);
		}
	}


}
