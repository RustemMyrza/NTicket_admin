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
            <input class="form-control" name="title[ru]" type="text" id="title_ru"
                   value="{{ isset($analytics->getTitle->ru) ? $analytics->getTitle->ru : old('title.ru')}}">
            {!! $errors->first('title[ru]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание RU' }}</label>
            <textarea class="form-control" name="content[ru]" id="content_ru">
                {{ isset($analytics->getContent->ru) ? $analytics->getContent->ru : old('content.ru')}}
            </textarea>
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория RU' }}</label>
            <input class="form-control" name="category[ru]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->ru) ? $analytics->category->ru : old('category.ru')}}">
            {!! $errors->first('category[ru]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_en" class="control-label">{{ 'Наименование EN' }}</label>
            <input class="form-control" name="title[en]" type="text" id="title_en"
                   value="{{ isset($analytics->getTitle->en) ? $analytics->getTitle->en : old('title.en')}}">
            {!! $errors->first('title[en]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание EN' }}</label>
            <textarea class="form-control" name="content[en]" id="content_ru">
                {{ isset($analytics->getContent->en) ? $analytics->getContent->en : old('content.en')}}
            </textarea>
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>

        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория EN' }}</label>
            <input class="form-control" name="category[en]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->en) ? $analytics->category->en : old('category.en')}}">
            {!! $errors->first('category[en]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-kz" role="tabpanel" aria-labelledby="custom-tabs-one-kz-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_kz" class="control-label">{{ 'Наименование KZ' }}</label>
            <input class="form-control" name="title[kz]" type="text" id="title_kz"
                   value="{{ isset($analytics->getTitle->kz) ? $analytics->getTitle->kz : old('title.kz')}}">
            {!! $errors->first('title[kz]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_kz" class="control-label">{{ 'Описание KZ' }}</label>
            <textarea class="form-control" name="content[kz]" id="content_kz">
                {{ isset($analytics->getContent->kz) ? $analytics->getContent->kz : old('content.kz')}}
            </textarea>
            {!! $errors->first('content[kz]"', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория KZ' }}</label>
            <input class="form-control" name="category[kz]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->kz) ? $analytics->category->kz : old('category.kz')}}">
            {!! $errors->first('category[kz]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-tr" role="tabpanel" aria-labelledby="custom-tabs-one-tr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_tr" class="control-label">{{ 'Наименование TUR' }}</label>
            <input class="form-control" name="title[tr]" type="text" id="title_tr"
                   value="{{ isset($analytics->getTitle->tr) ? $analytics->getTitle->tr : old('title.tr')}}">
            {!! $errors->first('title[tr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_tr" class="control-label">{{ 'Описание TUR' }}</label>
            <textarea class="form-control" name="content[tr]" id="content_tr">
                {{ isset($analytics->getContent->tr) ? $analytics->getContent->tr : old('content.tr')}}
            </textarea>
            {!! $errors->first('content[tr]"', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория TUR' }}</label>
            <input class="form-control" name="category[tr]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->yr) ? $analytics->category->tr : old('category.tr')}}">
            {!! $errors->first('category[tr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-ch" role="tabpanel" aria-labelledby="custom-tabs-one-ch-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_ch" class="control-label">{{ 'Наименование CHI' }}</label>
            <input class="form-control" name="title[ch]" type="text" id="title_ch"
                   value="{{ isset($analytics->getTitle->ch) ? $analytics->getTitle->ch : old('title.ch')}}">
            {!! $errors->first('title[ch]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ch" class="control-label">{{ 'Описание CHI' }}</label>
            <textarea class="form-control" name="content[ch]" id="content_ch">
                {{ isset($analytics->getContent->ch) ? $analytics->getContent->ch : old('content.ch')}}
            </textarea>
            {!! $errors->first('content[ch]"', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория CHI' }}</label>
            <input class="form-control" name="category[ch]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->ch) ? $analytics->category->ch : old('category.ch')}}">
            {!! $errors->first('category[ch]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-phr" role="tabpanel" aria-labelledby="custom-tabs-one-phr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_phr" class="control-label">{{ 'Наименование PRS' }}</label>
            <input class="form-control" name="title[phr]" id="title_phr"
                   value="{{ isset($analytics->getTitle->phr) ? $analytics->getTitle->phr : old('title.phr')}}">
            {!! $errors->first('title[phr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_phr" class="control-label">{{ 'Описание PRS' }}</label>
            <textarea class="form-control" name="content[phr]" type="text" id="content_phr">
                {{ isset($analytics->getContent->phr) ? $analytics->getContent->phr : old('content.phr')}}
            </textarea>
            {!! $errors->first('content[phr]"', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('category') ? 'has-error' : ''}}">
            <label for="category_ru" class="control-label">{{ 'Категория PRS' }}</label>
            <input class="form-control" name="category[phr]" type="text" id="category_ru"
                   value="{{ isset($analytics->category->phr) ? $analytics->category->phr : old('category.phr')}}">
            {!! $errors->first('category[phr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('viewing') ? 'has-error' : ''}}">
    <label for="viewing" class="control-label">{{ 'Просмотр' }}</label>
    <input class="form-control" name="viewing" type="number" id="viewing"
           value="{{ isset($analytics->viewing) ? $analytics->viewing : ''}}">
    {!! $errors->first('viewing', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image"
           value="{{ isset($analytics->image) ? $analytics->image : ''}}">
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
@if (isset($analytics->image))
    <div class="form-group">
        <img src="{{ \Config::get('constants.alias.cdn_url').$analytics->image }}" alt="" width="300px;">
    </div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
