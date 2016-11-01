<form action="/servicios/frotis-radiacion" method="post">
    {{csrf_field()}}
    <div class="panel panel-primary">
        <div class="panel-heading"><h3> Informacion del Cliente</h3></div>
        <div class="panel-body">
            <div class="form-group {{$errors->has('type_service') ? 'has-error': ''}} ">
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="frotis" value="1">Frotis</label>
                <label for="type_service" class="checkbox-inline"><input type="checkbox" name="radiation" value="2">Nivel de Radiación</label>
            @if ($errors->has('type_service'))
                    <span class="help-block">
                <strong>{{ $errors->first('type_service') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('date_application') ? 'has-error': ''}} ">
                <label for="date_application">Fecha de Solicitud:</label>
                <input type="date" name="date_application" class="form-control" value="{{old('date_application',\Carbon\Carbon::today()->format('Y-m-d'))}}" placeholder="01-02-16" required autofocus>
                @if ($errors->has('date_application'))
                    <span class="help-block">
                <strong>{{ $errors->first('date_application') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('name') ? 'has-error': ''}} ">
                <label for="name">Solicitante:</label>
                <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Juan Perez" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('address') ? 'has-error': ''}} ">
                <label for="address">Direccion:</label>
                <textarea name="address" class="form-control" placeholder="Avenida Siempre Viva 742" required autofocus>{{old('address')}}</textarea>
                @if ($errors->has('address'))
                    <span class="help-block">
                <strong>{{ $errors->first('address') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('phone') ? 'has-error': ''}} ">
                <label for="phone">Telefono:</label>
                <input type="text" name="phone" class="form-control" value="{{old('phone')}}" placeholder="2222-2222" required autofocus>
                @if ($errors->has('phone'))
                    <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
                @endif
            </div>
            <div class="form-group {{$errors->has('email') ? 'has-error': ''}} ">
                <label for="email">Correo Electronico:</label>
                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="cliente@cliente.com" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
                @endif
            </div>

        </div>
    </div>
    <br>
    <button class="btn btn-primary">Guardar Solicitud</button>
</form>