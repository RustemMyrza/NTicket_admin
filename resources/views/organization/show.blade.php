@extends('adminlte::page')

@section('title', 'Просмотр блока')

@section('content_header')
    <h1>Просмотр блока</h1>
@stop

@section('content')

    <div class="card-body">

        <a href="{{ url('/admin/organization') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
        <a href="{{ url('/admin/organization/' . $organization->id . '/edit') }}" title="Редактировать блок"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>

        <form method="POST" action="{{ url('admin/organization/' .  $organization->id) }}" accept-charset="UTF-8" style="display:inline">
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
                        <th>ID</th><td>{{ $organization->id }}</td>
                    </tr>
                    <tr><th> Название </th><td> {{ isset($organization->name) ? Str::limit($organization->name, 50) : '' }} </td></tr>
                    <tr><th> Описание </th><td>
                        @if (isset($organization->transport_type))
                            @if ($organization->transport_type == 1)
                                Самолет
                            @endif
                            @if ($organization->transport_type == 2)
                                Автобус
                            @endif
                            @if ($organization->transport_type == 3)
                                Поезд
                            @endif
                        @endif 
                        </td></tr>
                    <tr><th> Изображение </th><td><img src="{{ isset($organization->image) ? url($organization->image) : '' }}" alt="{{ isset($organization->image) ? url($organization->image) : '' }}" width="200px;"></td></tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
