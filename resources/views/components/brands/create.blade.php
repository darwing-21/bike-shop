@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar Nueva Marca</h3>
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

                            <form action="{{ route('brands.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nombre de la Marca</label>
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Ingrese el nombre de la marca" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Guardar Marca</button>
                                <a href="{{ route('brands.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
