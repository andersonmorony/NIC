<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\AvalidarProjetos;

class ListarProjetosConvidadoController extends Controller
{
   public function index()
   {
   		$id = Auth::id();
   		$projetos = AvalidarProjetos::leftjoin('projetos','projetos.id', '=', 'projeto_id')->leftjoin('users','users.id', '=', 'id_user')->where('user_id', '=', $id)->get();
   		//dd($projetos);

   		return view('Cadastro.projeto.listar_projetos', compact('projetos'));
   }
}
