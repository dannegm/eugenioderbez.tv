<?php

class Picture extends Eloquent{
	
	public function nota()
	{
		return $this->belongsTo('Nota', 'cover', 'id');
	}

	public function video()
	{
		return $this->belongsTo('Video', 'pic', 'id');
	}

	public function meme()
	{
		return $this->belongsTo('Meme', 'pic', 'id');
	}

	public function add()
	{
		return $this->belongsTo('Add', 'pic_id', 'id');
	}

}