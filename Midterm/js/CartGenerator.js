class CartGenerator {

    subtotal_price_input = document.querySelector("#user-form-card-subtotal-price")
    tax_rate = 0.13

    constructor() {
        // button click event
        this.shoppingCartCheckList = document.querySelector(".item-cart")
        this.shoppingCartCheckList.addEventListener("click", event => {
            const data_type = event.target.getAttribute("data-type")
            if (data_type) {
                const data_id = parseInt(event.target.parentNode.parentNode.getAttribute("data-id"))
                switch (data_type) {
                    case "add":
                        data[data_id].count++
                            break
                    case "sub":
                        if (data[data_id].count - 1 <= 0) {
                            data[data_id].count = 0
                        } else {
                            data[data_id].count--
                        }
                        break
                }
                this.GenerateCart()
            }

        })
    }

    GenerateCart() {
        let CartHTML = ""
        let subtotal_price = 0
        data.forEach(item => {
            if (item.count >= 0) {
                let summary_price = item.count * item.price
                subtotal_price += summary_price
                CartHTML += `
                <li data-id=${item.id}>
                    <span class="product-name">${item.name}</span>
                    <span class="product-subtotal-price">$${summary_price.toFixed(2)}</span>
                    <div class="item-calculator">
                        <button class="btn" data-type="sub">-</button>
                        <span>${item.count}</span>
                        <button class="btn" data-type="add">+</button>
                    </div>
                </li>
                `
            }
        })
        const tax = subtotal_price * this.tax_rate
        if (subtotal_price < 10) {
            CartHTML += `<li class="minimum-purchase">Your minimum purchase should be $10<li/>`
        }
        this.subtotal_price_input.value = subtotal_price
        CartHTML += `
        <li>SUBTOTAL: $${subtotal_price.toFixed(2)}</li>
        <li>HST: $${tax.toFixed(2)}</li>
        <li>TOTAL: $${(tax + subtotal_price).toFixed(2)}</li>
        `
        this.shoppingCartCheckList.innerHTML = CartHTML
    }
}