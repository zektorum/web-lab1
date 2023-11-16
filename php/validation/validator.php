<?php

namespace validation;

use UserInput;

class Validator {
    private UserInput $userInput;

    public function __construct(UserInput $userInput) {
        $this->userInput = $userInput;
    }

    public function isInRange() {
        $current = $this->userInput;
        for ($valueFromRange = $current->getType()->getMinValue(); $current->getValue() < $current->getType()->getMaxValue();
             $valueFromRange += $current->getType()->getDelta()) {
            if ($current == $valueFromRange) {
                return true;
            }
        }
        return false;
    }

    public function isInteger() {

    }

}