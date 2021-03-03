<?php

class Img {
    private $attributes;

    function Img($aAttributes) {
        $this->attributes = $aAttributes;
    }

    public function __toString() {
        $sAttributes = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'" ';
        }
        
        return '<img '.$sAttributes.'>';
    }
}