    const userUsername = document.getElementById("form-username-user");
    const idUser = document.getElementById("form-id-user");
    const idProduct = document.getElementById("form-id-product");

    document.addEventListener("DOMContentLoaded", function() {
    
        var url = window.location.href;
        var id_product = url.split("?")[1].split("=")[1];
        idProduct.value = id_product;
        getInfo();
        console.log(idProduct.value);
        console.log(idUser.value);
        console.log(userUsername.value);

    });

    function getInfo() {

        let xhttp = new XMLHttpRequest();

        xhttp.open("GET", "../controllers/data-session.php", false);

        xhttp.onreadystatechange = function() {
            if (this.readyState === 4) {
                if (this.status === 200) {
                    let data = JSON.parse(this.responseText);
                    idUser.value = data.id;
                    userUsername.value = data.username;
                }
                else {
                    console.log("Error");
                }
            }
        };

        xhttp.send();

        return [];
    }
