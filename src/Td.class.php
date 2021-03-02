<?php

class Td {
    private $attributes;
    private $text;

    function Td($aAttributes, $sText) {
        $this->attributes = $aAttributes;
        $this->text = $sText;
    }

    public function __toString() {
        $sAttributes = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'"';
        }
        

        return '<td '.$sAttributes.'>'.$this->text.'</td>';
    }
}