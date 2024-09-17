@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Producto</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('products.update', $product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Nombre del Producto</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="brand_id">Marca</label>
                                    <select name="brand_id" class="form-control" required>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input type="text" name="model" class="form-control" value="{{ $product->model }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Cantidad</label>
                                    <input type="number" name="quantity" class="form-control"
                                        value="{{ $product->quantity }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <input type="text" name="price" class="form-control" value="{{ $product->price }}"
                                        required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" class="form-control">{{ $product->description }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
