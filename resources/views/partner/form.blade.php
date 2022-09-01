<ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-ru-tab" data-toggle="pill" href="#custom-tabs-one-ru" role="tab" aria-controls="custom-tabs-one-ru" aria-selected="true">Русский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-en-tab" data-toggle="pill" href="#custom-tabs-one-en" role="tab" aria-controls="custom-tabs-one-en" aria-selected="false">Английский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-kz-tab" data-toggle="pill" href="#custom-tabs-one-kz" role="tab" aria-controls="custom-tabs-one-kz" aria-selected="false">Казахский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-tr-tab" data-toggle="pill" href="#custom-tabs-one-tr" role="tab" aria-controls="custom-tabs-one-tr" aria-selected="false">Турецкий</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-ch-tab" data-toggle="pill" href="#custom-tabs-one-ch" role="tab" aria-controls="custom-tabs-one-ch" aria-selected="false">Китайский</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="custom-tabs-one-phr-tab" data-toggle="pill" href="#custom-tabs-one-phr" role="tab" aria-controls="custom-tabs-one-phr" aria-selected="false">Персидский</a>
    </li>
</ul>

<div class="tab-content col-md-12" id="custom-tabs-one-tabContent">
    <div class="tab-pane fade" id="custom-tabs-one-ru" role="tabpanel" aria-labelledby="custom-tabs-one-ru-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_ru" class="control-label">{{ 'Наименование RU' }}</label>
            <input class="form-control" name="title[ru]" type="text" id="title_ru" value="{{ isset($partner->getTitle->ru) ? $partner->getTitle->ru : old('title.ru')}}" >
            {!! $errors->first('title[ru]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание RU' }}</label>
            <input class="form-control" name="content[ru]" type="text" id="content_ru" value="{{ isset($partner->getContent->ru) ? $partner->getContent->ru : old('content.ru')}}" >
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-en" role="tabpanel" aria-labelledby="custom-tabs-one-en-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_en" class="control-label">{{ 'Наименование EN' }}</label>
            <input class="form-control" name="title[en]" type="text" id="title_en" value="{{ isset($partner->getTitle->en) ? $partner->getTitle->en : old('title.en')}}" >
            {!! $errors->first('title[en]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ru" class="control-label">{{ 'Описание EN' }}</label>
            <input class="form-control" name="content[en]" type="text" id="content_ru" value="{{ isset($partner->getContent->en) ? $partner->getContent->en : old('content.en')}}" >
            {!! $errors->first('content[ru]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-kz" role="tabpanel" aria-labelledby="custom-tabs-one-kz-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_kz" class="control-label">{{ 'Наименование KZ' }}</label>
            <input class="form-control" name="title[kz]" type="text" id="title_kz" value="{{ isset($partner->getTitle->kz) ? $partner->getTitle->kz : old('title.kz')}}" >
            {!! $errors->first('title[kz]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_kz" class="control-label">{{ 'Описание KZ' }}</label>
            <input class="form-control" name="content[kz]" type="text" id="content_kz" value="{{ isset($partner->getContent->kz) ? $partner->getContent->kz : old('content.kz')}}" >
            {!! $errors->first('content[kz]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-tr" role="tabpanel" aria-labelledby="custom-tabs-one-tr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_tr" class="control-label">{{ 'Наименование TUR' }}</label>
            <input class="form-control" name="title[tr]" type="text" id="title_tr" value="{{ isset($partner->getTitle->tr) ? $partner->getTitle->tr : old('title.tr')}}" >
            {!! $errors->first('title[tr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_tr" class="control-label">{{ 'Описание TUR' }}</label>
            <input class="form-control" name="content[tr]" type="text" id="content_tr" value="{{ isset($partner->getContent->tr) ? $partner->getContent->tr : old('content.tr')}}" >
            {!! $errors->first('content[tr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-ch" role="tabpanel" aria-labelledby="custom-tabs-one-ch-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_ch" class="control-label">{{ 'Наименование CHI' }}</label>
            <input class="form-control" name="title[ch]" type="text" id="title_ch" value="{{ isset($partner->getTitle->ch) ? $partner->getTitle->ch : old('title.ch')}}" >
            {!! $errors->first('title[ch]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_ch" class="control-label">{{ 'Описание CHI' }}</label>
            <input class="form-control" name="content[ch]" type="text" id="content_ch" value="{{ isset($partner->getContent->ch) ? $partner->getContent->ch : old('content.ch')}}" >
            {!! $errors->first('content[ch]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="tab-pane fade" id="custom-tabs-one-phr" role="tabpanel" aria-labelledby="custom-tabs-one-phr-tab">
        <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
            <label for="title_phr" class="control-label">{{ 'Наименование PRS' }}</label>
            <input class="form-control" name="title[phr]" type="text" id="title_phr" value="{{ isset($partner->getTitle->phr) ? $partner->getTitle->phr : old('title.phr')}}" >
            {!! $errors->first('title[phr]', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
            <label for="content_phr" class="control-label">{{ 'Описание PRS' }}</label>
            <input class="form-control" name="content[phr]" type="text" id="content_phr" value="{{ isset($partner->getContent->phr) ? $partner->getContent->phr : old('content.phr')}}" >
            {!! $errors->first('content[phr]"', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>


<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($partner->image) ? $partner->image : ''}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
@if (isset($partner->image))
    <div class="form-group">
        <img src="{{ \Config::get('constants.alias.cdn_url').$partner->image }}" alt="" width="300px;">
    </div>
@endif

<div class="form-group {{ $errors->has('block_id') ? 'has-error' : ''}}" hidden>
    <label for="block_id" class="control-label">{{ 'Block Id' }}</label>
    <input class="form-control" name="block_id" type="number" id="block_id" value="{{ isset($partner->block_id) ? $partner->block_id : request('block_id')}}" >
    {!! $errors->first('block_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
