let listCart = [];

function checkCart() {
    var cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}

window.onload = checkCart;

function validateForm() {
    const form = document.querySelector("form");
    const requiredFields = form.querySelectorAll("[required]");
    for (let field of requiredFields) {
        if (!field.value) {
            alert("Please fill all required fields.");
            return false;
        }
    }
    return true;
}

function submitForm() {
    if (!validateForm()) {
        return;
    }

    // Construct order description from listCart
    let orderDescription = listCart.map(product => `${product.name}*${product.quantity}`).join(',');
    document.querySelector("#order_description").value = orderDescription;
    document.querySelector("#customer_name").value = "<?php echo $username; ?>";

    document.querySelector("form").submit();
}
