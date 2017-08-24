<?php

namespace FnacApiGui\Model;

class Model
{
    public $tstring;
    public $template;

    public function __construct(){

    }
    
    public function setTemplate($template) {
      $this->template = $template;
    }

}
