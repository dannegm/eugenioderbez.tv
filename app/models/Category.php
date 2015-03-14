<?php

class Category extends Eloquent{
	protected $table = 'categories';

    public function videos()    {
        return $this->hasMany('Video', 'category');
    }

    public function notas()    {
        return $this->hasMany('Video', 'category');
    }

    public function scopeCategoryType($query, $type){
    	 return $query->where('objects', '=', $type)->where('status', '=', 1);
    }
}