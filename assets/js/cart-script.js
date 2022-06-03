const cart = document.getElementById("cart");
let cartListKey = "cart_list";

document.addEventListener("DOMContentLoaded", function() {

    paintCart();

});

function paintCart() {

    let cartList = getCartList();
    let HTML = "";

    cartList.map(i => {
        HTML += `<div card-id="${i.id}">
                    <p class="nameProduct">${i.nameProduct}</p>
                    <p class="priceProduct">Precio: ${i.priceProduct}</p>
                    <p class="amountProduct">Cantidad: ${i.amountProduct}</p>
                    <p class="total">Total: ${i.priceProduct}*${i.amountProduct}</p>
                    <button onclick="remove(${i.id})">Eliminar del carrito</button>
                </div>`;
    });
        
    cart.innerHTML = HTML;
}

function remove(id) {

    console.log("Borrado");

    let compra = document.querySelector(`[card-id="${id}"]`);
    
    let cartList = getCartList();

    cartList = cartList.filter(i => i.id !== id);

    localStorage.setItem(cartListKey, JSON.stringify(cartList));

    setTimeout(() => {
        paintCart();
    }, 150);
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