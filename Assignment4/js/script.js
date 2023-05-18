// click button to increase or decrease product's count
document
  .querySelectorAll(".decrease-count, .increase-count")
  .forEach((button) => {
    button.onclick = (e) => {
      e.preventDefault();
      const product_item = button.parentNode.parentNode;
      const count = product_item.querySelector("span");
      const hidden_textfield = product_item.querySelector("input");
      if (button.className == "decrease-count") {
        if (count.innerHTML >= 1) {
          hidden_textfield.value = count.innerHTML =
            parseInt(count.innerHTML) - 1;
        }
      } else {
        hidden_textfield.value = count.innerHTML =
          parseInt(count.innerHTML) + 1;
      }
    };
  });

// set the hidden field to target page
document.querySelectorAll(".pagenitor").forEach((pagenitor) => {
  pagenitor.onclick = (e) => {
    document.querySelector("#target-page").value =
      e.target.getAttribute("target");
    const form = document.querySelector("form");
    form.submit();
  };
});
