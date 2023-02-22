@extends('app')
@section('content')
    <div class="container">
        <div>
            <form action="{{ route('product.update', $product->id) }}" method="post">
                @method('PATCH')
                @csrf
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <!--added date field-->
                <div class="d-flex justify-content-center my-5 text-center">
                    <ul class="list-group">
                        <li class="list-group-item"><i class="bi bi-plus"></i> Creado el: {{ $product->created_at }}</li>
                        @if ($product->created_at != $product->updated_at)
                            <li class="list-group-item"><i class="bi bi-arrow-clockwise"></i> Modificado el:
                                {{ $product->updated_at }}</li>
                        @endif

                        <li class="list-group-item"><i class="bi bi-bookmark-fill"></i> PID: {{ $product->id }}</li>
                        <li class="list-group-item"> Vendido {{ $sells-> count() }} veces </li>

                    </ul>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $product->name }}">
                    <small id="helpId" class="text-muted">Nombre</small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" name="brand" id="brand" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $product->brand }}">
                    <small id="helpId" class="text-muted">Marca</small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="number" min="0" name="stock" id="stock" class="form-control"
                        placeholder="Existencias" aria-describedby="helpId" value="{{ $product->stock }}">
                    <small id="helpId" class="text-muted">Stock</small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="number" step="0.01" min="0.01" name="cost" id="cost" class="form-control"
                        placeholder="" aria-describedby="helpId" value="{{ $product->cost }}">
                    <small id="helpId" class="text-muted">Costo</small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="number" step="0.05" min="0.05" name="price" id="price" class="form-control"
                        placeholder="" aria-describedby="helpId" value="{{ $product->price }}">
                    <small id="helpId" class="text-muted">Precio</small>
                </div>
                <div class="form-group">
                    <label for=""></label>
                    <input type="text" name="description" id="description" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ $product->description }}">
                    <small id="helpId" class="text-muted">Descripcion</small>
                </div>

                <button type="submit" class="btn btn-success m-3">Actualizar</button>
                <!-- back button -->
                <a id="backBtn" href="#" class="btn btn-primary m-3">Regresar</a>

            </form>
        </div>
    </div>
    @if ($sells->count() > 0)
    <div class="container">
        <h4>Historial de ventas</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($sells as $sell)
                    <tr>
                        <td>{{ $sell->created_at }}</td>
                        <td>{{ $sell->qty}}</td>
                    </tr>
                @endforeach
           
    </div>
    @endif
    <script>
        // check if changes were made
        var changes = false;
        var inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('change', () => {
                changes = true;
            });
        });
        // back button
        var backBtn = document.querySelector('#backBtn');
        backBtn.addEventListener('click', () => {
            if (changes) {
                if (confirm('Tiene cambios sin guardar. ¿Desea regresar?')) {
                    window.location.href = "{{ route('product.index') }}";
                }
            } else {
                window.location.href = "{{ route('product.index') }}";
            }
        });
        // select all inputs text
        const inputs = document.querySelectorAll('input[type="text"]');
        // auto uppercase
        inputs.forEach(input => {
            input.addEventListener('keyup', e => {
                e.target.value = e.target.value.toUpperCase();
            });
        });
    </script>
@endsection
