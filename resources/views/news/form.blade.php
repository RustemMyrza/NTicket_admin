<ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="custom-tabs-one-ru-tab" data-toggle="pill" href="#custom-tabs-one-ru" role="tab"
           aria-controls="custom-tabs-one-ru" aria-selected="true">Русский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en" role="tab"
           aria-controls="custom-tabs-one-en" aria-selected="false">Английский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-kz-tab" data-toggle="pill" href="#custom-tabs-one-kz" role="tab"
           aria-controls="custom-tabs-one-kz" aria-selected="false">Казахский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-tr-tab" data-toggle="pill" href="#custom-tabs-one-tr" role="tab"
           aria-controls="custom-tabs-one-tr" aria-selected="false">Турецкий</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-ch-tab" data-toggle="pill" href="#custom-tabs-one-ch" role="tab"
           aria-controls="custom-tabs-one-ch" aria-selected="false">Китайский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-phr-tab" data-toggle="pill" href="#custom-tabs-one-phr" role="tab"
           aria-controls="custom-tabs-one-phr" aria-selected="false">Персидский</a>
    </li>
</ul>

<div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
    <div class="tab-pane active in" id="custom-tabs-one-ru" role="tabpanel" aria-labelledby="custom-tabs-one-ru-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_ru" class="control-label">{{ 'Наименование RU' }}</label>
            <textarea class="form-control" name="title[ru]" type="text"
                      id="title_ru">{{ isset($news->getTitle->ru) ? $news->getTitle->ru : old('title.ru')}}</textarea>
            {!! $errors->first('title[ru]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание RU' }}</label>
            <textarea class="form-control" name="content[ru]" id="content_ru">
                {{ isset($news->getContent->ru) ? $news->getContent->ru : old('content.ru')}}
            </textarea>
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_en" class="control-label">{{ 'Наименование EN' }}</label>
            <input class="form-control" name="title[en]" type="text" id="title_en"
                   value="{{ isset($news->getTitle->en) ? $news->getTitle->en : old('title.en')}}">
            {!! $errors->first('title[en]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание EN' }}</label>
            <textarea class="form-control" name="content[en]" id="content_en">
                {{ isset($news->getContent->en) ? $news->getContent->en : old('content.en')}}
            </textarea>
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-kz" role="tabpanel" aria-labelledby="custom-tabs-one-kz-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_kz" class="control-label">{{ 'Наименование KZ' }}</label>
            <input class="form-control" name="title[kz]" type="text" id="title_kz"
                   value="{{ isset($news->getTitle->kz) ? $news->getTitle->kz : old('title.kz')}}">
            {!! $errors->first('title[kz]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_kz" class="control-label">{{ 'Описание KZ' }}</label>
            <textarea class="form-control" name="content[kz]" type="text" id="content_kz">
                {{ isset($news->getContent->kz) ? $news->getContent->kz : old('content.kz')}}
            </textarea>
            {!! $errors->first('content[kz]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-tr" role="tabpanel" aria-labelledby="custom-tabs-one-tr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_tr" class="control-label">{{ 'Наименование TUR' }}</label>
            <input class="form-control" name="title[tr]" type="text" id="title_tr"
                   value="{{ isset($news->getTitle->tr) ? $news->getTitle->tr : old('title.tr')}}">
            {!! $errors->first('title[tr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_tr" class="control-label">{{ 'Описание TUR' }}</label>
            <textarea class="form-control" name="content[tr]" type="text" id="content_tr">
                {{ isset($news->getContent->tr) ? $news->getContent->tr : old('content.tr')}}
            </textarea>
            {!! $errors->first('content[tr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-ch" role="tabpanel" aria-labelledby="custom-tabs-one-ch-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_ch" class="control-label">{{ 'Наименование CHI' }}</label>
            <input class="form-control" name="title[ch]" type="text" id="title_ch"
                   value="{{ isset($news->getTitle->ch) ? $news->getTitle->ch : old('title.ch')}}">
            {!! $errors->first('title[ch]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ch" class="control-label">{{ 'Описание CHI' }}</label>
            <textarea class="form-control" name="content[ch]" type="text" id="content_ch">
                {{ isset($news->getContent->ch) ? $news->getContent->ch : old('content.ch')}}
            </textarea>
            {!! $errors->first('content[ch]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-phr" role="tabpanel" aria-labelledby="custom-tabs-one-phr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_phr" class="control-label">{{ 'Наименование PRS' }}</label>
            <input class="form-control" name="title[phr]" type="text" id="title_phr"
                   value="{{ isset($news->getTitle->phr) ? $news->getTitle->phr : old('title.phr')}}">
            {!! $errors->first('title[phr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_phr" class="control-label">{{ 'Описание PRS' }}</label>
            <textarea class="ckeditor form-control" name="content[phr]" type="text" id="content_phr">
                {{ isset($news->getContent->phr) ? $news->getContent->phr : old('content.phr')}}
            </textarea>
            {!! $errors->first('content[phr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('viewing') ? 'has-error' : ''}}">
    <label for="viewing" class="control-label">{{ 'Просмотр' }}</label>
    <input class="form-control" name="viewing" type="number" id="viewing"
           value="{{ isset($news->viewing) ? $news->viewing : ''}}">
    {!! $errors->first('viewing', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('popular') ? 'has-error' : ''}}">
    <label for="popular" class="control-label">{{ 'Популярный' }}</label>
    <input class="form-control" name="popular" type="checkbox" id="popular"
           @if($news->popular == true)
           checked
            @endif

    >
</div>
<div class="form-group {{ $errors->has('video') ? 'has-error' : ''}}">
    <label for="video" class="control-label">{{ 'Видео' }}</label>
    <input class="form-control" name="video" type="text" id="video"
           value="{{ isset($news->video) ? $news->video : ''}}">
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('link') ? 'has-error' : ''}}">
    <label for="link" class="control-label">{{ 'Ссылка:' }}</label>
    <input class="form-control" name="link" type="text" id="link"
           value="{{ isset($news->link) ? $news->link : ''}}">
    {!! $errors->first('video', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image"
           value="{{ isset($news->image) ? $news->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
@if (isset($news->image))
    <div class="form-group">
        <img src="{{ \Config::get('constants.alias.cdn_url').$news->image }}" alt="" width="300px;">
    </div>
@endif
<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
