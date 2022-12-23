@extends('adminlte::page')

@section('title', 'Баннер')

@section('content_header')
    <h1>Баннер</h1>
@stop

@section('content')
    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/banner/create') }}" class="btn btn-success btn-sm" title="Добавить баннер">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить баннер
        </a>

        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th><th>Заголовок</th><th>Изображение</th><th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($banner as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->getTitle->ru }}</td>
                        <td><img src="{{url("$item->image")}}" alt="" width="200px;"></td>
                        <td>
                            <!-- <a href="{{ url('/admin/banner/' . $item->id) }}" title="Просмотр слайда"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a> -->
                            <a href="{{ url('/admin/banner/' . $item->id . '/edit') }}" title="Редактировать баннер"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>

                            <form method="POST" action="{{ url('/admin/banner' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Удалить баннер" onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt" aria-hidden="true"></i> Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $banner->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
@endsection
