<?php

class ImageController extends Controller{

	public function upload(){
		set_time_limit(3600);
		$up = Input::hasFile('file');
		$status = array();
		if($up){

			//guardamos la imágen en una variabñe
			$image = Input::file('file');

			//obtenemos el md5
			$md5 = md5_file($image);

			//consultamos el md5 en la bd
			$imagen = Picture::whereMd5($md5)->get();
			
			//si no encontramos coincidencias subimos
			if($imagen->isEmpty()){

				//traemos la extensión
				$ext = $image->getClientOriginalExtension();

				//generamos un uid
				$uid = uniqid();

				//generamos el nombre de la imagen
				$filename = $uid.'_'.$md5.'.'.$ext;

				//se mueve la imágen a la carpeta pictures
				$image->move('pictures', $filename);
				$fileUrl = URL::asset('pictures/'.$filename);
				$fileUrlMiddle = URL::asset('pictures/medium/'.$filename);
				$file = public_path('pictures/'.$filename);

				//asignamos las carpetas a variables
				$pathLarge = public_path('pictures/large/'.$filename);
				$pathNormal = public_path('pictures/normal/'.$filename);
				$pathMedium = public_path('pictures/medium/'.$filename);
				$pathSmall = public_path('pictures/small/'.$filename);
				$pathSq = public_path('pictures/sq/'.$filename);
				$pathSqm = public_path('pictures/sqm/'.$filename);
				$pathThumb = public_path('pictures/thumb/'.$filename);

				//redimensiones, a todos tamaños  de carpetascuidando el upsize
				Image::make($file)->resize(1280, null, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($pathLarge);
				Image::make($file)->resize(960, null, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($pathNormal);
				Image::make($file)->resize(640, null, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($pathMedium);
				Image::make($file)->resize(320, null, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($pathSmall);
				Image::make($file)->resize(160, null, function ($constraint) {
					$constraint->aspectRatio();
					$constraint->upsize();
				})->save($pathThumb);
				Image::make($file)->resize(256, 256)->save($pathSq);
				Image::make($file)->resize(64, 64)->save($pathSqm);

				//insertamos la imagen en la bd
				$picture = new Picture;
				$picture->md5 = $md5;
				$picture->url = $filename;
				$picture->author = Auth::id();
				$picture->save();

				//obtenemos el id
				$id = $picture->id;

				//guardamos el status
				$status = array(
					'status' => 'success',
					'time'=> array(
						'time' => time()
					),
					'description' => 'Se guardó la imagen',
					'pic' => $fileUrl,
					'filelink' => $fileUrlMiddle,
					'id' => $id
				);
			}else{
				//si la imágen ya existe obtenemos la url
				$fileUrl = URL::asset('pictures/'.$imagen[0]->url);
				$fileUrlMiddle = URL::asset('pictures/medium/'.$imagen[0]->url);
				//guardamos el status en json
				$status = array(
					'status' => 'repeat',
					'time'=> array(
						'time' => time()
					),
					'description' => 'La imágen ya existe',
					'pic' => $fileUrl,
					'filelink' => $fileUrlMiddle,
					'id' => $imagen[0]->id
				);
			}
		}else{
			//si la imagen no sube guardamos el error
			$status = array(
				'status' => 'error',
				'time'=> array(
					'time' => time()
				),
				'error' => 'error',
				'pic' => 'error'
			);
		}

		//$status = json_encode($status);
		return Response::json($status);

	}

	public function index(){
		echo public_path('pictures/large/');
	}

	public function picsJSON(){
		$pictures = Picture::all();
		foreach($pictures as $p){
			$res[] = Array(
				'url' => URL::to('/').'/pictures/sq/' . $p->url,
				'folder' => 'General',
				'image' => URL::to('/').'/pictures/medium/' . $p->url,
				'thumb' => URL::to('/').'/pictures/sq/' . $p->url,
				'name' => $p->oldname,
			);
		}
		return Response::json($res);
	}
}