@extends('adminlte::page')

@section('title', 'Контакты')

@section('content_header')
    <h1>Контакты</h1>
@stop
@section('content')
<div class="card-body">
    @include('flash-message')
@if ($errors->any())
<ul class="alert alert-danger">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif

    <form method="POST" action="{{ url('/admin/contacts') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group {{ $errors->has('phone_number') ? 'has-error' : ''}}">
                <label for="phone_number" class="control-label">{{ 'Номер телефона' }}</label>
                <input class="form-control" name="phone_number" type="text" id="phone_number" value="{{ isset($contacts->phone_number) ? $contacts->phone_number : ''}}" >
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                <label for="email" class="control-label">{{ 'Почта' }}</label>
                <input class="form-control" name="email" type="email" id="email" value="{{ isset($contacts->email) ? $contacts->email : ''}}">
            </div>

            <div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
                <label for="address" class="control-label">{{ 'Адрес1' }}</label>
                <input class="form-control" name="address" type="text" id="address" value="{{ isset($contacts->address) ? $contacts->address : ''}}">
            </div>

            <div class="form-group {{ $errors->has('address2') ? 'has-error' : ''}}">
                <label for="address2" class="control-label">{{ 'Адрес2' }}</label>
                <input class="form-control" name="address2" type="text" id="address2" value="{{ isset($contacts->address2) ? $contacts->address2 : ''}}">
            </div>

            <div class="form-group {{ $errors->has('whats_app') ? 'has-error' : ''}}">
                <label for="whats_app" class="control-label">{{ 'Whats_app' }}</label>
                <input class="form-control" name="whats_app" type="text" id="whats_app" value="{{ isset($contacts->whats_app) ? $contacts->whats_app : ''}}">
            </div>

            <div class="form-group {{ $errors->has('telegram') ? 'has-error' : ''}}">
                <label for="telegram" class="control-label">{{ 'Тelegram' }}</label>
                <input class="form-control" name="telegram" type="text" id="telegram" value="{{ isset($contacts->telegram) ? $contacts->telegram : ''}}">
            </div>

            <div class="form-group {{ $errors->has('facebook') ? 'has-error' : ''}}">
                <label for="facebook" class="control-label">{{ 'facebook' }}</label>
                <input class="form-control" name="facebook" type="text" id="facebook" value="{{ isset($contacts->facebook) ? $contacts->facebook : ''}}">
            </div>
            
            <div class="form-group {{ $errors->has('insta') ? 'has-error' : ''}}">
                <label for="insta" class="control-label">{{ 'instagram' }}</label>
                <input class="form-control" name="insta" type="text" id="insta" value="{{ isset($contacts->insta) ? $contacts->insta : ''}}">
            </div>

            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                <label for="description" class="control-label">{{ 'Описание' }}</label>
                <textarea class="form-control" rows="5" name="description" type="textarea" id="description" >{{ isset($contacts->description) ? $contacts->description : ''}}</textarea>
            </div> -->

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="{{ 'Сохранить' }}">
            </div>


        </form>
@endsection
