document.addEventListener("DOMContentLoaded", function() {
    let listCart = [];

    // Function to fetch product data from product.json
    function fetchProductData() {
        return fetch('product.json')
            .then(response => response.json())
            .then(data => {
                return data; // Return the parsed JSON data
            })
            .catch(error => {
                console.error('Error fetching product data:', error);
                return []; // Return an empty array if there's an error
            });
    }

    // Function to initialize the cart from cookie on page load
    function checkCart() {
        var cookieValue = document.cookie
            .split('; ')
            .find(row => row.startsWith('listCart='));
        if (cookieValue) {
            listCart = JSON.parse(cookieValue.split('=')[1]);
        }
    }

    // Function to update the order description input value
    function updateOrderDescription() {
        let orderDescription = Object.values(listCart)
            .map(product => `${product.name}x${product.quantity}`)
            .join(', ');
        document.querySelector("#order_description").value = orderDescription;
    }

    // Function to handle button click that updates order description
    function updateOrderDescriptionButtonClick() {
        updateOrderDescription();
    }

    // Event listener for the button that updates order description
    document.getElementById('updateOrderDescButton').addEventListener('click', function(event) {
        event.preventDefault(); // Prevent form submission
        updateOrderDescriptionButtonClick();
    });

    // Initialize cart and order description on page load
    checkCart();
    updateOrderDescription();
});



