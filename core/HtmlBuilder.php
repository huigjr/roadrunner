<?php
class HtmlBuilder{

  // Default config
  protected $indenttype = "\t"; // TAB character
  protected $indentlevel = 0;
  
  // HTML attributes without value
  protected $novalueattributes = array('required','disabled','readonly');
  
  // HTML Tags without closing tag
  protected $selfclosing = array('img','input','meta');

  // Returns closure which returns node array and accepts middle part
  public function createNode($type, $attributes=null){
    $attributes = ($attributes === true) ? null : $attributes;
    return ( function($content, $flat=false) use ($type, $attributes){ 
      $opentag = '<'.$type.$this->parseAttributes($attributes).'>';
      return in_array($type, $this->selfclosing) ? $opentag : ($flat ? array($opentag.$content.'</'.$type.'>') : array($opentag, $content, '</'.$type.'>'));
    });
  }

  // Returns string of attributes
  protected function parseAttributes($array, $attributes=''){
    $valid = array('required','disabled','readonly','name','type','class','id','placeholder','value','style','src','alt','href','method','action','onclick');
    if(!empty($array)){
      foreach($array as $key => $value){
        if($value && (in_array($key, $valid) || strpos($key, 'data-') !== false)){
          $attributes .= (in_array($key, $this->novalueattributes)) ? ' '.$key : ' '.$key.'="'.$value.'"';
        }
      }
    }
    return $attributes;
  }

  // Parses array of HTML nodes to indented string
  public function makeString($array, $indentlevel=null){
    $indentlevel = $indentlevel ?: $this->indentlevel;
    $output = null;
    foreach($array as $item){
      $output .= (is_array($item)) ? $this->makeString($item, $indentlevel+1) : str_repeat($this->indenttype, $indentlevel).$item.PHP_EOL;
    };
    return $output;
  }
}
?>