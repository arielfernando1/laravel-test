@extends('app')
@section('content')
    <div class="container">
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
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for=""></label>
                        <input type="text" name="name" id="name" class="form-control"
                            placeholder="" aria-describedby="helpId">
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
                        <input type="number" step="0.01" name="price" id="price" class="form-control"
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endsection