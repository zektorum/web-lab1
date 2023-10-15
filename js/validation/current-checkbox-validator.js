class CurrentCheckboxValidator {

    constructor () {
        const allInputs = document.getElementsByTagName("input")
        this.checkboxes = this.getCheckboxes(allInputs)
    }

    getCheckboxes (inputs) {

        const checkboxes = []
        for (let i = 0; i < inputs.length; ++i) {

            if (inputs[i].type == "checkbox") {

                checkboxes.push(inputs[i])

            }

        }
        return checkboxes

    }

    selectCurrentCheckbox (currentCheckboxId) {

        for (let i = 0; i < this.checkboxes.length; ++i) {

            if (this.checkboxes[i].id != currentCheckboxId) {

                this.checkboxes[i].checked = false

            }

        }

    }
}
