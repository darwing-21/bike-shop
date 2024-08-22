@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verifica Tu Dirección de Correo Electrónico</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Un nuevo enlace de verificación ha sido enviado a
                                tu dirección de correo electrónico
                            </div>
                        @endif
                        <p>Antes de continuar, por favor revisa tu correo electrónico para un enlace de verificación. Si no
                            recibiste
                            el correo,</p>
                        <a href="{{ route('verification.resend') }}">haz clic aquí para solicitar otro</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
