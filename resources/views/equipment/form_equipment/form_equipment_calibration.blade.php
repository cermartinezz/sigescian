<form action="/equipos/{{$equipments->id}}/calibrate" method="POST">
    {{ method_field('POST') }}
    {{ csrf_field() }}
    <div class="form-group {{$errors->has('date_calibration') ? 'has-error': ''}} ">
        <label for="date_calibration">Fecha Calibracion:</label>
        <input type="date" name="date_calibration" class="form-control" value="{{old('date_calibration',\Carbon\Carbon::today()->format('Y-m-d'))}}" required autofocus>
        @if ($errors->has('date_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('date_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('days_of_calibration') ? 'has-error': ''}} ">
        <label for="days_of_calibration">Duracion de Calibracion(dias):</label>
        <input type="number" name="days_of_calibration" class="form-control" value="{{old('days_of_calibration',$equipments->days_of_calibration)}}" required autofocus min="1">
        @if ($errors->has('days_of_calibration'))
            <span class="help-block">
                <strong>{{ $errors->first('days_of_calibration') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group {{$errors->has('calibrate_company') ? 'has-error': ''}} ">
        <label for="calibrate_company">Calibrado por:</label>
        <input type="text" name="calibrate_company" class="form-control" value="{{old('calibrate_company',$equipments->calibrate_company)}}" required autofocus>
        @if ($errors->has('calibrate_company'))
            <span class="help-block">
                <strong>{{ $errors->first('calibrate_company') }}</strong>
            </span>
        @endif
    </div>
    <button class="btn btn-primary">Actualizar Calibracion</button>
</form>