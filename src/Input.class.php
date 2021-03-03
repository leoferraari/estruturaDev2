<?php

class Input {
    private $attributes;

    function Input($aAttributes) {
        $this->attributes = $aAttributes;
    }

    public function __toString() {
        $sAttributes = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'" ';
        }
        
        return '<input '.$sAttributes.'>';
    }
}