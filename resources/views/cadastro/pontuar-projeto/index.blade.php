@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Pontuarprojeto</div>
                    <div class="panel-body">
                        <a href="{{ url('/listar-projetos-convidados) }}" class="btn btn-success btn-sm" title="Add New PontuarProjeto">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/cadastro/pontuar-projeto') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
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
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th></th><th>Resposta Publica</th><th>Resposta Confidencial</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pontuarprojeto as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->pontuar }}</td><td>{{ $item->resposta_publica }}</td><td>{{ $item->resposta_confidencial }}</td>
                                        <td>
                                            <a href="{{ url('/cadastro/pontuar-projeto/' . $item->id) }}" title="View PontuarProjeto"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/cadastro/pontuar-projeto/' . $item->id . '/edit') }}" title="Edit PontuarProjeto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <!-- <form method="POST" action="{{ url('/cadastro/pontuar-projeto' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-xs" title="Delete PontuarProjeto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pontuarprojeto->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
