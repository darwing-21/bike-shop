@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Nueva Venta</h3>
        </div>
        <div class="section-body">
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="product_id">Producto</label>
                    <select name="product_id" id="product_id" class="form-control" required>
                        <option value="">Seleccionar Producto</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" data-price="{{ $product->price }}">{{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="user_id">Vendedor</label>
                    <select name="user_id" class="form-control" required>
                        <option value="">Seleccionar Vendedor</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="quantity">Cantidad</label>
                    <input type="number" name="quantity" id="quantity" class="form-control" required min="1">
                </div>

                <div class="form-group">
                    <label for="total_price">Precio Total</label>
                    <input type="number" name="total_price" id="total_price" class="form-control" readonly>
                </div>

                <div class="form-group">
                    <label for="sale_date">Fecha de Venta</label>
                    <input type="date" name="sale_date" id="sale_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Registrar Venta</button>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const productSelect = document.getElementById('product_id');
            const quantityInput = document.getElementById('quantity');
            const totalPriceInput = document.getElementById('total_price');
            const saleDateInput = document.getElementById('sale_date');

            function calculateTotalPrice() {
                const selectedProduct = productSelect.options[productSelect.selectedIndex];
                const price = parseFloat(selectedProduct.getAttribute('data-price')) || 0;
                const quantity = parseInt(quantityInput.value) || 0;

                const totalPrice = price * quantity;
                totalPriceInput.value = totalPrice.toFixed(2);
            }

            productSelect.addEventListener('change', calculateTotalPrice);
            quantityInput.addEventListener('input', calculateTotalPrice);

            const today = new Date().toISOString().split('T')[0];
            saleDateInput.value = today;
        });
    </script>
@endsection
