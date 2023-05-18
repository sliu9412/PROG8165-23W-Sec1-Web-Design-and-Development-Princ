class Generator {

    product_data = [...ProductData]
    tax_rate = parseFloat(document.querySelector("#user-form-province-tax").value)
    province_select = document.querySelector("#user-form-province")
    subtotal_price_input = document.querySelector("#user-form-card-subtotal-price")

    constructor() {
        // add product in display area
        this.products = document.querySelector(".products-display")
        this.products.addEventListener("click", event => {
            const data_type = event.target.getAttribute("data-type")
            if (data_type == "addButton") {
                const data_id = parseInt(event.target.parentNode.parentNode.getAttribute("data-id"))
                this.product_data[data_id].count++
                    this.GenerateCart()
                _alert.Show(`${this.product_data[data_id].name} has been add to shoppingcart!`)
            }
        })
        this.GenerateProducts()

        // change province and set new tax amount
        this.province_select.onchange = (element) => {
            const [tax_rate, province] = element.target.value.split(",")
            this.tax_rate = parseFloat(tax_rate)
            this.GenerateCart()
        }

        // button click event
        this.shoppingCartCheckList = document.querySelector(".item-cart")
        this.shoppingCartCheckList.addEventListener("click", event => {
            const data_type = event.target.getAttribute("data-type")
            if (data_type) {
                const data_id = parseInt(event.target.parentNode.parentNode.getAttribute("data-id"))
                switch (data_type) {
                    case "add":
                        this.product_data[data_id].count++
                            break
                    case "sub":
                        if (this.product_data[data_id].count - 1 <= 0) {
                            this.product_data[data_id].count = 0
                        } else {
                            this.product_data[data_id].count--
                        }
                        break
                }
                this.GenerateCart()
            }
        })
    }

    GenerateProducts() {
        let productsHTML = ""
        this.product_data.forEach(item => {
            productsHTML += `
            <div class="product-item" data-id="${item.id}">
                <div class="img-container">
                    <img src="${item.img}" alt="${item.name}">
                </div>
                <div class="item-info">
                    <p class="item-price">$${item.price}</p>
                    <p class="unit-price">${item.unit_price}</p>
                    <h3>${item.name}</h3>
                </div>
                <div class="add-to-cart btn">
                    <img data-type="addButton" src="./images/Plus.svg" alt="add to cart">
                </div>
            </div>
            `
        })
        this.products.innerHTML = productsHTML
    }

    GenerateCart() {
        let CartHTML = ""
        let subtotal_price = 0
        this.product_data.forEach(item => {
            if (item.count > 0) {
                let summary_price = item.count * item.price
                subtotal_price += summary_price
                CartHTML += `
                <li data-id=${item.id}>
                    <span class="product-name">- ${item.name}</span>
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