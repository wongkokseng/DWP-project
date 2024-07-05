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
    document.getElementById('productPrice').textContent = `RM${(product.price).toFixed(2)}`;
    document.getElementById('productDescription').textContent = product.description;
    document.getElementById('productImg').src = product.image;
}

// Function to extract product ID from URL parameters
function getProductIdFromUrl() {
    let urlParams = new URLSearchParams(window.location.search);
    return parseInt(urlParams.get('id'));
}

// Event listener to call fetchProductDetails when the page loads
document.addEventListener('DOMContentLoaded', function () {
    let productId = getProductIdFromUrl();
    fetchProductDetails(productId);
    updateCartIconQuantity();
    renderCartItems();
});

