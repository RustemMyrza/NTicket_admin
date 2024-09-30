@extends('adminlte::page')

@section('title', 'Маршруты ' . $organizationName)


@section('content_header')
    <h1>Маршруты {{$organizationName}}</h1>
@stop

@section('content')

    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/organization/' . $organizationId . '/route/create') }}" class="btn btn-success btn-sm" title="Добавить новый блок">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить
        </a>
        <a href="{{ url('/admin/organization/') }}" class="btn btn-danger btn-sm" title="Назад">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
        </a>

        <form method="GET" action="{{ url('/admin/organization') }}" accept-charset="UTF-8"
              class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Поиск..."
                       value="{{ request('search') }}">
                <span class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>

        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Место отбытия</th>
                    <th>Место прибытия</th>
                    <th>Дата и время отбытия</th>
                    <th>Дата и время прибытия</th>
                    <th>Цена</th>
                    <th>Количество мест</th>
                    <th>Организация</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($route))
                    @foreach($route as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($item->from_place) ? Str::limit($item->from_place, 50) : '' }}</td>
                                <td>{{ isset($item->to_place) ? Str::limit($item->to_place, 50) : '' }}</td>
                                <td>{{ isset($item->departure_time) ? Str::limit($item->departure_time, 50) : '' }}</td>
                                <td>{{ isset($item->arrival_time) ? Str::limit($item->arrival_time, 50) : '' }}</td>
                                <td>{{ isset($item->price) ? Str::limit($item->price, 50) : '' }}</td>
                                <td>{{ isset($item->seats_number) ? Str::limit($item->seats_number, 50) : '' }}</td>
                                <td><a href="{{ isset($item->organizer) ? url('/admin/organization/' . $organizationId) : '#' }}">{{ isset($item->organizer) ? Str::limit($organizationName, 50) : '' }}</a></td>
                                <td>
                                <a href="{{ url('/admin/organization/' . $organizationId . '/route/' . $item->id . '/passenger' ) }}" title="Купившие билеты"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Купившие билеты</button></a>
                                <td>
                                <a href="{{ url('/admin/organization/' . $organizationId . '/route/' . $item->id) }}" title="Посмотреть блок"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a>
                                    <a href="{{ url('/admin/organization/' . $organizationId . '/route/' . $item->id . '/edit') }}" title="Редактировать блок">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"
                                                                                aria-hidden="true"></i> Редактировать
                                        </button>
                                    </a>

                                    <form method="POST" action="{{ url('admin/organization/' . $organizationId . '/route/' . $item->id . '/delete') }}"
                                        accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Удалить блок"
                                                onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt"
                                                                                                aria-hidden="true"></i>
                                            Удалить
                                        </button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $route->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

    </div>
@endsection
