@extends('adminlte::page')

@section('title', $fullName . ' (Банковская карта)')

@section('content_header')
    <h1>{{ $fullName }} (Банковская карта)</h1>
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
        <form method="POST" action="{{ url('admin/client/' . $clientId . '/bank-card' ) }}" accept-charset="UTF-8" class="form-horizontal"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
                <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                    <label for="name" class="control-label">{{ 'Имя' }}</label>
                    <input class="form-control" name="name" type="text" id="name"
                            value="{{ isset($data->name) ? $data->name : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('number') ? 'has-error' : ''}}">
                    <label for="number" class="control-label">{{ 'Номер карты' }}</label>
                    <input class="form-control" name="number" type="text" id="number"
                            value="{{ isset($data->number) ? $data->number : ''}}" required>
                </div>

                <div class="form-group {{ $errors->has('cvv') ? 'has-error' : ''}}">
                    <label for="cvv" class="control-label">{{ 'CVV' }}</label>
                    <input class="form-control" name="cvv" type="text" id="cvv"
                            value="{{ isset($data->cvv) ? $data->cvv : ''}}" required>
                </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{{ 'Сохранить' }}">
            </div>
        </form>
@endsection