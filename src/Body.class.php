<?php

class Body {
    private $componentes;

    function Body($aComponentes) {
        $this->componentes = $aComponentes;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->componentes as $value) {
            $sElementos .= $value;
        }

        return '<body>'.$sElementos.'</body>';
    }
}