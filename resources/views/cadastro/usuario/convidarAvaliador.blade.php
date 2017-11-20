@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">

                <div class="panel panel-default">
                    <div class="panel-heading">Convidar Avaliadores</div>
                    <div class="panel-body">
                        <!-- <a href="{{ url('/cadastro/usuario/create') }}" class="btn btn-success btn-sm" title="Add New Usuario">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Novo Usuário
                        </a> -->

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless myTable">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nome</th><th>Email</th><th>CPF</th><th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->cpf }}</td>
                                        <td>
                                           <button class="btn btn-danger btn-xs btn-convidar" data-id='{{ $item->id }}' data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true" ></i>Convidar</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $usuario->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <form method="POST" action="{{ url('/escolherProjeto') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">  
        {{ csrf_field() }}
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel"><small>Escolha os projetos que o avaliador poderá avaliar</small></h4>
          </div>
          <div class="modal-body">
            <table class="table myTable">
                <tr>
                    <th style="text-align: center;">Escolher</th>
                    <th style="text-align: center;">Nome do Projeto</th>
                    <th style="text-align: center;">Aluno</th>
                </tr>
                <input type="hidden" name="id_usuario" id="id_usuario">
                @foreach($projeto as $item)
                <tr style="text-align: center;">
                    <td><input type="checkbox" name="projeto[]" value="{{ $item->id_projeto }}"></td>
                    <td>{{ $item->Titulo }}</td>
                    <td>{{ $item->name }}</td>
                </tr>
                @endforeach
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </div>
        </form>
      </div>
    </div>
@endsection
