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
                <a>Creado el {{ $product->created_at }}</a>
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
                    <input type="number" min="0" name="stock" id="stock" class="form-control" placeholder="Existencias"
                        aria-describedby="helpId" value="{{ $product->stock }}">
                    <small id="helpId" class="text-muted">Stocka</small>
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
