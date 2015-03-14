<?php

namespace Helpers;

class Clean{

	/*
	|--------------------------------------------------------------------------
	| Sanitizing functions
	|--------------------------------------------------------------------------
	|
	*/

	public static function desc($text, $length){
		$text = strip_tags($text);
		$text = htmlentities($text);

		if(strlen($text) > $length) {
			$text = substr($text, 0, strpos($text, ' ', $length));
		}

		return $text;
	}

}