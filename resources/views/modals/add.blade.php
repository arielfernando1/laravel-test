<div class="modal-header">
    <h5 class="modal-title">Agregar Producto</h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


<div class="modal-body">
    <form action="{{ route('product.store') }}" method="post">

        @csrf
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-group">
            <label for=""></label>
            <input type="text" name="name" id="name" class="form-control" placeholder=""
                aria-describedby="helpId" required>
            <small id="helpId" class="text-muted">Nombre</small>
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="brand" id="brand" class="form-control" placeholder=""
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Marca</small>
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="number" min="1" step="1" name="stock" id="stock" class="form-control"
                placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Stock</small>
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="number" step="0.05" min="0.05" name="cost" id="cost" class="form-control"
                placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Costo</small>
        </div>

        <div class="form-group">
            <label for=""></label>
            <input type="number" step="0.05" min="0.05" name="price" id="price" class="form-control"
                placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Precio</small>
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="text" name="description" id="description" class="form-control" placeholder=""
                aria-describedby="helpId">
            <small id="helpId" class="text-muted">Descripcion</small>
        </div>
        <button type="submit" class="btn btn-success my-5">Registrar</button>
    </form>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
</div>
