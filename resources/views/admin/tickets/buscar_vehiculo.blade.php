<div class="row">

    <div class="col-md-6">
        <p><b>Información del cliente</b></p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nombres"><i class="fas fa-user-check"></i> Nombre completo</label>
                    <p>{{ $vehiculo->cliente->nombres }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="numero_documento"><i class="fas fa-id-card"></i> Documento</label>
                    <p>{{ $vehiculo->cliente->numero_documento }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Correo electrónico</label>
                    <p>{{ $vehiculo->cliente->email }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="celular"><i class="fas fa-mobile-alt"></i> Celular</label>
                    <p>{{ $vehiculo->cliente->celular }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <p><b>Información del vehículo</b></p>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="placa">Placa del Vehículo</label>
                    <p>{{ $vehiculo->placa }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marca">Marca</label>
                    <p>{{ $vehiculo->marca }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marca">Modelo</label>
                    <p>{{ $vehiculo->modelo }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marca">Color</label>
                    <p>{{ $vehiculo->color }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="marca">Tipo de Vehículo</label>
                    <p>{{ $vehiculo->tipo }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
