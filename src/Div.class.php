<?php

class Div {
    private $attributes;
    private $components;

    function Div($aAttributes, $aComponents) {
        $this->attributes = $aAttributes;
        $this->components = $aComponents;
    }

    public function __toString() {
        $sAttributes = '';
        $sComponents = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'" ';
        }

        foreach ($this->components as $value) {
            $sComponents .= $value;
        }
        
        return '<div '.$sAttributes.'>'.$sComponents.'</div>';
    }
}