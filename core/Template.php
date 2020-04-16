<?php
class Template{

	protected $template;
  protected $variables = array();

  // Start class with full template filepath and optional variables
	public function __construct($template, $array=null){
		$this->template = $template;
    if($array) foreach($array as $key => $value) $this->variables[$key] = $value;
	}

  // Set variable for use in template
	public function __set($key, $value){
		$this->variables[$key] = $value;
	}

  // echo template to browser
	public function __toString(){
		extract($this->variables);
		ob_start();
		include($this->template);
		return ob_get_clean();
	}
}
?>