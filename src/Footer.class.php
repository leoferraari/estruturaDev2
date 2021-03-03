<?php

class Footer {
    private $componentes;

    function Footer($aComponentes) {
        $this->componentes = $aComponentes;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->componentes as $value) {
            $sElementos .= $value;
        }

        return '<footer>'.$sElementos.'</footer>';
    }
}