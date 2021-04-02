<?php

class Href {
    private $link;
    private $txt;

    function Href($sLink, $sTxt) {
        $this->link = $sLink;
        $this->txt  = $sTxt;
    }

    function __toString() {
        return '<a href="'.$this->link.'">'.$this->txt.'</a>';
    }
}