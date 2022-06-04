const commentsSection = document.getElementById("commentSection");

document.addEventListener("DOMContentLoaded", function() {

    var url = window.location.href;
    var id = url.split("?")[1].split("=")[1];
    getComments(id);

});

function getComments(id) {

    let xhttp = new XMLHttpRequest();

    xhttp.open("GET", "../controllers/commentsController.php?id=" + id, true);


    xhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                let list = JSON.parse(this.responseText);
                paintComments(list);
            }
            else {
                console.log("Error");
            }
        }
    };

    xhttp.send();

    return [];
}

function paintComments(list) {

    let HTML =  "";

    for(var i = 0; i < list.length; i++){
        HTML += `<div class="comment-container">
                    <p class="comment_author">${list[i].author}</p>
                    <p class="comment">${list[i].comment}</p>
                </div>`;
    }

    commentsSection.innerHTML = HTML;

}

function saveComment(user_id, product_id){
    console.log(user_id);
    console.log(product_id);
}