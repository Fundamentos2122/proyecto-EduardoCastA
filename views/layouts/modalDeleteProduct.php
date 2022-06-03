<div class="modal" id="modalDeleteProduct">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Eliminar producto</h2>
            </div>
            <div class="modal-body">
                <form action="../controllers/productsController.php" method="POST" autocomplete="off">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="" id="form-delete-id">
                    <p>¿Seguro que desea eliminar este producto?</p>
                    <input type="submit" value="Aceptar" class="primary-button">
                </form>
            </div>
        </div>
    </div>
</div>