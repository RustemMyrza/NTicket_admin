@extends('adminlte::page')

@section('title', $fullName . ' (Удостоверение личности)')

@section('content_header')
    <h1>{{ $fullName }} (Удостоверение личности)</h1>
@stop
@section('content')
    <div class="card-body">
        <a href="{{ url('admin/client') }}" class="btn btn-danger btn-sm" title="Назад">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
        </a>
        @include('flash-message')
        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ url('admin/client/' . $clientId . '/id-card' ) }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label">{{ 'Имя' }}</label>
                    <input class="form-control" name="name" type="text" id="name"
                            value="{{ isset($data->name) ? $data->name : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
                    <label for="surname" class="control-label">{{ 'Фамилия' }}</label>
                    <input class="form-control" name="surname" type="text" id="surname"
                            value="{{ isset($data->surname) ? $data->surname : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
                    <label for="middle_name" class="control-label">{{ 'Отчество' }}</label>
                    <input class="form-control" name="middle_name" type="text" id="middle_name"
                            value="{{ isset($data->middle_name) ? $data->middle_name : ''}}">
                </div>

                <div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
                    <label for="birth_date" class="control-label">{{ 'Отчество' }}</label>
                    <input class="form-control" name="birth_date" type="date" id="birth_date"
                            value="{{ isset($data->birth_date) ? $data->birth_date : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('iin') ? 'has-error' : ''}}">
                    <label for="iin" class="control-label">{{ 'ИИН' }}</label>
                    <input class="form-control" name="iin" type="text" id="iin"
                            value="{{ isset($data->iin) ? $data->iin : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
                    <label for="number" class="control-label">{{ 'Номер карты' }}</label>
                    <input class="form-control" name="number" type="text" id="number"
                            value="{{ isset($data->number) ? $data->number : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('nationality') ? 'has-error' : ''}}">
                    <label for="nationality" class="control-label">{{ 'Национальность' }}</label>
                    <input class="form-control" name="nationality" type="text" id="nationality"
                            value="{{ isset($data->nationality) ? $data->nationality : ''}}">
                </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{{ 'Сохранить' }}">
            </div>
        </form>
@endsection