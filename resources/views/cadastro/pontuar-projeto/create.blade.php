@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New PontuarProjeto</div>
                    <div class="panel-body">
                        <a href="{{ url('/cadastro/pontuar-projeto') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/cadastro/pontuar-projeto') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="projeto_id" value="{{$id_projeto}}">
                            <div class="form-group {{ $errors->has('') ? 'has-error' : ''}}">
                            <label for="" class="col-md-4 control-label">{{ 'pontuar' }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="ponto" id="pontuar" required="">
                                    <option value="">--Selecione--</option>
                                    <option value="3">3 - Ótimo</option>
                                    <option value="2">2 - Aceito</option>
                                    <option value="1">1 - Fraco</option>
                                    <option value="0"> 0 - Sem Progresso</option>
                                    <option value="-1"> -1 - fraco Reijeitado</option>
                                    <option value="-2">-2 - Rejeitado</option>
                                    <option value="-3">-3 - Certamente Rejeitado</option>
                                </select>
                                {!! $errors->first('', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('resposta_publica') ? 'has-error' : ''}}">
                            <label for="resposta_publica" class="col-md-4 control-label">{{ 'Resposta Publica' }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="resposta_publica" type="textarea" id="resposta_publica" required>{{ $pontuarprojeto->resposta_publica or ''}}</textarea>
                                <small>Responda o porque da avaliação, Essa resposta é publica</small>
                                {!! $errors->first('resposta_publica', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div><div class="form-group {{ $errors->has('resposta_confidencial') ? 'has-error' : ''}}">
                            <label for="resposta_confidencial" class="col-md-4 control-label">{{ 'Resposta Confidencial' }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" rows="5" name="resposta_confidencial" type="textarea" id="resposta_confidencial" required>{{ $pontuarprojeto->resposta_confidencial or ''}}</textarea>
                            <small>Responda o porque da avaliação, Essa resposta é Privada apenas para o administrador da página</small>
                                {!! $errors->first('resposta_confidencial', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-4">
                                <input class="btn btn-success" type="submit" value="{{ $submitButtonText or 'Pontuar' }}">
                            </div>
                        </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
