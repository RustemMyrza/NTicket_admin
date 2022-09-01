<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
    <label for="title" class="control-label">{{ 'Наименование' }}</label>
    <input class="form-control" name="title" type="text" id="title" value="{{ isset($analyticsblock->title) ? $analyticsblock->title : old('title')}}" >
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    <label for="description" class="control-label">{{ 'Краткое описание' }}</label>
    <input type="text" class="form-control" name="description" id="description" value="{{ isset($analyticsblock->description) ? $analyticsblock->description : old('description')}}">
    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
    <label for="content" class="control-label">{{ 'Подробное описание' }}</label>
    <textarea class="form-control" rows="5" name="content" type="textarea" id="content" >{{ isset($analyticsblock->content) ? $analyticsblock->content : old('content')}}</textarea>
    {!! $errors->first('content', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($analyticsblock->image) ? $analyticsblock->image : old('image')}}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>

@if (isset($analyticsblock->image))
    <div class="form-group">
        <img src="{{ \Config::get('constants.alias.cdn_url').$analyticsblock->image }}" alt="" style="max-width:300px;">
    </div>
@endif

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>
