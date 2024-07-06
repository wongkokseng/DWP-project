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

// Populate order description on page load
function populateOrderDescription() {
    let orderDescription = listCart.map(product => `${product.name}x${product.quantity}`).join(',');
    document.querySelector("#order_description").value = orderDescription;
}

window.onload = function() {
    checkCart();
    populateOrderDescription();
};

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
        return false;
    }

    return true; // Allow form submission
}


