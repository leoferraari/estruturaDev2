<?php

class Li {
    private $attributes;
    private $txt;

    function Li($aAttributes, $aTxt) {
        $this->attributes = $aAttributes;
        $this->txt = $aTxt;
    }

    public function __toString() {
        $sAttributes = '';
        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'" ';
        }
        
        return '<li '.$sAttributes.'>'.$this->txt.'</li>';
    }
}