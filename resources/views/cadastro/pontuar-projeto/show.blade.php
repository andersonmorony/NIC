@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">PontuarProjeto {{ $pontuarprojeto->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/cadastro/pontuar-projeto') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/cadastro/pontuar-projeto/' . $pontuarprojeto->id . '/edit') }}" title="Edit PontuarProjeto"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <!-- <form method="POST" action="{{ url('cadastro/pontuarprojeto' . '/' . $pontuarprojeto->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-xs" title="Delete PontuarProjeto" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form> -->
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $pontuarprojeto->id }}</td>
                                    </tr>
                                    <tr><th>Ponto</th><td> {{ $pontuarprojeto->ponto }} </td></tr><tr><th> Resposta Publica </th><td> {{ $pontuarprojeto->resposta_publica }} </td></tr><tr><th> Resposta Confidencial </th><td> {{ $pontuarprojeto->resposta_confidencial }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
