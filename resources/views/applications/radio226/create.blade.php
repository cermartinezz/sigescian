@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    @include('applications.radio226.header')
                    <hr>
                    @include('applications.radio226.forms.form_create_226')
                </div>
            </div>

        </div>
    </div>
@endsection