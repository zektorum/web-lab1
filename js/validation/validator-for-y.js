import {Validator} from "./validator.js"
import {precision} from "../entrypoint.js"

export class ValidatorForY extends Validator {

    validate () {

        this.input.value = this.input.value.replace(",", ".")
        const isValid = this.isIntegerOrFloat(this.input.value) &&
            this.checkInputValue(
                this.input.type.minValue,
                this.input.type.maxValue,
                this.input.value,
                precision
            )
        return [
            "Y",
            isValid
        ]

    }

}
