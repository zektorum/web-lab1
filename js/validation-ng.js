class UserInput {
    constructor(type, value) {
        this.type = type
        this.value = value
    }
}

class Validator {
    constructor(value) {
        this.input = value
    }

    validate() {}
}

class ValidatorForX extends Validator {
    validate() {
        const x = this.input.value
        const isValid = x >= x.type.minValue &&
            x <= x.type.maxValue &&
            (parseInt(x) % 0.5 == 0 || parseInt(x) % 0.5 == 0.5)
    }
}

class ValidatorForYR {
    constructor(value) {
        this.input = value
    }

    validate() {
        const isValid = isIntegerOrFloat(this.input.value) &&
            checkInputValue(this.input.type.minValue, this.input.type.maxValue, this.input.value, precision)
        return [this.input.type, isValid]
    }
}
