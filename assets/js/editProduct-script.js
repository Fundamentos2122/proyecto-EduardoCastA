const nameEdit = document.getElementById("nameEdit");
const priceEdit = document.getElementById("priceEdit");
const stockEdit = document.getElementById("stockEdit");
const descriptionEdit = document.getElementById("descriptionEdit");
const formEditId = document.getElementById("form-edit-id");


document.addEventListener("DOMContentLoaded", function() {

    var url = window.location.href;
    var id = url.split("?")[1].split("=")[1];
    formEditId.value = id;
    getInfoProduct(id);

});

function getInfoProduct(id) {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/productsController.php?id=" + id, true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let data = JSON.parse(this.responseText);
                putInformation(data);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function putInformation(data) {

    nameEdit.value = data.name;
    priceEdit.value = data.price;
    stockEdit.value = data.stock;
    descriptionEdit.value = data.description;
}