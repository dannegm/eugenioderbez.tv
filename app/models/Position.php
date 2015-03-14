<?php

class Position extends Eloquent{

	public function add(){
		return $this->hasOne('Add');
	}

	public function cliente(){
		return $this->belongsTo('Client');
	}
}