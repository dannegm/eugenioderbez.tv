<?php

class Add extends Eloquent{
	protected $table = 'anuncios';

	public function cliente(){
		return $this->belongsTo('Client');
	}

	public function posicion(){
		return $this->belongsTo('Position');
	}

	public function img(){
		return $this->hasOne('Picture', 'id', 'pic_id');
	}

}