<?php

class Index extends Eloquent{
	/*
	|--------------------------------------------------------------------------
	| Sanitizing functions
	|--------------------------------------------------------------------------
	|
	*/

	public function sanitize($text, $length){
		$text = strip_tags($text);
		if(strlen($text) > $length) {
			$text = substr($text, 0, strpos($text, ' ', $length));
		}
		return $text;
	}

}