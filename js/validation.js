const precision = 0.0000000001
const y = { startValue: -5, endValue: 5 }
const r = { startValue: 2, endValue: 5 }
const inputType = {
    x: { 'minValue': -2, 'maxValue': 2, 'delta': 0.5 },
    y: { 'minValue' : -5, 'maxValue': 5},
    r: { 'minValue': 2, 'maxValue': 5 }
}

function getCheckboxes() {
    var inputs = document.getElementsByTagName("input")
    var checkboxes = []
    for (var i = 0; i < inputs.length; ++i) {
        if (inputs[i].type == "checkbox") {
            checkboxes.push(inputs[i])
        }
    }
    return checkboxes
}

function checkCurrentCheckbox(id) {
    var checkboxes = getCheckboxes()
    for (var i = 0; i < checkboxes.length; ++i) {
        if (checkboxes[i].id != id) {
            checkboxes[i].checked = false
        }
    }
}

function isIntegerOrFloat(value) {
    return value.match(/[0-9]+([.,][0-9]+)*/g) != null
}

function greaterThanStartValue(start, current) {
    // Если разница между числами меньше precision, т.е. равна нулю, то числа равны
    return !Math.abs(start - current) < precision && start < current
}

function lowerThanEndValue(end, current) {
    return !Math.abs(end - current) < precision && end > current
}

function checkInputValue(start, end, current, precision) {
    const value = greaterThanStartValue(start, current, precision) && lowerThanEndValue(end, current, precision)
    console.log("it is " + value)
    return value
    // return greaterThanStartValue(start, current, precision) && lowerThanEndValue(end, current, precision)
}

function checkInput() {
    var currentY = document.getElementById("y").value
    var currentR = document.getElementById("r").value
    var eps = precision

    if (!(isIntegerOrFloat(currentY) && isIntegerOrFloat(currentR))) {
        return false
    }
    return checkInputValue(y.startValue, y.endValue, currentY, eps)
        && checkInputValue(r.startValue, r.endValue, currentR, eps)
}

function start() {
    const fieldX = new UserInput(inputType.x, document.getElementById("x").value)
    const fieldY = new UserInput(inputType.y, document.getElementById("y").value)
    const fieldR = new UserInput(inputType.r, document.getElementById("r").value)

    const validators = [new ValidatorForX(fieldX), new ValidatorForYR(fieldY), new ValidatorForYR(fieldR)]
    for (let i = 0; i < validators.length; ++i) {
        validators[i].validate()
    }
}
