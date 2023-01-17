@extends('adminlte::page')

@section('title', 'баннер '.$banner->id)

@section('content_header')
    <h1>баннер {{ $banner->id }}</h1>
@stop

@section('content')

    <div class="card-body">

        <a href="{{ url('/admin/banner') }}" title="Назад">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button>
        </a>
        <a href="{{ url('/admin/banner/' . $banner->id . '/edit') }}" title="Редактировать баннер">
            <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать
            </button>
        </a>

        <form method="POST" action="{{ url('admin/banner' . '/' . $banner->id) }}" accept-charset="UTF-8"
              style="display:inline">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="btn btn-danger btn-sm" title="Удалить баннер"
                    onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt" aria-hidden="true"></i>
                Удалить
            </button>
        </form>
        <br/>
        <br/>

        <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th>ID</th>
                    <td>{{ $banner->id }}</td>
                </tr>
                <tr>
                    <th> Заголовок</th>
                    <td> {{ $banner->title }} </td>
                </tr>
                <tr>
                    <th> Описание</th>
                    <td> {{ $banner->content }} </td>
                </tr>
                <tr>
                    <th> Иконка</th>
                    <td><img src="{{ \Config::get('constants.alias.cdn_url').$banner->icon }}" alt="" width="50px;">
                    </td>
                </tr>
                <tr>
                    <th> Изображение</th>
                    <td><img src="{{ \Config::get('constants.alias.cdn_url').$banner->image }}" alt="" width="300px;">
                    </td>
                </tr>
                <tr>
                    <th> Ссылка</th>
                    <td> {{ $banner->url }} </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
@endsection
