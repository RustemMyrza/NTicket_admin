@extends('adminlte::page')

@section('title', 'Когда Вам нужен качественный анализ рынка?')

@section('content_header')
    <h1>Когда Вам нужен качественный<br> анализ рынка?</h1>
@stop

@section('content')
    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/market-analysis/create') }}" class="btn btn-success btn-sm" title="Добавить параграф">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить
        </a>

        <form method="GET" action="{{ url('/admin/market-analysis') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
            <div class="input-group">
                <input type="text" class="form-control" name="search" placeholder="Поиск..." value="{{ request('search') }}">
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
                        <th>#</th><th>Содержимое</th><th>Действие</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($marketanalysis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->content }}</td>
                        <td>
                            <a href="{{ url('/admin/market-analysis/' . $item->id . '/edit') }}" title="Редактировать параграф"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt" aria-hidden="true"></i> Редактировать</button></a>
                            <form method="POST" action="{{ url('/admin/market-analysis' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete MarketAnalysi" onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt" aria-hidden="true"></i> Удалить</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $marketanalysis->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
@endsection
