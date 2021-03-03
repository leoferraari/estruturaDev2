<?php

class Form {
    private $attributes;
    private $components;

    function Form($aAttributes, $aComponents) {
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
        
        return '<form '.$sAttributes.'>'.$sComponents.'</form>';
    }
}