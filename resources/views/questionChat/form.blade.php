<div class="form-group {{ $errors->has('question') ? 'has-error' : ''}}">
    <label for="question" class="control-label">{{ 'Вопрос' }}</label>
    <textarea class="form-control" name="question" id="question" readonly>
        {{ $question->question }}
    </textarea>
    {!! $errors->first('question"', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group {{ $errors->has('answer') ? 'has-error' : ''}}">
    <label for="answer" class="control-label">{{ 'Ответ' }}</label>
    <textarea class="form-control" name="answer" id="answer">{{ $question->answer ? $question->answer : '' }}</textarea>
    {!! $errors->first('answer"', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Обновить' : 'Создать' }}">
</div>