<?php

class Html {
    private $lang;
    private $head;
    private $body;

    function Html($sLang, $sHead, $sBody) {
        $this->lang = $sLang;
        $this->head = $sHead;
        $this->body = $sBody;
    }

    public function __toString() {
        return '<html lang="'.$this->lang.'"'
        . $this->head  
        . $this->body 
        . '</html>';
    }
}