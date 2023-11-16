<?php

class UserInput {
    private InputType $type;
    private string $value;

    public function __construct(InputType $type, string $value) {
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