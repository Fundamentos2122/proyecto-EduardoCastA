<div class="modal" id="modalEmail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Cambiar correo electrónico</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/usersController.php" method="POST" autocomplete="off">
                    <input type="hidden" name="_method" value="PUT">
                    <label for="email">Correo</label>
                    <input type="text" name="email" id="email" required>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>