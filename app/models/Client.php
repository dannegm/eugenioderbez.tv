<?php

class Client extends Eloquent{

	public function adds(){
		return $this->hasMany('Add');
	}

}