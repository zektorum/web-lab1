<?php

class UserInput {
    private $type;
    private $value;

    public function __construct($type, $value) {
        $this->type = $type;
        $this->value = $value;
    }

    public function getType() {
        return $this->type;
    }

    public function getValue() {
        return $this->value;
    }
}