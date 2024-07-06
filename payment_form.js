// Function to fetch cart data from cookie
function fetchCartFromCookie() {
    var cookieValue = document.cookie
        .split('; ')
        .find(row => row.startsWith('listCart='));
    if (cookieValue) {
        return JSON.parse(cookieValue.split('=')[1]);
    } else {
        return []; // Return an empty array if cart cookie is not found
    }
}

// Function to display cart items (name and quantity) in HTML
function displayCartItems() {
    // Fetch cart data from cookie
    let listCart = fetchCartFromCookie();

    // Select the container where cart items will be displayed
    let cartItemsContainer = document.querySelector('.cart-items');
    cartItemsContainer.innerHTML = ''; // Clear existing content

    // Iterate through each product in the cart
    listCart.forEach(product => {
        if (product) {
            // Create a div for each cart item
            let cartItemDiv = document.createElement('div');
            cartItemDiv.classList.add('cart-item');
            cartItemDiv.textContent = `${product.name} - Quantity: ${product.quantity}`;

            // Append the cart item to the container
            cartItemsContainer.appendChild(cartItemDiv);
        }
    });
}

// Call displayCartItems function when the page loads
document.addEventListener('DOMContentLoaded', function() {
    displayCartItems();
});



