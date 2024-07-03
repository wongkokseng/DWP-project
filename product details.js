let image = document.getElementById('productImg');
let btn = document.getElementsByClassName('btn');
let iconCart = document.querySelector('.iconCart');
let cart = document.querySelector('.cart');
let container = document.querySelector('.container');
let close = document.querySelector('.close');

let productId = getProductIdFromUrl(); // Function to get product ID from URL, implement as needed

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

function displayProductDetails(product) {
    document.getElementById('productName').textContent = product.name;
    document.getElementById('productPrice').textContent = `RM${product.price}`;
    document.getElementById('productDescription').textContent = product.description;
    document.getElementById('productImg').src = product.image;
}

function addToCart() {
    let quantity = parseInt(document.getElementById('quantityInput').value);
    if (isNaN(quantity) || quantity <= 1) {
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

        function updateCartIconQuantity() {
            let listCart = JSON.parse(getCookie('listCart')) || [];
            let totalQuantity = listCart.reduce((total, product) => total + product.quantity, 0);
            document.querySelector('.totalQuantity').textContent = totalQuantity;
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return parts.pop().split(';').shift();
        }

        // Function to close the cart
        document.querySelector('.close').addEventListener('click', function () {
            document.querySelector('.cart').style.right = '-100%';
        });

        // Function to fetch product ID from URL, adjust as per your URL structure
        function getProductIdFromUrl() {
            // Implement logic to extract product ID from URL
            // Example: If URL is 'product details.html?id=1', extract '1'
            let urlParams = new URLSearchParams(window.location.search);
            return parseInt(urlParams.get('id'));
        }

iconCart.addEventListener('click', function(){
    if(cart.style.right == '-100%'){
        cart.style.right = '0';
        container.style.transform = 'translateX(-400px)';
    }else{
        cart.style.right = '-100%';
        container.style.transform = 'translateX(0)';
    }
})
close.addEventListener('click', function (){
    cart.style.right = '-100%';
    container.style.transform = 'translateX(0)';
})


let products = null;
// get data from file json
fetch('product.json')
    .then(response => response.json())
    .then(data => {
        products = data;
        addDataToHTML();
})

//show datas product in list 
function addDataToHTML(){
    // remove datas default from HTML
    let listProductHTML = document.querySelector('.listProduct');
    listProductHTML.innerHTML = '';

    // add new datas
    if(products != null) // if has data
    {
        products.forEach(product => {
            let newProduct = document.createElement('div');
            newProduct.classList.add('item');
            newProduct.innerHTML = 
            `<img src="${product.image}" alt="">
            <h2>${product.name}</h2>
            <div class="price">RM${product.price}</div>
            <button onclick="addCart(${product.id})">Add To Cart</button>
            <a id="viewProductDetails-${product.id}" href="#">View Product Details</a>`;

            listProductHTML.appendChild(newProduct);

        });
    }
}
//use cookie so the cart doesn't get lost on refresh page


let listCart = [];
function checkCart(){
    var cookieValue = document.cookie
    .split('; ')
    .find(row => row.startsWith('listCart='));
    if(cookieValue){
        listCart = JSON.parse(cookieValue.split('=')[1]);
    }else{
        listCart = [];
    }
}
checkCart();
function addCart($idProduct){
    let productsCopy = JSON.parse(JSON.stringify(products));
    //// If this product is not in the cart
    if(!listCart[$idProduct]) 
    {
        listCart[$idProduct] = productsCopy.filter(product => product.id == $idProduct)[0];
        listCart[$idProduct].quantity = 1;
    }else{
        //If this product is already in the cart.
        //I just increased the quantity
        listCart[$idProduct].quantity++;
    }
    document.cookie = "listCart=" + JSON.stringify(listCart) + "; expires=Thu, 31 Dec 2025 23:59:59 UTC; path=/;";

    addCartToHTML();
}
addCartToHTML();
function addCartToHTML(){
    // clear data default
    let listCartHTML = document.querySelector('.listCart');
    listCartHTML.innerHTML = '';

    let totalHTML = document.querySelector('.totalQuantity');
    let totalQuantity = 0;
    // if has product in Cart
    if(listCart){
        listCart.forEach(product => {
            if(product){
                let newCart = document.createElement('div');
                newCart.classList.add('item');
                newCart.innerHTML = 
                    `<img src="${product.image}">
                    <div class="content">
                        <div class="name">${product.name}</div>
                        <div class="price">RM${product.price}</div>
                    </div>
                    <div class="quantity">
                        <button onclick="changeQuantity(${product.id}, '-')">-</button>
                        <span class="value">${product.quantity}</span>
                        <button onclick="changeQuantity(${product.id}, '+')">+</button>
                    </div>`;
                listCartHTML.appendChild(newCart);
                totalQuantity = totalQuantity + product.quantity;
            }
        })
    }
    totalHTML.innerText = totalQuantity;
}
function changeQuantity($idProduct, $type){
    switch ($type) {
        case '+':
            listCart[$idProduct].quantity++;
            break;
        case '-':
            listCart[$idProduct].quantity--;

            // if quantity <= 0 then remove product in cart
            if(listCart[$idProduct].quantity <= 0){
                delete listCart[$idProduct];
            }
            break;
    
        default:
            break;
    }
    // save new data in cookie
    document.cookie = "listCart=" + JSON.stringify(listCart) + "; expires=Thu, 31 Dec 2025 23:59:59 UTC; path=/;";
    // reload html view cart
    addCartToHTML();
}

btn[0].addEventListener('click', function(){
    image.src = './img/1.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
btn[1].addEventListener('click', function(){
    image.src = './img/2.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
btn[2].addEventListener('click', function(){
    image.src = './img/3.png';
    for(let bt of btn){
        bt.classList.remove('active');
    }
    this.classList.add('active');
});
