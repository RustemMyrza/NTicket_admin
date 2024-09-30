@extends('adminlte::page')

@section('title', 'Просмотр блока')

@section('content_header')
    <h1>Просмотр блока</h1>
@stop

@section('content')

    <div class="card-body">

        <a onclick="event.preventDefault(); window.history.back();" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
        <a href="{{ url('/admin/client/' . $client->id . '/edit') }}" title="Редактировать блок"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>

        <form method="POST" action="{{ url('admin/client/' .  $client->id) }}" accept-charset="UTF-8" style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Удалить блок" onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt" aria-hidden="true"></i> Удалить</button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th>ID</th><td>{{ $client->id }}</td>
                    </tr>
                    <tr><th> Имя </th><td> {{ isset($client->name) ? Str::limit($client->name, 50) : '' }} </td></tr>
                    <tr><th> Фамилия </th><td> {{ isset($client->surname) ? Str::limit($client->surname, 50) : '' }} </td></tr>
                    <tr><th> Отчество </th><td> {{ isset($client->middle_name) ? Str::limit($client->middle_name, 50) : '' }} </td></tr>
                    <tr><th> Электронная почта </th><td> {{ isset($client->email) ? Str::limit($client->email, 50) : '' }} </td></tr>
                    <tr><th> Дата рождения </th><td> {{ isset($client->birth_date) ? Str::limit($client->birth_date, 50) : '' }} </td></tr>
                    <tr><th> Пароль </th><td> {{ isset($client->password) ? $client->password : '' }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
