@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Venta</h3>
        </div>
        <div class="section-body">
            <form action="{{ route('sales.update', $sale->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Para indicar que es una actualización -->

                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" class="form-control" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ $product->id == $sale->product_id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Vendedor</label>
                    <select name="user_id" class="form-control" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $sale->user_id ? 'selected' : '' }}>
                                {{ $user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" class="form-control" value="{{ $sale->quantity }}" required>
                </div>

                <div class="form-group">
                    <label for="total_price">Precio Total</label>
                    <input type="number" name="total_price" class="form-control" value="{{ $sale->total_price }}" required
                        step="0.01">
                </div>

                <div class="form-group">
                    <label for="sale_date">Fecha de Venta</label>
                    <input type="date" name="sale_date" class="form-control"
                        value="{{ $sale->sale_date->format('Y-m-d') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar Venta</button>
                <a href="{{ route('sales.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </section>
@endsection
