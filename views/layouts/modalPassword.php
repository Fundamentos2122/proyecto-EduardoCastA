<div class="modal" id="modalPassword">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Cambiar contraseña</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/usersController.php" method="POST" autocomplete="off">
                    <input type="hidden" name="_method" value="PUT">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" required>
                    <label for="passwordConfirm">Confirmar contraseña</label>
                    <input type="password" name="passwordConfirm" required>
                    <input type="submit" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>