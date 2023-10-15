import {Validator} from "./validator.js"
import {precision} from "../entrypoint.js";

export class ValidatorForX extends Validator {

    validate () {

        const isValid = this.checkInputValue( // FIXME: check range
                this.input.type.minValue,
                this.input.type.maxValue,
                this.input.value,
                precision
            )
        return [
            "x",
            isValid
        ]

    }

}
