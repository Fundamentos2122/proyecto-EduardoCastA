<link rel="stylesheet" href="../../assets/css/general-style.css">

<div class="modal" id="modalEditComment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Editar Tweet</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/tweetsController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-text" name="comment"></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>