class Alert {
    Alert = document.querySelector('#Alert')
    timer = setTimeout(() => {}, 0)

    Show(message, c = "", last_time = 3000) {
        clearTimeout(this.timer)
        this.Alert.innerHTML = message
        this.Alert.style.display = 'block'
        if (c == "error") {
            this.Alert.style.backgroundColor = "rgba(161, 85, 81, 0.9)"
        } else {
            this.Alert.style.backgroundColor = "rgba(76,100, 72, 0.9)"
        }
        this.timer = setTimeout(() => {
            this.Alert.style.display = 'none'
        }, last_time)
    }
}

_alert = new Alert()