@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Projeto</div>
                    <div class="panel-body">
                        <a href="{{ url('/cadastro/projeto/create') }}" class="btn btn-success btn-sm" title="Add New Projeto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Cadastrar Novo Projeto
                        </a>

                        <form method="GET" action="{{ url('/cadastro/projeto') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search">Buscar</i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless table-sm">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Autor</th>
                                        <th>Titulo</th>
                                        <th>Descrição</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projetos as $item)
                                        <tr>
                                            <td>{{ $loop->iteration or $item->id }}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->Titulo}}</td>
                                            <td>{{$item->descricao}}</td>
                                            <td><a href="{{url('/pontuar?id='.$item->id)}}" class="btn btn-primary btn-sm">Pontuar</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
