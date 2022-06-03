<link rel="stylesheet" href="../../assets/css/general-style.css">

<div class="modal" id="modalDeleteComment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar comentario</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/commentsController.php" method="POST" autocomplete="off">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿Seguro que desea elminar este comentario?</p>
                    <input type="submit" value="Aceptar">
                </form>
            </div>
        </div>
    </div>
</div>