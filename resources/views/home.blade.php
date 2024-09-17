@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Tablero</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center">Ventas Recientes</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad Vendida</th>
                                            <th>Total</th>
                                            <th>Fecha</th>
                                            <th>Vendido por</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($recentSales as $sale)
                                            <tr>
                                                <td>{{ $sale->product->name }}</td>
                                                <td>{{ $sale->quantity }}</td>
                                                <td>${{ $sale->total_price }}</td>
                                                <td>{{ $sale->sale_date }}</td>
                                                <td>{{ $sale->user->name }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No hay ventas recientes.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="text-center mt-5">Productos con Bajo Stock</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Cantidad en Inventario</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lowStockProducts as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->brand->name }}</td>
                                                <td>{{ $product->model }}</td>
                                                <td>{{ $product->quantity }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">No hay productos con bajo stock.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
