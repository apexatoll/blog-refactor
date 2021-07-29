<?php namespace core;

class View extends HTML {
	protected function box($title, $class=null){
		$this->div($class ? "box $class" : "box");
		$this->header(2, $title);
		$this->div("content");
	}
	protected function close_box(){
		$this->close("div");
		$this->close("div");
	}
}

?>
