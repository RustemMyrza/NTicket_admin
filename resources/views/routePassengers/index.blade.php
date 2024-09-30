@extends('adminlte::page')

@section('title', 'Пассажиры ' . $routeName . ' (' . $organizationName . ')')


@section('content_header')
    <h1>Пассажиры {{$routeName}} ({{$organizationName}})</h1>
@stop

@section('content')

    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/organization/' . $organizationId . '/route/') }}" class="btn btn-danger btn-sm" title="Назад">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Назад
        </a>

        <form method="GET" action="{{ url('/admin/organization/' . $organizationId . '/route/' . $routeId . '/passenger') }}" accept-charset="UTF-8"
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
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Отчество</th>
                    <th>Электронная почта</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($passengers))
                    @foreach($passengers as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($item->name) ? Str::limit($item->name, 50) : '' }}</td>
                                <td>{{ isset($item->surname) ? Str::limit($item->surname, 50) : '' }}</td>
                                <td>{{ isset($item->middle_name) ? Str::limit($item->middle_name, 50) : '' }}</td>
                                <td>{{ isset($item->email) ? Str::limit($item->email, 50) : '' }}</td>
                                <td>
                                <a href="{{ url('/admin/client/' . $item->id) }}" title="Посмотреть блок"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a>
                                </td>
                            </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

    </div>
@endsection
