const productInformation = document.getElementById("productInformation");
let cartListKey = "cart_list";

document.addEventListener("DOMContentLoaded", function() {

    var url = window.location.href;
    var id = url.split("?")[1].split("=")[1];
    getInfoProduct(id);

});

function getInfoProduct(id) {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/productsController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let data = JSON.parse(this.responseText);
                paintInformation(data);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function paintInformation(data) {

    let HTML = `
        <div class="card-informationProduct">
            <div class="img-product center">
                <img src="data:image/jpeg;base64,${data.photo}" alt="imagen del producto" class="img-product-card">
            </div>
            <div class="information-product">
                <p id="name-product">${data.name}</p>
                <p id="price-product">${data.price}</p>
                <p id="stock-product">${data.stock}</p>
                <form id="formStock">
                    <input type="number" value="1" min="1" max="${data.stock}" id="input-product">
                </form>
                <div class="buttons">
                    <button onclick="buy()" class="secondary-button">Comprar</button>
                    <button onclick="addToCart() class="primary-button">Carrito</button>
                </div>
            </div>
        </div>
        <div id="descriptionProduct">
            <p>${data.description}<p>
        </div>  
    `;

    productInformation.innerHTML = HTML;

}

function addToCart() {

    let name = document.getElementById("name-product");
    let price = document.getElementById("price-product");
    let amount = document.getElementById("input-product");
    var id_compra = 0;

    let cartList = getCartList();

    if(cartList !== null){

        var temp = 0;

        cartList.map(i => {
            temp = i.id;
        });

        id_compra = id_compra === temp ? 0 : (temp + 1);
    }
    
    let compra = {
        id: id_compra,
        nameProduct: name.innerHTML,
        priceProduct: price.innerHTML,
        amountProduct: amount.value,
    }

    cartList.push(compra);

    localStorage.setItem(cartListKey, JSON.stringify(cartList));
}

function getCartList() {
    
    let cartList = localStorage.getItem(cartListKey);

    if (cartList === null) {
        cartList = [];
    }
    else {
        cartList = JSON.parse(cartList);
    }

    return cartList;
}