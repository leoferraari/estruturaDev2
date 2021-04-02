<?php

class Input {
    private $attributes;
    private $bQuebra;

    function Input($aAttributes, $bQuebra = true) {
        $this->attributes = $aAttributes;
        $this->bQuebra = $bQuebra;
    }

    public function __toString() {
        $sAttributes = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'" ';
        }
        
        return '<input '.$sAttributes.'>'.($this->bQuebra ? '<br>' : '');
    }
}