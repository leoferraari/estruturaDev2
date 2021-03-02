<?php

class Title {
    private $elements;
    private $title;

    function Title($sTitle, $aElements) {
        $this->title = $sTitle;
        $this->elements = $aElements;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elements as $element => $value) {
            $sElementos .= $element.'="'.$value.'"';
        }
        return '<title '.$sElementos.'>'.$this->title.'</title>';
    }
}