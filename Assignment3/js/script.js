let receipt = document.querySelector(".checklist");
// add or decrease number when clicking button
receipt.onclick = (element) => {
  let subelement = element.target;
  if (subelement.value == "+" || subelement.value == "-") {
    let product_id = subelement.getAttribute("data-id");
    let hidden_input = document.querySelector(`input[name='${product_id}']`);
    let current_value = parseInt(hidden_input.value);
    let count_span = document.querySelector(
      `.product-count[data-id="${product_id}"]`
    );
    let subtotal_price = document.querySelector(
      `.product-subtotal-price[data-id="${product_id}"]`
    );
    if (subelement.value == "+") {
      current_value++;
      hidden_input.value = current_value;
      count_span.innerHTML = current_value;
    } else if (subelement.value == "-") {
      if (current_value - 1 > 0) {
        current_value--;
        hidden_input.value = current_value;
        count_span.innerHTML = current_value;
      } else if (current_value - 1 == 0) {
        current_value = 0;
        hidden_input.value = 0;
        subelement.parentElement.parentElement.remove();
      }
    }
    subtotal_price.innerHTML = (
      current_value *
      parseFloat(hidden_input.getAttribute("data-product-price"))
    ).toFixed(2);
    console.log(current_value);
  }
};

// increase or decrease product number when clicking picturn's button
let product_list = document.querySelector(".products-display");
product_list.onclick = (element) => {
  let subelement = element.target;
  if (subelement.alt == "add to cart") {
    let product_id = subelement.getAttribute("data-id");
    let hidden_input = document.querySelector(`input[name="${product_id}"]`);
    let count_span = document.querySelector(
      `.product-count[data-id="${product_id}"]`
    );
    let current_value = parseInt(hidden_input.value);
    if (count_span) {
      count_span.innerHTML = current_value + 1;
      hidden_input.value = current_value + 1;
    } else {
      let product_name = hidden_input.getAttribute("data-product-name");
      let product_price = hidden_input.getAttribute("data-product-price");
      let new_receipt = document.createElement("li");
      new_receipt.innerHTML = `
        <span class="product-name">- ${product_name}</span>
        <span class="product-subtotal-price" data-id="${product_id}">${product_price}</span>
        <div class="item-calculator">
            <input type="button" class="btn" value="-" data-id="${product_id}">
            <span class="product-count" data-id="${product_id}">1</span>
            <input type="button" class="btn" value="+" data-id="${product_id}">
        </div>
        `;
      receipt.appendChild(new_receipt);
      hidden_input.value = current_value + 1;
    }
  }
};
