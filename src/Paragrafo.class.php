<?php

class Paragrafo {
    private $type; //h1, h2...
    private $title;
    private $elements;

    function Paragrafo($sType, $sTitle, $aElements = []) {
        $this->type = $sType;
        $this->title = $sTitle;
        $this->elements = $aElements;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elements as $element => $value) {
            $sElementos .= $element.'="'.$value.'"';
        }

        return '<'.$this->type.' '.$sElementos.'>'
                .  $this->title
                .'</'.$this->type.'>';
    }
}