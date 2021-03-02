<?php

class Tr {
    private $attributes;
    private $columns;

    function Tr($aAttributes, $aColumns) {
        $this->attributes = $aAttributes;
        $this->columns = $aColumns;
    }

    public function __toString() {
        $sAttributes = '';
        $sColumns = '';

        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'"';
        }

        foreach ($this->columns as $value) {
            $sColumns .= $value;
        }

        return '<tr '.$sAttributes. '>'.$sColumns.'</tr>';
    }
}