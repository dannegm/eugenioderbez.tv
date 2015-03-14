<?php

class CategoryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Necesitamos diferenciar entre categorías
		//$categories = Category::orderBy('id', 'desc')->whereStatus(1)->get();

		$notas = Category::categoryType('nota')->get();
		$videos = Category::categoryType('video')->get();
		$data = array(
			'title' => 'Categorías',
			'notas' => $notas,
			'videos' => $videos
		);
		return View::make('appanel/categories/index', $data);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$data = array(
			'title' => 'Nueva categoría',
		);
		return View::make('appanel/categories/create', $data);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$category = new Category;
		$category->name = Input::get('name');
		$category->objects = Input::get('objects');
		$category->author = Auth::id();
		if(Input::has('status')) {
			$category->status = 1;
		}else{
			$category->status = 0;
		}
		$category->save();

		return Redirect::to(route('appanel.category.index'));
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
		$cat = Category::find($id);
		$data = array(
			'title' => 'Editar Categoría',
			'cat' => $cat,
		);
		return View::make('appanel/categories/edit', $data);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$category = Category::find($id);
		$category->name = Input::get('name');
		$category->objects = Input::get('objects');
		$category->author = Auth::id();
		if(Input::has('status')) {
			$category->status = 1;
		}else{
			$category->status = 0;
		}
		$category->save();

		return Redirect::to('appanel/category/'.$id.'/edit');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
