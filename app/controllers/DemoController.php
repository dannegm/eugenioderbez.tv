<?php
class DemoController extends Controller{

	public function index(){
		$notas = Nota::paginate(10);
		foreach($notas as $n){
			echo $n->title.' - ';
			echo $n->categoria->name.'<br>';
		}
		echo $notas->links();
	}
}