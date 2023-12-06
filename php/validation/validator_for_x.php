<?php

namespace validation;

include_once "const.php";
include_once "validator.php";

class ValidatorForX extends Validator {
    public function validate() {
        $isValid = $this->checkInputValue(
                $this->getUserInput()->getType()->getMinValue(),
                $this->getUserInput()->getType()->getMaxValue(),
                $this->getUserInput()->getValue(),
                precision
            ) && $this->isInRange();
        return ["X", $isValid];
    }
}
