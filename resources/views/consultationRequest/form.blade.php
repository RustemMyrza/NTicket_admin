<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Название' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($organization) ? $organization->name : ''}}" >
    {!! $errors->first('name"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('transport_type') ? 'has-error' : ''}}">
    <label for="transport_type" class="control-label">{{ 'Тип транспорта' }}</label>
    <br>
    <select name="transport_type" id="transport_type">
        <option value="1" {{ isset($organization) && $organization->transport_type == 1 ? 'selected' : '' }}>Самолет</option>
        <option value="2" {{ isset($organization) && $organization->transport_type == 2 ? 'selected' : '' }}>Автобус</option>
        <option value="3" {{ isset($organization) && $organization->transport_type == 3 ? 'selected' : '' }}>Поезд</option>
    </select>

    {!! $errors->first('transport_type"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('image') ? 'has-error' : ''}}">
    <label for="image" class="control-label">{{ 'Изображение' }}</label>
    <input class="form-control" name="image" type="file" id="image" value="{{ isset($organization) ? isset($organization->image) ? url($organization->image) : '' : '' }}" >
    {!! $errors->first('image', '<p class="help-block">:message</p>') !!}
</div>
@if (isset($organization) && isset($organization->image))
    <div class="form-group">
        <img src="{{ url($organization->image) }}" alt="{{ url($organization->image) }}" width="300px;">
    </div>
@endif


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>