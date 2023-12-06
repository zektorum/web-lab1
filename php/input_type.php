<?php

class InputType {
    private $minValue;
    private $maxValue;
    private $delta;

    public function __construct($minValue, $maxValue, $delta) {
        $this->minValue = $minValue;
        $this->maxValue = $maxValue;
        $this->delta = $delta;
    }

    public function getMinValue() {
        return $this->minValue;
    }

    public function getMaxValue() {
        return $this->maxValue;
    }

    public function getDelta() {
        return $this->delta;
    }
}

class InputTypeX extends InputType {
    public function __construct() {
        parent::__construct(-4, 4, 1);
    }

    public function getMinValue() {
        return parent::getMinValue();
    }

    public function getMaxValue() {
        return parent::getMaxValue();
    }

    public function getDelta() {
        return parent::getDelta();
    }
}


class InputTypeY extends InputType {
    public function __construct() {
        parent::__construct(-5, 3, 0);
    }

    public function getMinValue() {
        return parent::getMinValue();
    }

    public function getMaxValue() {
        return parent::getMaxValue();
    }

    public function getDelta() {
        return parent::getMaxValue();
    }
}

class InputTypeR extends InputType {
    public function __construct() {
        parent::__construct(1, 5, 1);
    }

    public function getMinValue() {
        return parent::getMinValue();
    }

    public function getMaxValue() {
        return parent::getMaxValue();
    }

    public function getDelta() {
        return parent::getMaxValue();
    }
}
