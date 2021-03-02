<?php

class Li {
    private $txt;
    private $class;

    function Li($pTxt,$pClass) {
        $this->txt   = $pTxt;
        $this->class = $pClass;
    }

    function __toString() {
        return '<li class='.$this->class
        .'>'.$this->txt.'</li>';
    }
}