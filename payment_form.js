let listCart = [];

// Check for existing cart in cookies and load it
function checkCart() {
    var cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }
}

// Execute checkCart when the window loads
window.onload = checkCart;

// Validate the form before submission
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

// Construct order description and submit the form
function submitForm() {
    if (!validateForm()) {
        return;
    }

    // Construct order description from listCart
    let orderDescription = listCart
        .filter(product => product) // Filter out any undefined products
        .map(product => `${product.name}x${product.quantity}`)
        .join(',');

    // Set the value of the hidden input
    document.querySelector("#order_description").value = orderDescription;

    // Submit the form
    document.querySelector("form").submit();
}

