@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Usuários</div>
                    <div class="panel-body">
                        <a href="{{ url('/adicionar-avaliador') }}" class="btn btn-danger btn-sm" title="Add New Usuario">
                            <i class="fa fa-plus" aria-hidden="true"></i> Convidar Avaliador
                        </a>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless myTable">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Nome</th><th>Sobrenome</th><th>Cpf</th><th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($usuario as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td><td>{{ $item->email }}</td><td>{{ $item->cpf }}</td>
                                        <td>
                                            <a href="{{ url('/cadastro/usuario/' . $item->id) }}" title="View Usuario"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> Visualizar</button></a>
                                            <a href="{{ url('/cadastro/usuario/' . $item->id . '/edit') }}" title="Edit Usuario"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/cadastro/usuario' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete Usuario" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Apagar</button>
                                            </form>
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
@endsection
