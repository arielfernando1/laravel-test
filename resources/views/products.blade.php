@extends('app')
@section('content')
    <div class="container my-3">
        <h4>Productos</h4>
        <div class="row">
            <div class="col-auto">
                <form action="{{ route('product.store') }}" method="post">
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

                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder=""
                            aria-describedby="helpId" onkeyup="this.value = this.value.toUpperCase()">
                        <small id="helpId" class="text-muted">Nombre</small>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="description" id="description" class="form-control" placeholder=""
                            aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Descripcion</small>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <input type="number" step="0.05" name="price" id="price" class="form-control"
                            placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Precio</small>
                    </div>
                    <button type="submit" class="btn btn-primary m-3">Guardar</button>
                </form>
            </div>
        </div>


        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="showconfirm()">Eliminar</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        // confirm dialog
        function showconfirm() {
            var r = confirm("¿Esta seguro de eliminar este item?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
        // select all inputs in form 
        var inputs = document.querySelectorAll('input');
        // auto uppercase input
        inputs.forEach(input => {
            input.addEventListener('keyup', function() {
                this.value = this.value.toUpperCase();
            });
        });
    </script>
@endsection
