<?php 

class Nota extends Eloquent {

	public function categoria(){
		return $this->belongsTo('Category', 'category', 'id');
	}

	public function user(){
		return $this->belongsTo('User', 'author', 'id');
	}

	public function img(){
		return $this->hasOne('Picture', 'id', 'cover');
	}

	public function scopeNav($query){
		return $query->whereStatus(1)->orderBy('id', 'desc')->take(4);
	}

	public function scopeLasts($query){
		return $query->whereStatus(1)->orderBy('id', 'desc');
	}
}