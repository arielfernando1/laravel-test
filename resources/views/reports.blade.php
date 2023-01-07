@extends('app')
@section('content')

    <div class="container">
        <h3>Reportes</h3>
        <form action="{{ route('log.report') }}" method="get">
            @csrf
            <div class="form-group">
                <label for="date">Filtrar por Fecha</label>
                <input type="date" name="date" id="date" class="form-control" placeholder="" aria-describedby="helpId"
                    required>
                <small id="helpId" class="text-muted">Selecciona una fecha</small>
            </div>
            <button type="submit" class="btn btn-success">Filtrar</button>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <!-- report table -->
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
                    <tr>
                        <td scope="row">{{ $log->created_at }}</td>
                        <td>{{ $log->qty }}</td>
                        <td>{{ $log->item }}</td>
                        <td>{{ $log->total }}</td>
                    </tr>
                @endforeach
                <!-- show total: red if is <20 green if is >20-->
                <tr class="table-info">
                    <td scope="row"><strong>Total<strong></td>
                    <td scope="row"></td>
                    <td></td>
                    <td ><strong>$ {{ $logs->sum('total') }}</strong></td>
            </tbody>

        </table>



    </div>
    <script>
        //sum total of
    </script>
@endsection
