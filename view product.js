document.addEventListener('DOMContentLoaded', function () {
    fetch('product.json')
        .then(response => response.json())
        .then(products => {
            const productList = document.getElementById('productList');
            products.forEach(product => {
                const productBox = document.createElement('div');
                productBox.className = 'product-box';
                productBox.dataset.id = product.id;

                const productImage = document.createElement('img');
                productImage.src = product.image;
                productImage.alt = product.name;

                const productDetails = document.createElement('div');
                productDetails.className = 'product-details';

                const productName = document.createElement('h2');
                productName.textContent = product.name;

                const productPrice = document.createElement('p');
                productPrice.textContent = `Price: $${product.price.toFixed(2)}`;

                const productDescription = document.createElement('p');
                productDescription.textContent = product.description;

                const editButton = document.createElement('button');
                editButton.textContent = 'Edit';
                editButton.onclick = () => {
                    editProduct(product);
                };

                productDetails.appendChild(productName);
                productDetails.appendChild(productPrice);
                productDetails.appendChild(productDescription);
                productDetails.appendChild(editButton);

                productBox.appendChild(productImage);
                productBox.appendChild(productDetails);

                productList.appendChild(productBox);
            });
        })
        .catch(error => console.error('Error fetching products:', error));
});

function editProduct(product) {
    const productBox = document.querySelector(`.product-box[data-id="${product.id}"]`);
    const productDetails = productBox.querySelector('.product-details');

    productDetails.innerHTML = `
        <label for="edit-name-${product.id}">Name:</label>
        <input type="text" id="edit-name-${product.id}" value="${product.name}" class="edit-name">
        <label for="edit-price-${product.id}">Price:</label>
        <input type="number" id="edit-price-${product.id}" step="0.01" value="${product.price}" class="edit-price">
        <label for="edit-description-${product.id}">Description:</label>
        <textarea id="edit-description-${product.id}" class="edit-description">${product.description}</textarea>
        <label for="edit-image-${product.id}">Image:</label>
        <input type="file" id="edit-image-${product.id}" class="edit-image">
        <button onclick="saveProduct(${product.id})">Save</button>
    `;
}

function saveProduct(id) {
    const productBox = document.querySelector(`.product-box[data-id="${id}"]`);
    const name = productBox.querySelector(`#edit-name-${id}`).value;
    const price = productBox.querySelector(`#edit-price-${id}`).value;
    const description = productBox.querySelector(`#edit-description-${id}`).value;
    const imageInput = productBox.querySelector(`#edit-image-${id}`);
    const imageFile = imageInput.files[0];

    const formData = new FormData();
    formData.append('id', id);
    formData.append('name', name);
    formData.append('price', price);
    formData.append('description', description);

    if (imageFile) {
        formData.append('image', imageFile);
    }

    fetch('update_product.php', {
        method: 'POST',
        body: formData
    })
    .then(response => {
        if (response.ok) {
            window.location.reload();
        } else {
            console.error('Error saving product:', response.statusText);
        }
    });
}




