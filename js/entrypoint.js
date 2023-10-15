import {ValidatorForX} from "./validation/validator-for-x.js";
import {ValidatorForY} from "./validation/validator-for-y.js"
import {ValidatorForR} from "./validation/validator-for-r.js"
import {UserInput} from "./user-input.js"

export const precision = 0.0000000000000000001;

const inputType = {
    "x": {"minValue": -4,
        "maxValue": 4,
        "delta": 1},
    "y": {"minValue": -5,
        "maxValue": 3},
    "r": {"minValue": 1,
        "maxValue": 5,
        "delta": 1}
}

function showError(fieldName) {
    document.getElementById("error-message").style.display = "block"
    document.getElementById("error-message").textContent = "Input " + fieldName + " is invalid."
}

function validateAllData () {

    const x = document.querySelector("input[type=checkbox]:checked")
    const y = document.getElementById("y")

    if (x == null) {
        showError("x")
        return false
    } else if (y.value == "") {
        showError("y")
        return false
    }

    const fieldX = new UserInput( //
            inputType.x,
            x.value
        ),
        fieldY = new UserInput(
            inputType.y,
            y.value
        ),
        fieldR = new UserInput(
            inputType.r,
            document.getElementById("r").value
        )

    const validators = [
        new ValidatorForX(fieldX),
        new ValidatorForY(fieldY),
        new ValidatorForR(fieldR)
    ]

    document.getElementById("error-message").style.display = "none"
    for (let i = 0; i < validators.length; ++i) {

        console.log("in loop")
        const [type, isValid] = validators[i].validate()

        if (!isValid)
        {


            return false

        }

    }
    return true

}

window.validateAllData = validateAllData
