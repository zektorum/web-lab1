import {Validator} from "./validator.js"
import {precision} from "../entrypoint.js";

export class ValidatorForX extends Validator {

    validate () {

        const isValid = this.isInteger(this.input.value) && this.checkInputValue( // FIXME: check range
                this.input.type.minValue,
                this.input.type.maxValue,
                this.input.value,
                precision
            ) && this.isInRange()
        return [
            "X",
            isValid
        ]

    }

}
