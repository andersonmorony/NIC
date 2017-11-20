@php

use App\User;
use Auth as at;

$id_user = at::id();
$valor = User::select('role')->where('id', '=', $id_user)->first();
@endphp

@if($valor['role'] == 0)
<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Menu
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('cadastro/projeto') }}">
                        Meus Projetos
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@else
<div class="col-md-3">
    <div class="panel panel-default panel-flush">
        <div class="panel-heading">
            Menu
        </div>

        <div class="panel-body">
            <ul class="nav" role="tablist">
                <li role="presentation">
                    <a href="{{ url('cadastro/projeto') }}">
                        Meus Projetos
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('cadastro/usuario') }}">
                        Usuários
                    </a>
                </li>
                <li role="presentation">
                    <a href="{{ url('/adicionar-avaliador') }}">
                        Convidar Avaliadores
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif
