@extends('adminlte::page')

@section('title', 'Блок Партнеры')

@section('content_header')
    <h1>Блок Партнеры</h1>
@stop

@section('content')
    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/partner-blocks/create') }}" class="btn btn-success btn-sm" title="Добавить">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить
        </a>

        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Заголовок</th>
                    <th>Партнеры</th>
                    <th>Очередь</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($partner_blocks as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->getTitle->ru }}</td>
                        <td><a href="{{ url('admin/partner?block_id=' . $item->id) }}">{{ 'Редактировать' }}</a></td>
                        <!-- nakat -->
{{--                        <td><img src="/storage/{{ $item->image }}" alt="" width="200px;"></td>--}}
                        <td>{{$item->queue}}</td>
                        <td>
                            <!-- <a href="{{ url('/admin/partner_blocks/' . $item->id) }}" title="Просмотр слайда"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a> -->
                            <a href="{{ url('/admin/partner-blocks/' . $item->id . '/edit') }}" title="Редактировать">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"
                                                                          aria-hidden="true"></i> Редактировать
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/admin/partner-blocks' . '/' . $item->id) }}"
                                  accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Удалить"
                                        onclick="return confirm(&quot;Удалить?&quot;)"><i class="fa fa-trash-alt"
                                                                                          aria-hidden="true"></i>
                                    Удалить
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="pagination-wrapper"> {!! $partner_blocks->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
@endsection
