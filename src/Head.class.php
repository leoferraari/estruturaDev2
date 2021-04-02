<?php

class Head {
    private $elements;

    function __construct($aElements) {
        $this->elements = $aElements;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elements as $value) {
            $sElementos .= $value;
        }

        return '<head>'.$sElementos.'</head>';
    }
}