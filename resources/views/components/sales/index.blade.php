@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Lista de Ventas</h3>
        </div>
        <div class="section-body">
            <a href="{{ route('sales.create') }}" class="btn btn-primary mb-3">Registrar Nueva Venta</a>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Vendedor</th>
                            <th>Cantidad</th>
                            <th>Precio Total</th>
                            <th>Fecha de Venta</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sales as $sale)
                            <tr>
                                <td>{{ $sale->product->name }}</td>
                                <td>{{ $sale->user->name }}</td>
                                <td>{{ $sale->quantity }}</td>
                                <td>${{ $sale->total_price }}</td>
                                <td>{{ $sale->sale_date }}</td>
                                <td>
                                    <a href="{{ route('sales.edit', $sale->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('sales.destroy', $sale->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('¿Estás seguro de eliminar esta venta?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $sales->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>
@endsection
