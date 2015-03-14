<?php

namespace Helpers;

class Sanitize{

	/*
	|--------------------------------------------------------------------------
	| Sanitizing functions
	|--------------------------------------------------------------------------
	|
	*/

	public function video_desc($text, $length){
		$text = strip_tags($text);
		if(strlen($text) > $length) {
			$text = substr($text, 0, strpos($text, ' ', $length));
		}

		return $text;
	}

}