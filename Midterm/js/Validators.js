class Validators {
    Form = document.querySelector("#user-submit-form")
    SubmitButton = document.querySelector("#user-form-submit-button")
    tax_rate = 0.13

    constructor() {
        this.Form.onsubmit = (event) => {
            event.preventDefault();
            this.FormData = new FormData(event.target);
            // clear previous messages
            document.querySelectorAll(".error-message").forEach(element => {
                    element.innerHTML = ""
                })
                // validators
            const is_name_valid = this.EmptyValidator("user-form-name", "Name")
            const is_phone_number_valid = this.PhoneNumberValidator()
            if (is_name_valid && is_phone_number_valid) {
                _alert.Show("Submit successfully", undefined, 5000)
                    // send data to api
                console.log(`User's Name: ${this.FormData.get("user-form-name")}`)
                console.log(`Phone Number: ${this.FormData.get("user-form-phone")}`)
                let order_list = ""
                let subtotal_price = 0
                data.forEach(item => {
                    order_list += `- Product Name: ${item.name}, Unit Price: ${item.price}, Count: ${item.count}\n`
                    let summary_price = item.count * item.price
                    subtotal_price += summary_price
                })
                const tax = subtotal_price * this.tax_rate
                const total_price = subtotal_price + tax
                order_list += `Subtotal: ${subtotal_price}\nHST: ${tax.toFixed(2)}\nTOTAL:${total_price.toFixed(2)}`
                console.log(`Order List: \n${order_list}`)
            } else {
                _alert.Show("Submit unsuccessfully, please check the form", "error", 5000)
            }
        }
    }

    EmptyValidator(node_name, message_name) {
        const input_string = this.FormData.get(node_name).trim()
        if (input_string.length == 0) {
            this.NotifyError(node_name, `${message_name} should not be empty`)
            return false
        }
        return true
    }

    PhoneNumberValidator() {
        const phone = this.FormData.get("user-form-phone").trim()
        const phone_reg = /^\d{3}-\d{3}-\d{4}$/
        if (!phone_reg.test(phone)) {
            this.NotifyError("user-form-phone", "Phone number format is invalid")
            return false
        }
        return true
    }

    NotifyError(node_name, error_message) {
        const error_message_node = document.querySelector(`[data-name='${node_name}'] .error-message`)
        error_message_node.innerHTML = error_message
    }
}