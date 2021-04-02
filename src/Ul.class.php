<?php

class Ul {
    private $itens;

    public function __construct($aItens) {
        $this->itens = $aItens;
    }

    public function __toString() {
        $sUl = '<ul>';
        foreach ($this->itens as $value) {
            $sUl .= $value;
        }
        $sUl .= '</ul>';
        return $sUl;
    }

}