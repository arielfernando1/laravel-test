@extends('app')
@section('content')
    <div class="container my-3">
        <h4>Productos</h4>
        <div class="row">
            <div class="col-4">
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
                        <input type="number" step="0.05" min="0.05" name="cost" id="cost"
                            class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Costo</small>
                    </div>

                    <div class="form-group">
                        <label for=""></label>
                        <input type="number" step="0.05" min="0.05" name="price" id="price"
                            class="form-control" placeholder="" aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Precio</small>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="description" id="description" class="form-control" placeholder=""
                            aria-describedby="helpId">
                        <small id="helpId" class="text-muted">Descripcion</small>
                    </div>


                    <button type="submit" class="btn btn-primary m-3">Guardar</button>
                </form>
            </div>
        </div>


        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Stock</th>
                    <th>Costo</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    {{-- <th>Eliminar</th> --}}
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ $product->cost }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        {{-- <td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td> --}}
                        <td>
                            <form action="{{ route('product.show', $product->id) }}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-warning">Editar</button>
                            </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        //data table
        $(document).ready(function() {
            $('.table').DataTable(
                {
                    "language": {
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "zeroRecords": "No se encontraron resultados en su busqueda",
                        "searchPlaceholder": "Buscar registros",
                        "info": "Mostrando registros de _START_ al _END_ de un total de _TOTAL_ registros",
                        "infoEmpty": "No existen registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "paginate": {
                            "first": "Primero",
                            "last": "Último",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                    }
                }
            );
        });
        // confirm dialog
        function showconfirm() {
            var r = confirm("¿Esta seguro de eliminar este item?");
            if (r == true) {
                return true;
            } else {
                return false;
            }
        }
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
