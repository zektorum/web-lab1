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
