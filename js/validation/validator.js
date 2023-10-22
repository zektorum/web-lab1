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

        return value.match(/^[\-]?\d$/g) != null

    }

    isIntegerOrFloat (value) {

        return value.match(/[+-]?[0-9]+(\.[0-9]+)*/g) != null;

    }

    greaterThanStartValue (start, current) {

        // Если разница между числами меньше precision, то числа равны
        return !Math.abs(start - current) < precision && start < current;

    }

    lowerThanEndValue (end, current) {

        return !Math.abs(end - current) < precision && end > current;

    }

    checkInputValue (start, end, current, precision) {

        const value = this.greaterThanStartValue(
            start,
            current,
            precision
        ) && this.lowerThanEndValue(
            end,
            current,
            precision
        );
        console.log(`it is ${value}`);
        return value;
        // Return greaterThanStartValue(start, current, precision) && lowerThanEndValue(end, current, precision)

    }

}
