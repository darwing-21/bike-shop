@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Nuevo Producto</h3>
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

                            <form action="{{ route('products.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre del Producto</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="brand_id">Marca</label>
                                    <select name="brand_id" class="form-control" required>
                                        <option value="">Seleccionar Marca</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="model">Modelo</label>
                                    <input type="text" name="model" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Cantidad</label>
                                    <input type="number" name="quantity" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="price">Precio</label>
                                    <input type="number" name="price" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" class="form-control"></textarea>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar Producto</button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
