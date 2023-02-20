@extends('app')
@section('content')
    <div class="container my-3">
        <h4>{{ $products->count() }} Productos</h4>
        <!-- Open modal button -->
        <button type="button" class="btn btn-success m-5" data-bs-toggle="modal" data-bs-target="#addModal">
            Agregar
        </button>

        <!-- Scrollable Modal -->
        <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <!-- Modal content goes here -->
                </div>
            </div>
        </div>
        @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
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
            $('.table').DataTable({
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
            });
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
        // // // select all inputs text
        // const inputs = document.querySelectorAll('input[type="text"]');
        // // auto uppercase
        // inputs.forEach(input => {
        //     input.addEventListener('keyup', e => {
        //         e.target.value = e.target.value.toUpperCase();
        //     });
        // });
        // open modal
        $('#addModal').on('show.bs.modal', function(e) {
            $.ajax({
                url: "{{ route('product.add') }}",
                type: 'get',
                success: function(data) {
                    $('#addModal .modal-content').html(data);

                }
            });
        });
    </script>
@endsection
