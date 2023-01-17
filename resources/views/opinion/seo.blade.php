@extends('adminlte::page')

@section('title', 'Экспертное мнение SEO')

@section('content_header')
    <h1>Экспертное мнение SEO</h1>
@stop
@section('content')
    <div class="card-body">
        <a href="{{ url('/admin/opinion') }}" title="Назад">
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
        <form method="POST" action="{{route('opinions-seo-store')}}" accept-charset="UTF-8"
              class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <input type="hidden" name="opinion_id" value="{{$opinion->id}}">

            <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-ru-tab" data-toggle="pill" href="#custom-tabs-one-ru"
                       role="tab"
                       aria-controls="custom-tabs-one-ru" aria-selected="true">Русский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en"
                       role="tab"
                       aria-controls="custom-tabs-one-en" aria-selected="false">Английский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-kz-tab" data-toggle="pill" href="#custom-tabs-one-kz"
                       role="tab"
                       aria-controls="custom-tabs-one-kz" aria-selected="false">Казахский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-tr-tab" data-toggle="pill" href="#custom-tabs-one-tr"
                       role="tab"
                       aria-controls="custom-tabs-one-tr" aria-selected="false">Турецкий</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-ch-tab" data-toggle="pill" href="#custom-tabs-one-ch"
                       role="tab"
                       aria-controls="custom-tabs-one-ch" aria-selected="false">Китайский</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-phr-tab" data-toggle="pill" href="#custom-tabs-one-phr"
                       role="tab"
                       aria-controls="custom-tabs-one-phr" aria-selected="false">Персидский</a>
                </li>
            </ul>

            <div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
                <div class="tab-pane active in" id="custom-tabs-one-ru" role="tabpanel"
                     aria-labelledby="custom-tabs-one-ru-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_ru" class="control-label">{{ 'Наименование RU' }}</label>
                        <textarea class="form-control" name="title[ru]" type="text"
                                  id="title_ru">{{ isset($opinion->metaTitle->ru) ? $opinion->metaTitle->ru : old('title.ru')}}</textarea>
                        {!! $errors->first('title[ru]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_ru" class="control-label">{{ 'Описание RU' }}</label>
                        <textarea class="form-control" name="content[ru]" id="content_ru">
                {{ isset($opinion->metaDescription->ru) ? $opinion->metaDescription->ru : old('content.ru')}}
            </textarea>
                        {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel"
                     aria-labelledby="custom-tabs-one-en-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_en" class="control-label">{{ 'Наименование EN' }}</label>
                        <input class="form-control" name="title[en]" type="text" id="title_en"
                               value="{{ isset($opinion->metaTitle->en) ? $opinion->metaTitle->en : old('title.en')}}">
                        {!! $errors->first('title[en]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_ru" class="control-label">{{ 'Описание EN' }}</label>
                        <textarea class="form-control" name="content[en]" id="content_en">
                {{ isset($opinion->metaDescription->en) ? $opinion->metaDescription->en : old('content.en')}}
            </textarea>
                        {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-kz" role="tabpanel"
                     aria-labelledby="custom-tabs-one-kz-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_kz" class="control-label">{{ 'Наименование KZ' }}</label>
                        <input class="form-control" name="title[kz]" type="text" id="title_kz"
                               value="{{ isset($opinion->metaTitle->kz) ? $opinion->metaTitle->kz : old('title.kz')}}">
                        {!! $errors->first('title[kz]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_kz" class="control-label">{{ 'Описание KZ' }}</label>
                        <textarea class="form-control" name="content[kz]" type="text" id="content_kz">
                {{ isset($opinion->metaDescription->kz) ? $opinion->metaDescription->kz : old('content.kz')}}
            </textarea>
                        {!! $errors->first('content[kz]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-tr" role="tabpanel"
                     aria-labelledby="custom-tabs-one-tr-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_tr" class="control-label">{{ 'Наименование TUR' }}</label>
                        <input class="form-control" name="title[tr]" type="text" id="title_tr"
                               value="{{ isset($opinion->metaTitle->tr) ? $opinion->metaTitle->tr : old('title.tr')}}">
                        {!! $errors->first('title[tr]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_tr" class="control-label">{{ 'Описание TUR' }}</label>
                        <textarea class="form-control" name="content[tr]" type="text" id="content_tr">
                {{ isset($opinion->metaDescription->tr) ? $opinion->metaDescription->tr : old('content.tr')}}
            </textarea>
                        {!! $errors->first('content[tr]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-ch" role="tabpanel"
                     aria-labelledby="custom-tabs-one-ch-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_ch" class="control-label">{{ 'Наименование CHI' }}</label>
                        <input class="form-control" name="title[ch]" type="text" id="title_ch"
                               value="{{ isset($opinion->metaTitle->ch) ? $opinion->metaTitle->ch : old('title.ch')}}">
                        {!! $errors->first('title[ch]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_ch" class="control-label">{{ 'Описание CHI' }}</label>
                        <textarea class="form-control" name="content[ch]" type="text" id="content_ch">
                {{ isset($opinion->metaDescription->ch) ? $opinion->metaDescription->ch : old('content.ch')}}
            </textarea>
                        {!! $errors->first('content[ch]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="tab-pane fade" id="custom-tabs-one-phr" role="tabpanel"
                     aria-labelledby="custom-tabs-one-phr-tab">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                        <label for="title_phr" class="control-label">{{ 'Наименование PRS' }}</label>
                        <input class="form-control" name="title[phr]" type="text" id="title_phr"
                               value="{{ isset($opinion->metaTitle->phr) ? $opinion->metaTitle->phr : old('title.phr')}}">
                        {!! $errors->first('title[phr]', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
                        <label for="content_phr" class="control-label">{{ 'Описание PRS' }}</label>
                        <textarea class="ckeditor form-control" name="content[phr]" type="text" id="content_phr">
                {{ isset($opinion->metaDescription->phr) ? $opinion->metaDescription->phr : old('content.phr')}}
            </textarea>
                        {!! $errors->first('content[phr]"', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit"
                       value="Создать">
            </div>


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
