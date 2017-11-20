<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('nome') ? 'has-error' : ''}}">
        <label for="nome" class="control-label">{{ 'Nome' }}</label>
        <input class="form-control" name="nome" type="text" id="nome" value="{{ $usuario->nome or ''}}"> {!! $errors->first('nome', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('sobrenome') ? 'has-error' : ''}}">
        <label for="sobrenome" class="control-label">{{ 'Sobrenome' }}</label>
        <input class="form-control" name="sobrenome" type="text" id="sobrenome" value="{{ $usuario->sobrenome or ''}}"> {!! $errors->first('sobrenome', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('cpf') ? 'has-error' : ''}}">
        <label for="cpf" class="control-label">{{ 'Cpf' }}</label>
        <input class="form-control" name="cpf" type="text" id="cpf" value="{{ $usuario->cpf or ''}}"> {!! $errors->first('cpf', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('data_nascimento') ? 'has-error' : ''}}">
        <label for="data_nascimento" class="control-label">{{ 'Data Nascimento' }}</label>
        <input class="form-control" name="data_nascimento" type="date" id="data_nascimento" value="{{ $usuario->data_nascimento or ''}}"> {!! $errors->first('data_nascimento', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('celular') ? 'has-error' : ''}}">
        <label for="celular" class="control-label">{{ 'Celular' }}</label>
        <input class="form-control" name="celular" type="text" id="celular" value="{{ $usuario->celular or ''}}"> {!! $errors->first('celular', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('rua') ? 'has-error' : ''}}">
        <label for="rua" class="control-label">{{ 'Rua' }}</label>
        <input class="form-control" name="rua" type="text" id="rua" value="{{ $usuario->rua or ''}}"> {!! $errors->first('rua', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('cidade') ? 'has-error' : ''}}">
        <label for="cidade" class="control-label">{{ 'Cidade' }}</label>
        <input class="form-control" name="cidade" type="text" id="cidade" value="{{ $usuario->cidade or ''}}"> {!! $errors->first('cidade', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('estado') ? 'has-error' : ''}}">
        <label for="estado" class="control-label">{{ 'Estado' }}</label>
        <input class="form-control" name="estado" type="text" id="estado" value="{{ $usuario->estado or ''}}"> {!! $errors->first('estado', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
        <label for="email" class="control-label">{{ 'Email' }}</label>
        <input class="form-control" name="email" type="text" id="email" value="{{ $usuario->email or ''}}"> {!! $errors->first('email', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="col-md-6">
    <div style="padding: 5px;" class="form-group {{ $errors->has('senha') ? 'has-error' : ''}}">
        <label for="senha" class="control-label">{{ 'Senha' }}</label>
        <input class="form-control" name="senha" type="password" id="senha" value="{{ $usuario->senha or ''}}"> {!! $errors->first('senha', '
        <p class="help-block">:message</p>') !!}
    </div>
</div>

        <div class="col-md-6">
            <div style="padding: 5px;" class="form-group {{ $errors->has('senha') ? 'has-error' : ''}}">
                <label for="senha" class="control-label">Nível Acesso</label>
                <select class="form-control">
                    <option value="1">Usuário</option>
                    <option value="1">Avaliador</option>
                    <option value="1">Úsuario</option>
                </select>
            </div>            
        </div>
        <div class="col-md-6">
            <div style="padding: 5px;" class="form-group {{ $errors->has('senha') ? 'has-error' : ''}}">
                <label for="senha" class="control-label">Desabilitar</label>
                <input class="form-control" name="desabilitar" type="checkbox" id="desabilitar" value="1"> {!! $errors->first('senha', '
                <p class="help-block">:message</p>') !!}
            </div>
        </div>


<div class="form-group pull-right">
    <div class="col-md-12">
        <input class="btn btn-primary" type="submit" value="{{ $submitButtonText or 'Create' }}">
    </div>
</div>