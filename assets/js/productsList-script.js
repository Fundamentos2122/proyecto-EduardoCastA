const tableBody = document.getElementById("productsTBody");
const idDelete = document.getElementById("form-delete-id");
const modalDeleteProduct = document.getElementById("modalDeleteProduct");

document.addEventListener("DOMContentLoaded", function() {
    getProducts();
});

function showProducts(list) {

    let HTML = '';

    for(var i = 0; i < list.length; i++) {

        HTML += `<tr>
                    <td class="information"><p>${list[i].id}</p></td>
                    <td class="information"><p>${list[i].name}</p></td>
                    <td><button onclick="editProduct(${list[i].id})">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button></td>
                    <td><button onclick="deleteProduct(${list[i].id})">
                        <i class="fa-solid fa-xmark"></i>
                    </button></td>

                </tr>`;
    }

    tableBody.innerHTML = HTML;

}

function getProducts() {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/productsController.php", true);

    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let list = JSON.parse(this.responseText);
                showProducts(list);
            } else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function deleteProduct(id) {

    idDelete.value = id;
    console.log(idDelete.value);
    modalDeleteProduct.classList.add("show");

}

function editProduct(id) {
    window.location.href = "http://localhost/electrops/views/editProduct.php?id=" + id;
}