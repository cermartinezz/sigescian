@extends('app')
    
@section('content')
    
    <h1>Role: {{$clients->name}}</h1>

    <div class="row">
        <div class="col-md-10">
            @include('clients.forms.edit')
        </div>
    </div>
    
@endsection