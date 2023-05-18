class Validators {
    Form = document.querySelector("#user-submit-form")
    SubmitButton = document.querySelector("#user-form-submit-button")

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
            const is_email_valid = this.EmailValidator()
            const is_password_valid = this.PasswordConfirmValidator()
            const is_post_code_valid = this.PostCodeValidator()
            const is_address_valid = this.EmptyValidator("user-form-address", "Address")
            const is_city_valid = this.EmptyValidator("user-form-city", "City")
            const is_province_valid = this.EmptyValidator("user-form-province", "Province")
            const is_card_number_valid = this.CreditCardNumberValidator()
            const is_card_date_valid = this.DateValidator()
            const is_minimum_price_valid = this.MininumPriceValidator()
            if (is_name_valid && is_phone_number_valid && is_email_valid && is_password_valid && is_post_code_valid && is_address_valid && is_city_valid && is_province_valid && is_card_number_valid && is_card_date_valid && is_minimum_price_valid) {
                _alert.Show("Submit successfully", undefined, 5000)
                    // send data to api
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

    PostCodeValidator() {
        const postcode = this.FormData.get("user-form-post-code").trim()
        const postcode_reg = /^[A-Za-z]\d[A-Za-z]\s{0,1}\d[A-Za-z]\d$/
        if (!postcode_reg.test(postcode)) {
            this.NotifyError("user-form-post-code", "Post code format is invalid")
            return false
        }
        return true
    }

    EmailValidator() {
        const email = this.FormData.get("user-form-email").trim()
        const email_reg = /^\w+@\w+.\w+$/
        if (!email_reg.test(email)) {
            this.NotifyError("user-form-email", "Email format is invalid")
            return false
        }
        return true
    }

    CreditCardNumberValidator() {
        const card_number = this.FormData.get("user-form-card-number").trim()
        const card_number_reg = /^\d{4}-\d{4}-\d{4}-\d{4}$/
        if (!card_number_reg.test(card_number)) {
            this.NotifyError("user-form-card-number", "Credit card format is invalid")
            return false
        }
        return true
    }

    CreditCardExpiryYearValidator() {
        const expiry_year = this.FormData.get("user-form-card-expiry-year").trim()
        const expiry_year_reg = /^\d{4}$/
        if (!expiry_year_reg.test(expiry_year)) {
            this.NotifyError("user-form-card-expiry-year", "Expiry year format is invalid")
            return false
        }
        return true
    }

    CreditCardExpiryMonthValidator() {
        const expiry_month = this.FormData.get("user-form-card-expiry-month").trim()
        const expiry_month_reg = /^(JAN|FEB|MAR|APR|MAY|JUN|JUL|AUG|SEP|OCT|NOV|DEC)$/i
        if (!expiry_month_reg.test(expiry_month)) {
            this.NotifyError("user-form-card-expiry-month", "Expiry month format is invalid")
            return false
        }
        return true
    }

    DateValidator() {
        const is_year_valid = this.CreditCardExpiryYearValidator()
        const is_month_valid = this.CreditCardExpiryMonthValidator()
        const month_dict = {
            JAN: 1,
            FEB: 2,
            MAR: 3,
            APR: 4,
            MAY: 5,
            JUN: 6,
            JUL: 7,
            AUG: 8,
            SEP: 9,
            OCT: 10,
            NOV: 11,
            DEC: 12,
        }
        const current_date = new Date()
        if (is_year_valid && is_month_valid) {
            const digit_month = new Date(month_dict[this.FormData.get("user-form-card-expiry-month").trim()])
            const card_expiry_date = new Date(this.FormData.get("user-form-card-expiry-year").trim(), digit_month)
            if (card_expiry_date < current_date) {
                this.NotifyError("user-form-card-expiry-year", "You card has expired")
                return false
            }
            return true
        }
        return false
    }

    PasswordFormatValidator(node_name, message_name) {
        const input_string = this.FormData.get(node_name).trim()
        if (input_string.length < 6) {
            this.NotifyError(node_name, `${message_name} length should be 6 or more`)
            return false
        }
        return true
    }

    PasswordConfirmValidator() {
        const is_password_valid = this.PasswordFormatValidator("user-form-password", "Password")
        const is_confirm_password_valid = this.PasswordFormatValidator("user-form-confirm-password", "Confirm Password")
        if (is_password_valid && is_confirm_password_valid) {
            if (this.FormData.get("user-form-password").trim() !== this.FormData.get("user-form-confirm-password").trim()) {
                this.NotifyError("user-form-confirm-password", `The confirm password is different from the password`)
                return false
            }
            return true
        }
        return false
    }

    MininumPriceValidator() {
        const subtotal_price = parseInt(this.FormData.get("user-form-card-subtotal-price"))
        if (subtotal_price >= 10) {
            return true
        }
        return false
    }

    NotifyError(node_name, error_message) {
        const error_message_node = document.querySelector(`[data-name='${node_name}'] .error-message`)
        error_message_node.innerHTML = error_message
    }
}