@extends('adminlte::page')

@section('title', 'Редактирование блока')

@section('content_header')
    <h1>Редактирование блока</h1>
@stop
@section('content')
    <div class="card-body">
        <a href="{{ url('/admin/analytics-block') }}" title="Назад"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Назад</button></a>
        <br />
        <br />

        @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ url('/admin/analytics-block/' . $analyticsblock->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include ('analytics-block.form', ['formMode' => 'edit'])

        </form>

    </div>
@endsection
@section('js')
    {{-- CKEditor CDN --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
                .create( document.querySelector( '#content' ) )
                .then( editor => {
                        console.log( editor );
                } )
                .catch( error => {
                        console.error( error );
                } );
</script>

@endsection
