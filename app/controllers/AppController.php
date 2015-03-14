<?php 

class AppController extends Controller{

	public function login(){
		if(Auth::check()){
			return Redirect::to(route('index'));
		}
		$data=array(
			'title' => 'Login',
		);
		return View::make('appanel/login', $data);
	}

	public function entrar(){
		$username = Input::get('username');
		$password = Input::get('password');
		$_token = Input::get('_token');

		if(Auth::attempt(array('username' => $username, 'password' => md5($password) ))){
			return Redirect::to('appanel/index');
			echo 'login exitoso';
			echo Auth::id();
		}else{
			return Redirect::route('appanel')
				->withErrors(array('La contraseña o el password son incorrectos'))
				->withInput();
		}
	}

	public function salir(){
		Auth::logout();
		return Redirect::to('appanel');
	}

	public function index(){
		//notas
		$destacadas = Configurando::where('tipe', '=', 'nota_destacados')->first();
		$dato = (array) json_decode($destacadas->data);
		foreach($dato['destacados'] as $d => $v){
			$array[] = $v;
		}
		$ids = implode(',', $array);
		$notas = Nota::whereIn('id', $array)->orderByRaw(DB::raw("FIELD(id, $ids)"))->get();

		//videos
		$destacados = Configurando::where('tipe', '=', 'video_destacados')->first();
		$data2 = (array) json_decode($destacados->data);
		foreach($data2['destacados'] as $d => $v){
			$array2[] = $v;
		}
		$ids2 = implode(',', $array2);
		$videos = Video::whereIn('id', $array2)->orderByRaw(DB::raw("FIELD(id, $ids2)"))->get();

		$data = array(
			'title' => 'Inicio',
			'notas' => $notas,
			'videos' => $videos
		);
		if(Auth::check()){
			return View::make('appanel/index', $data);
		}else{
			return Redirect::to('appanel');
		}
	}
}