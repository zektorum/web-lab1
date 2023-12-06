<?php

namespace validation;

include "const.php";
include "validator.php";

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
