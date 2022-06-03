const products = document.getElementById("products");

document.addEventListener("DOMContentLoaded", function() {
    getProducts();
});

function showProducts(list) {

    let HTML = "";

    for(var i = 0; i < list.length; i++){

        HTML += `<div class="card-product">
                    <div class="img-card">
                        <img src="data:image/jpeg;base64,${list[i].photo}" alt="imagen del producto"width="250px" height="160px">
                    </div>
                    <div class="info-card">
                        <p class="name-product">${list[i].name}</p>
                        <p class="price-product">${list[i].price}</p>
                        <div class="text-end">
                            <a href="productInfo.php?id=${list[i].id}"><button class="primary-button">Ver</button></a>
                        </div>
                    </div>
                </div>`;
    }

    products.innerHTML = HTML;

}

function getProducts() {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/productsController.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let list = JSON.parse(this.responseText);
                showProducts(list);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}