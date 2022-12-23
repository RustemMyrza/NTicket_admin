@extends('adminlte::page')

@section('title', 'Аналитика ')

@section('content_header')
    <h1>Аналитика</h1>
@stop
@section('content')
    <div class="card-body">
        <a href="{{ url('/admin/analytics') }}" title="Назад">
            <button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button>
        </a>
        <br/>
        <br/>

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/admin/analytics/' . $analytics->id) }}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include ('analytics.form', ['formMode' => 'edit'])

        </form>
    </div>
    <script src="/ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content_en');
        CKEDITOR.replace('content_kz');
        CKEDITOR.replace('content_ru');
        CKEDITOR.replace('content_ch');
        CKEDITOR.replace('content_tr');
        CKEDITOR.replace('content_phr');
    </script>

@endsection
@push('scripts')
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('my-editor');
    </script>
@endpush
