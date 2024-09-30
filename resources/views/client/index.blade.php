@extends('adminlte::page')

@section('title', 'Клиенты')

@section('content_header')
    <h1>Клиенты</h1>
@stop

@section('content')

    <div class="card-body">
        @include('flash-message')

        <form method="GET" action="{{ url('/admin/client') }}" accept-charset="UTF-8"
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
                    <th>Дата рождения</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($client))
                    @foreach($client as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($item->name) ? Str::limit($item->name, 50) : '' }}</td>
                                <td>{{ isset($item->surname) ? Str::limit($item->surname, 50) : '' }}</td>
                                <td>{{ isset($item->middle_name) ? Str::limit($item->middle_name, 50) : '' }}</td>
                                <td>{{ isset($item->email) ? Str::limit($item->email, 50) : '' }}</td>
                                <td>{{ isset($item->birth_date) ? Str::limit($item->birth_date, 50) : '' }}</td>
                                <td>{{ isset($item->password) ? Str::limit($item->password, 50) : '' }}</td>
                                <td>
                                <td>
                                <a href="{{ url('/admin/client/' . $item->id) }}" title="Посмотреть блок"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a>
                                    <a href="{{ url('/admin/client/' . $item->id . '/edit') }}" title="Редактировать блок">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"
                                                                                aria-hidden="true"></i> Редактировать
                                        </button>
                                    </a>
                                    <a href="{{ url('/admin/client/' . $item->id . '/bank-card') }}" title="Банковская карта">
                                        <button class="btn btn-secondary btn-sm"><i class="fa fa-credit-card"
                                                                                aria-hidden="true"></i> Банковская карта
                                        </button>
                                    </a>

                                    <a href="{{ url('/admin/client/' . $item->id . '/id-card') }}" title="Удостоверение личности">
                                        <button class="btn btn-warning btn-sm"><i class="fa fa-id-card"
                                                                                aria-hidden="true"></i> Удостоверение личности
                                        </button>
                                    </a>

                                    <form method="POST" action="{{ url('/admin/client/' . $item->id) }}"
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
            <div class="pagination-wrapper"> {!! $client->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

    </div>
@endsection
