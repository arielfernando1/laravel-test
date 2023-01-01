@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="fecha"><h1>{{ date('Y-m-d') }}</h1></div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <form action="{{ route('log.store') }}" method="post">
                    @csrf
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @error('qty')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('item')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('total')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="form-group">
                        <label for="">Cantidad</label>
                        <input type="number" value="1" name="qty" id="qty" class="form-control"
                            placeholder="" aria-describedby="helpId">
                    </div>
                    <!-- select product with search input -->
                    <div class="form-group
                        <label for="">Item</label>
                        <select name="item" id="item" class="form-control">
                            <option value="">Seleccionar</option>
                            @foreach ($products as $product)
                                <option value="{{ $product->name }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- selected product price -->
                    <div class="form-group
                        <label for="">Precio</label>
                        <input type="number" step="0.01" name="price" id="price" class="form-control"
                            placeholder="" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="">Total</label>
                        <input type="text" name="total" id="total" class="form-control" placeholder=""
                            aria-describedby="helpId">
                    </div>

                    <button type="submit" class="btn btn-success m-3">Registrar</button>
                </form>
            </div>
        </div>


        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Fecha</th>
                    <th>Cantidad</th>
                    <th>Item</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($logs as $log)
                    <!-- show only today's logs -->
                    @if ($log->created_at->isToday())
                        <tr>
                            <td scope="row">{{ $log->created_at }}</td>
                            <td scope="row">{{ $log->qty }}</td>
                            <td>{{ $log->item }}</td>
                            <td>{{ $log->total }}</td>
                        </tr>
                    @endif
                @endforeach
                <!-- show today's total -->
                <tr class="table-success">
                    <td scope="row">Total</td>
                    <td scope="row">{{ $logs->where('created_at', '>=', today())->sum('qty') }}</td>
                    <td></td>
                    <td><strong>{{ $logs->where('created_at', '>=', today())->sum('total') }}</strong></td>
            </tbody>
        </table>
        <script>
            // get product price
            const item = document.getElementById('item');
            const price = document.getElementById('price');
            const qty = document.getElementById('qty');
            const total = document.getElementById('total');
            item.addEventListener('change', function() {
                const product = @json($products);
                const selected = product.find(product => product.name === item.value);
                price.value = selected.price;
                // calculate total
                total.value = price.value * qty.value;
            });
        </script>
    @endsection
