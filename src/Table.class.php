<?php

class Table {
    private $attributes;
    private $rows;

    function Table($aAttributes, $aRows) {
        $this->attributes = $aAttributes;
        $this->rows = $aRows;
    }

    public function __toString() {
        $sAttributes = '';
        $sRows = '';
        
        foreach ($this->attributes as $attr => $value) {
            $sAttributes .= $attr.'="'.$value.'"';
        }

        foreach ($this->rows as $value) {
            $sRows .= $value;
            $sRows .= '<br>';
        }

        return '<table '.$sAttributes.'>'.$sRows.'</table>';
    }
}