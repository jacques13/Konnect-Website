<?php
	function cleanUp($string) {
		$string =  htmlentities($string, ENT_QUOTES, 'UTF-8');
		$string = strip_tags($string);
		$string = stripslashes($string);
		$string = preg_replace("/[^ \w]+/", "", $string);
		
		//$string =  mysql_real_escape_string($string);
		return $string;
		
		
		

	}
?>