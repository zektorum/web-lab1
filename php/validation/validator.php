<?php

namespace validation;

include_once __DIR__ . "/../user_input.php";

use UserInput;

class Validator {
    private $userInput;

    public function __construct(UserInput $userInput) {
        $this->userInput = $userInput;
    }

    public function getUserInput() {
        return $this->userInput;
    }

    public function validate() {}

    public function isInRange() {
        // Only for x and r
        $current = $this->userInput;
        if (is_float($current)) {
            return false;
        }
        for ($valueFromRange = $current->getType()->getMinValue(); $valueFromRange <= $current->getType()->getMaxValue();
             $valueFromRange += $current->getType()->getDelta()) {
            if ($current->getValue() - $valueFromRange) {
                return true;
            }
        }
        return false;
    }

    public function isInteger($value) {
        return is_integer($value);
    }

    public function isIntegerOrFloat($value) {
        return is_integer($value) || is_float($value);
    }

    public function equalOrGreaterThanStartValue($start, $current, $precision) {
        $abs = abs($start - $current);
        return $abs >= $precision && $start < $current || $abs < $precision;
    }

    public function equalOrLowerThanEndValue($end, $current, $precision) {
        $abs = abs($end - $current);
        return $abs >= $precision && $end > $current || $abs < $precision;
    }

    public function checkInputValue($start, $end, $current, $precision) {
        return $this->equalOrGreaterThanStartValue($start, $current, $precision)
            && $this->equalOrLowerThanEndValue($end, $current, $precision);
    }

}