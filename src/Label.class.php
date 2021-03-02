<?php

class Label {
    private $for;
    private $text;

    function Label($sFor, $sText) {
        $this->for = $sFor;
        $this->text = $sText;
    }

    public function __toString() {
        return '<label for="'.$this->for.'">'.$this->text.':</label>';
    }
}