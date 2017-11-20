<div class="form-group {{ $errors->has('Titulo') ? 'has-error' : ''}}">
    <label for="Titulo" class="col-md-4 control-label">{{ 'Titulo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="Titulo" type="text" id="Titulo" value="{{ $projeto->Titulo or ''}}" required>
        {!! $errors->first('Titulo', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('descricao') ? 'has-error' : ''}}">
    <label for="descricao" class="col-md-4 control-label">{{ '' }}</label>
    <div class="col-md-6">
        <textarea class="form-control" rows="5" name="descricao" type="textarea" id="descricao" >{{ $projeto->descricao or ''}}</textarea>
        {!! $errors->first('descricao', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('Arquivo') ? 'has-error' : ''}}">
    <label for="Arquivo" class="col-md-4 control-label">{{ 'Arquivo' }}</label>
    <div class="col-md-6">
        <input class="form-control" name="Arquivo" type="file" id="Arquivo" value="{{ $projeto->Arquivo or ''}}" required>
        {!! $errors->first('Arquivo', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>
