class HomeGenerator {

    home_products_display = document.querySelector('.products-display');

    HomeDisplay() {
        let html = ""
        data.forEach(item => {
            html += `
            <div class="product-items btn">
                <div class="margin-box">
                    <img src="${item.image}" alt="Conditioner">
                    <div class="name-price">
                        <h2>${item.name}</h2>
                        <p>${item.price}</p>
                    </div>
                </div>
            </div>
            `
        })
        this.home_products_display.innerHTML = html
    }
}

const home_generator = new HomeGenerator()
window.onload = () => {
    home_generator.HomeDisplay()
}