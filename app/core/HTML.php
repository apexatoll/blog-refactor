<?php namespace core;

class HTML {
	protected function div($class){
		echo "<div class='$class'>";
	}
	protected function header($n, $text){
		echo "<h$n>$text</h$n>";
	}
	protected function close($tag){
		echo "</$tag>";
	}
}

?>
