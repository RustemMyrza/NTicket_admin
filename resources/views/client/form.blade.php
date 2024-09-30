<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Имя' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($client) ? $client->name : ''}}" >
    {!! $errors->first('name"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    <label for="surname" class="control-label">{{ 'Фамилия' }}</label>
    <input class="form-control" name="surname" type="text" id="surname" value="{{ isset($client) ? $client->surname : ''}}" >
    {!! $errors->first('surname"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('middle_name') ? 'has-error' : ''}}">
    <label for="middle_name" class="control-label">{{ 'Отчество' }}</label>
    <input class="form-control" name="middle_name" type="text" id="middle_name" value="{{ isset($client) ? $client->middle_name : ''}}" >
    {!! $errors->first('middle_name"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="email" class="control-label">{{ 'Электронная почта' }}</label>
    <input class="form-control" name="email" type="email" id="email" value="{{ isset($client) ? $client->email : ''}}" >
    {!! $errors->first('email"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('birth_date') ? 'has-error' : ''}}">
    <label for="birth_date" class="control-label">{{ 'Дата рождения' }}</label>
    <input class="form-control" name="birth_date" type="date" id="birth_date" value="{{ isset($client) ? $client->birth_date : ''}}" >
    {!! $errors->first('birth_date"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    <label for="password" class="control-label">{{ 'Пароль' }}</label>
    <input class="form-control" name="password" type="password" id="password" value="{{ isset($client) ? $client->password : ''}}" >
    {!! $errors->first('password"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>