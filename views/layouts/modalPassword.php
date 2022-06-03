<link rel="stylesheet" href="../../assets/css/general-style.css">

<div class="modal" id="modalPassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Cambiar contraseña</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/usersController.php" method="POST">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="" id="form-edit-id">
                    <textarea id="form-edit-text" name="text"></textarea>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>