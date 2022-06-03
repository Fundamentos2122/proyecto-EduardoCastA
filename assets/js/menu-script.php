<script>
    const link1 = document.getElementById("link1");
    const link2 = document.getElementById("link2");
    const link3 = document.getElementById("link3");
    const link4 = document.getElementById("link4");
    const img1 = document.getElementById("img1");
    const img2 = document.getElementById("img2");

    document.addEventListener("DOMContentLoaded", function() {

        <?php

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

            if(array_key_exists("id", $_SESSION)){
                if($_SESSION["type"] === "normal"){
                    echo "changeHeaderUser();";
                } else {
                    echo "changeHeaderAdmin()";
                }
            }

        ?>

    });

    function changeHeaderUser(){
        img1.setAttribute("src","../assets/icons/iconPerfil.png");
        link3.setAttribute("href","perfil.php");
        link3.innerHTML = "Perfil";
        img2.setAttribute("src","../assets/icons/iconCart.png");
        link4.setAttribute("href","shoppingCart.php");
        link4.innerHTML = "Carrito";
        if(window.matchMedia("(max-width: 780px)").matches) {
            link3.style.right = "142px";
            link4.style.right = "37px";
        } else {
            link3.style.right = "188px";
            link4.style.right = "85px";
        }
        
    }

    function changeHeaderAdmin(){
        link1.setAttribute("href","productsList.php");
        link1.innerHTML = "Productos";
        link2.setAttribute("href","productsList.php");
        link2.innerHTML = "Ventas";
        img1.setAttribute("src","../assets/icons/iconPerfil.png");
        link3.setAttribute("href","perfil.php");
        link3.innerHTML = "Perfil ";
        img2.style.display = "none";
        link4.style.display = "none";
        if(window.matchMedia("(max-width: 780px)").matches) {
            link2.style.left = "105px";
            link3.style.right = "142px";
        } else {
            link2.style.left = "180px";
            link3.style.right = "188px";
        }
    }

</script>