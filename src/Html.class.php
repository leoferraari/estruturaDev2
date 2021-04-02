<?php

class Html {
    private $head;
    private $body;

    public function __construct($pHead, $pBody) {
        $this->head = $pHead;
        $this->body = $pBody;
    }

    public function __toString() {
        $html = "<html>{$this->head}{$this->body}</html>";
        return $html;
    }
}