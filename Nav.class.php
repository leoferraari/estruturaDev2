<?php

class Nav {
    private $componentes;

    function Nav($aComponentes) {
        $this->componentes = $aComponentes;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->componentes as $value) {
            $sElementos .= $value;
        }

        return '<nav>'.$sElementos.'</nav>';
    }
}