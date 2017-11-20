@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Projeto {{ $projeto->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/cadastro/projeto') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cadastro/projeto/' . $projeto->id . '/edit') }}" title="Edit Projeto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('cadastro/projeto' . '/' . $projeto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete Projeto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $projeto->id }}</td>
                                    </tr>
                                    <tr><th> Autor </th><td> {{ $projeto->name }} </td></tr>
                                    <tr><th> Titulo </th><td> {{ $projeto->Titulo }} </td></tr><tr><th> Descrição </th><td> {{ $projeto->descricao }} </td></tr><tr><th> Arquivo </th><td> {{ $projeto->Arquivo }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
