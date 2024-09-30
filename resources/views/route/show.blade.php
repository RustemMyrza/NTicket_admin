@extends('adminlte::page')

@section('title', 'Просмотр блока')

@section('content_header')
    <h1>Просмотр блока</h1>
@stop

@section('content')

    <div class="card-body">

        <a href="{{ url('/admin/organization/' . $organizationId . '/route') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
        <a href="{{ url('/admin/organization/' . $organizationId . '/route/' . $route->id . '/edit') }}" title="Редактировать блок"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>

        <form method="POST" action="{{ url('admin/organization/' . $organizationId . '/route/' . $route->id . '/delete') }}" accept-charset="UTF-8" style="display:inline">
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
                        <th>ID</th><td>{{ $route->id }}</td>
                    </tr>
                    <tr><th> Место отбытия </th><td> {{ isset($route->from_place) ? Str::limit($route->from_place, 50) : '' }} </td></tr>
                    <tr><th> Место прибытия </th><td> {{ isset($route->to_place) ? Str::limit($route->to_place, 50) : '' }} </td></tr>
                    <tr><th> Дата и время отбытия </th><td> {{ isset($route->departure_time) ? Str::limit($route->departure_time, 50) : '' }} </td></tr>
                    <tr><th> Дата и время прибытия </th><td> {{ isset($route->arrival_time) ? Str::limit($route->arrival_time, 50) : '' }} </td></tr>
                    <tr><th> Цена </th><td> {{ isset($route->price) ? Str::limit($route->price, 50) : '' }} </td></tr>
                    <tr><th> Количество мест </th><td> {{ isset($route->seats_number) ? Str::limit($route->seats_number, 50) : '' }} </td></tr>
                    <tr><th> Организация </th><td> {{ isset($organizationName) ? Str::limit($organizationName, 50) : '' }} </td></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
