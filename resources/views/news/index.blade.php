@extends('adminlte::page')

@section('title', 'Новости')

@section('content_header')
    <h1>Новости</h1>
@stop

@section('content')
    <div class="card-body">
        @include('flash-message')
        <a href="{{ url('/admin/news/create') }}" class="btn btn-success btn-sm" title="Добавить">
            <i class="fa fa-plus" aria-hidden="true"></i> Добавить
        </a>

        <br/>
        <br/>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Заголовок</th>
                    <th>Популярный</th>
                    <th>Изображение</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->getTitle->ru }}</td>
                        <td>
                            {{$item->popular == 1 ? 'Да' : 'Нет'}}
                        </td>
                        <td><img src="{{url("$item->image")}}" alt="" width="200px;"></td>
                        <td>
                        <!-- <a href="{{ url('/admin/news/' . $item->id) }}" title="Просмотр слайда"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Просмотр</button></a> -->

                            <a class="btn btn-success btn-sm" href="{{route('news-seo', $item->id)}}">
                                Настроить SEO
                            </a>

                            <a href="{{ url('/admin/news/' . $item->id . '/edit') }}" title="Редактировать">
                                <button class="btn btn-primary btn-sm"><i class="fa fa-pencil-alt"
                                                                          aria-hidden="true"></i> Редактировать
                                </button>
                            </a>

                            <form method="POST" action="{{ url('/admin/news' . '/' . $item->id) }}"
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
            <div
                    class="pagination-wrapper"> {!! $news->appends(['search' => Request::get('search')])->render() !!} </div>
        </div>
    </div>
@endsection
