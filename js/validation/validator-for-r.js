import {Validator} from "./validator.js"

export class ValidatorForR extends Validator {

    validate () {

        const r = this.input;
        const isValid = r.value >= r.type.minValue &&
            r.value <= r.type.maxValue && this.isInRange();
        return [
            "r",
            isValid
        ];

    }

}
