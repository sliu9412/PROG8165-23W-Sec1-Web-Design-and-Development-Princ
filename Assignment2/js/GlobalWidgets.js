class Alert {
    Alert = document.querySelector('#Alert')
    timer = setTimeout(() => {}, 0)

    Show(message, c = "", last_time = 3000) {
        clearTimeout(this.timer)
        this.Alert.innerHTML = message
        this.Alert.style.display = 'block'
        if (c == "error") {
            this.Alert.style.backgroundColor = "rgba(196, 69, 54, 0.9)"
        } else {
            this.Alert.style.backgroundColor = "rgba(25, 114, 120, 0.9)"
        }
        this.timer = setTimeout(() => {
            this.Alert.style.display = 'none'
        }, last_time)
    }
}

_alert = new Alert()