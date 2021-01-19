function getProducts(id_order) {
    const apiUrl = "http://localhost:8000";
    const $list = $('.product-list');

    $.ajax({
        url : apiUrl + `/?page=orders&id_order=${id_order}`,
        dataType : 'json'
    })
        .done((res) => {
            $list.empty();

            res.forEach(el => {
                $list.append(`<tr>
                        <td>${el.id_product}</td>
                        <td>${el.name}</td>
                        <td>${el.quantity}</td>
                        </tr>`);
            });
        });
}

function openModal() {
    document.getElementById('mod').style.display='block';
}


function addProduct() {
    const product = document.getElementById('product');
    const newProduct = product.cloneNode(true);
    const deleteProduct = document.createElement("span");
    const deleteContent = document.createTextNode("X");
    deleteProduct.appendChild(deleteContent);
    deleteProduct.addEventListener('click', () => newProduct.remove());
    newProduct.appendChild(deleteProduct);
    document.getElementById('products').appendChild(newProduct);
}
