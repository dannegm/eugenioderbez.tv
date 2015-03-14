<?php

Class Meme extends Eloquent{

	public function user(){
		return $this->belongsTo('User', 'author', 'id');
	}

	public function img(){
		return $this->hasOne('Picture', 'id', 'pic');
	}

}