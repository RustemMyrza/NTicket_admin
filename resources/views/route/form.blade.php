<div class="form-group {{ $errors->has('from_place') ? 'has-error' : ''}}">
    <label for="from_place" class="control-label">{{ 'Откуда' }}</label>
    <input class="form-control" name="from_place" type="text" id="from_place" value="{{ isset($route) ? $route->from_place : ''}}" >
    {!! $errors->first('from_place"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('to_place') ? 'has-error' : ''}}">
    <label for="to_place" class="control-label">{{ 'Куда' }}</label>
    <input class="form-control" name="to_place" type="text" id="to_place" value="{{ isset($route) ? $route->to_place : ''}}" >
    {!! $errors->first('to_place"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('departure_time') ? 'has-error' : ''}}">
    <label for="departure_time" class="control-label">{{ 'Дата и время отбытия' }}</label>
    <input class="form-control" name="departure_time" type="datetime-local" id="departure_time" value="{{ isset($route) ? $route->departure_time : ''}}" >
    {!! $errors->first('departure_time"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('arrival_time') ? 'has-error' : ''}}">
    <label for="arrival_time" class="control-label">{{ 'Дата и время прибытия' }}</label>
    <input class="form-control" name="arrival_time" type="datetime-local" id="arrival_time" value="{{ isset($route) ? $route->arrival_time : ''}}" >
    {!! $errors->first('arrival_time"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    <label for="price" class="control-label">{{ 'Цена' }}</label>
    <input class="form-control" name="price" type="number" id="price" value="{{ isset($route) ? $route->price : ''}}" >
    {!! $errors->first('price"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('seats_number') ? 'has-error' : ''}}">
    <label for="seats_number" class="control-label">{{ 'Количество мест' }}</label>
    <input class="form-control" name="seats_number" type="number" id="seats_number" value="{{ isset($route) ? $route->seats_number : ''}}" >
    {!! $errors->first('seats_number"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>