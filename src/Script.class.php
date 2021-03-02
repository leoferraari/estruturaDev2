<?php

class Script {
    private $elementos;

    function Script($aElementos) {
        $this->elementos = $aElementos;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elementos as $element => $value) {
            $sElementos .= $element.'="'.$value.'"';
        }

        return '<script '.$sElementos.'></script>';
    }
}