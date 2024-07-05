// Function to fetch product details based on ID from product.json
function fetchProductDetails(productId) {
    fetch('product.json')
        .then(response => response.json())
        .then(data => {
            let product = data.find(p => p.id === productId);
            if (product) {
                displayProductDetails(product);
            } else {
                console.error('Product not found');
            }
        })
        .catch(error => console.error('Error fetching product data:', error));
}

// Function to display product details on the webpage
function displayProductDetails(product) {
    document.getElementById('productName').textContent = product.name;
    document.getElementById('productPrice').textContent = `RM${product.price}`;
    document.getElementById('productDescription').textContent = product.description;
    document.getElementById('productImg').src = product.image;
}

// Function to extract product ID from URL parameters
function getProductIdFromUrl() {
    let urlParams = new URLSearchParams(window.location.search);
    return parseInt(urlParams.get('id'));
}

// Function to handle adding product to cart
function addToCart() {
    let productId = getProductIdFromUrl();
    let quantity = parseInt(document.getElementById('quantityInput').value);

    if (isNaN(quantity) || quantity <= 0) {
        alert('Please enter a valid quantity.');
        return;
    }

    let productToAdd = {
        id: productId,
        name: document.getElementById('productName').textContent,
        price: parseFloat(document.getElementById('productPrice').textContent.replace('RM', '')),
        image: document.getElementById('productImg').src,
        quantity: quantity
    };

    let listCart = JSON.parse(getCookie('listCart')) || [];
    let existingProductIndex = listCart.findIndex(p => p.id === productId);

    if (existingProductIndex !== -1) {
        listCart[existingProductIndex].quantity += quantity;
    } else {
        listCart.push(productToAdd);
    }

    document.cookie = `listCart=${JSON.stringify(listCart)}; expires=Thu, 31 Dec 2025 23:59:59 UTC; path=/;`;

    updateCartIconQuantity();
    alert('Product added to cart!');
}

// Function to update the cart icon with total quantity
function updateCartIconQuantity() {
    let listCart = JSON.parse(getCookie('listCart')) || [];
    let totalQuantity = listCart.reduce((total, product) => total + product.quantity, 0);
    document.querySelector('.totalQuantity').textContent = totalQuantity;
}

// Function to retrieve cookie value by name
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Event listener to call fetchProductDetails when the page loads
document.addEventListener('DOMContentLoaded', function () {
    let productId = getProductIdFromUrl();
    fetchProductDetails(productId);
});
