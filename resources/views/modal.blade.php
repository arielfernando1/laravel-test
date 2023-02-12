<div class="modal-header">
    <h5 class="modal-title">Información</h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <p><strong>Nombre  :</strong> {{ $product->name }}</p>
    <p><strong>Marca  :</strong> {{ $product->brand }}</p>
    <p><strong>Stock  :</strong> {{ $product->stock }}</p>
    <p><strong>Costo  :</strong> {{ $product->cost }}</p>
    <p><strong>Precio  :</strong> {{ $product->price }}</p>
    <p><strong>Descripcion  :</strong> {{ $product->description }}</p>
    <!-- Sell count of the product -->
    <p><strong>Vendidos  :</strong> {{ $product->sell_count }}</p>

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
  </div>