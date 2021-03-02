<?php

class Link {

    private $elements;
    private $button;

    function Link($aElementos, $bButton = true) {
        $this->elements = $aElementos;
        $this->button = $bButton;
    }
    
    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elements as $element => $value) {
            $sElementos .= $element.'="'.$value.'"';
        }
    
        if($this->button) {
            return '<a '.$sElementos.'></a>';
        }
    
        return '<link '.$sElementos.'></link>';
    }
}

