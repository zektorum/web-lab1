import {precision} from "../entrypoint.js"

export class Validator {

    constructor (value) {

        this.input = value;

    }

    validate () {}

    isInRange () {

        const current = this.input;
        for (let valueFromRange = current.type.minValue; current.value <= current.type.maxValue;
            valueFromRange += current.type.delta) {

            if (current.value == valueFromRange) {

                return true;

            }

        }
        return false;

    }

    isInteger (value) {

        return value.match(/^-?\d$/g) != null

    }

    isIntegerOrFloat (value) {

        return value.match(/^[+-]?[0-9]+(\.[0-9]+)*$/g) != null;

    }

    equalOrGreaterThanStartValue (start, current) {

        // Если разница между числами меньше precision, то числа равны
        const abs = Math.abs(start - current)
        return abs >= precision && start <= current || abs < precision;

    }

    equalOrLowerThanEndValue (end, current) {

        const abs = Math.abs(end - current)
        return abs >= precision && end >= current || abs < precision;

    }

    checkInputValue (start, end, current, precision) {

        const value = this.equalOrGreaterThanStartValue(
            start,
            current,
            precision
        ) && this.equalOrLowerThanEndValue(
            end,
            current,
            precision
        );
        console.log(`it is ${value}`);
        return value;
        // Return greaterThanStartValue(start, current, precision) && lowerThanEndValue(end, current, precision)

    }

}
