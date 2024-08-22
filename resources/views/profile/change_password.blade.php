<div id="changePasswordModal" class="modal fade {{ session('showPasswordModal') ? 'show' : '' }}" tabindex="-1"
    role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <!-- Contenido del modal-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar Contraseña</h5>
                <button type="button" aria-label="Cerrar" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form method="POST" id='changePasswordForm' action="{{ route('reset_pass') }}">
                @csrf
                <div class="modal-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="current_password">Contraseña Actual:</label><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control" id="current_password" type="password" name="current_password"
                                required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="icon-ban icons"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Nueva Contraseña:</label><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control" id="password" type="password" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="icon-ban icons"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar Contraseña:</label><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control" id="password_confirmation" type="password"
                                name="password_confirmation" required>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="icon-ban icons"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
