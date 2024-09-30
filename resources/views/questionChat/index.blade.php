@extends('adminlte::page')

@section('title', 'Заявки')

@section('content_header')
    <h1>Вопросы</h1>
@stop

@section('content')

    <div class="card-body">
        @include('flash-message')
        <form method="GET" action="{{ url('/admin/questionChat') }}" accept-charset="UTF-8"
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
                    <th>Вопрос</th>
                    <th>Ответ</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @if (isset($question))
                    @foreach($question as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ isset($item->question) ? Str::limit($item->question, 50) : '' }}</td>
                                <td>{{ isset($item->answer) ? Str::limit($item->answer, 50) : 'Не отвечено' }}</td>
                                <td>
                                <a href="{{ url('/admin/questionChat/' . $item->id) }}" title="Посмотреть блок"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a>
                                <a href="{{ url('/admin/questionChat/' . $item->id . '/edit') }}" title="Редактировать блок">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"
                                                                                aria-hidden="true"></i> Редактировать
                                        </button>
                                    </a>
                                    <form method="POST" action="{{ url('/admin/questionChat/' . $item->id . '/delete') }}"
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
            <div class="pagination-wrapper"> {!! $question->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>

    </div>
@endsection
