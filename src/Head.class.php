<?php

class Head {
    private $elements;
    private $title;

    function Head($aElements, $sTitle) {
        $this->elements = $aElements;
        $this->title = $sTitle;
    }

    public function __toString() {
        $sElementos = '';
        
        foreach ($this->elements as $value) {
            $sElementos .= $value;
        }

        $sElementos .= $this->title;

        return '<head>'.$sElementos.'</head>';
    }
}