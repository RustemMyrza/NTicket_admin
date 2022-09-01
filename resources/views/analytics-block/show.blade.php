@extends('adminlte::page')

@section('title', 'Просмотр блока')

@section('content_header')
    <h1>Просмотр блока</h1>
@stop
@section('content')
    <div class="card-body">

        <a href="{{ url('/admin/analytics-block') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
        <a href="{{ url('/admin/analytics-block/' . $analyticsblock->id . '/edit') }}" title="Редактировать блок"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>

        <form method="POST" action="{{ url('admin/analyticsblock' . '/' . $analyticsblock->id) }}" accept-charset="UTF-8" style="display:inline">
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
                        <th>ID</th><td>{{ $analyticsblock->id }}</td>
                    </tr>
                    <tr><th> Наименование </th><td> {{ $analyticsblock->title }} </td></tr>
                    <tr><th> Краткое описание </th><td> {{ $analyticsblock->description }} </td></tr>
                    <tr><th> Полное описание </th><td> {{ $analyticsblock->content }} </td></tr>
                    <tr><th> Изображение </th><td> <img src="{{ \Config::get('constants.alias.cdn_url').$analyticsblock->image }}" alt=""> </td></tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
