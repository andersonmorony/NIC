<?php

namespace App\Http\Controllers\Cadastro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Projeto;
use Auth;
use App\AvalidarProjetos;

class ConvidarAvaliadorController extends Controller
{

	   public function __construct()
    {
        $this->middleware('auth');
    }

        public function avaliador(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

    
        $usuario = User::paginate($perPage);
        $projeto = Projeto::select('projetos.id as id_projeto', 'projetos.*', 'users.name', 'avalidar_projetos.user_id as id_projetos_ja_convidados')->leftjoin('Users','Users.id', '=', 'projetos.id_user')->leftjoin('avalidar_projetos', 'avalidar_projetos.projeto_id', '=', 'projetos.id')->groupBy('id')->get();
        //dd($projeto);
        return view('Cadastro.usuario.convidarAvaliador', compact('usuario', 'projeto'));
    }

    public function escolherProjeto(Request $request)
    {
    	 $requestData = $request->all();
    	 $userID = Auth::user()->id;

    	 
    	 $qtd = count($request->projeto);

    	 $verificacao = AvalidarProjetos::get();
    	 for($i = 0; $i < $qtd; $i++)
    	 {
    	 	foreach($verificacao as $item)
    	 	{
		    	if(($item->user_id == $request->id_usuario) AND ($item->projeto_id == $request->projeto[$i]))
		    	{
					return redirect('/adicionar-avaliador?Erro=1');
		    	}
    	 	}
	    	
    	
			AvalidarProjetos::create([
	    	 	'projeto_id' => $request->projeto[$i],
	    	 	'user_id' => $request->id_usuario
	    	]);
    	 }
    	 
    	 return redirect('/adicionar-avaliador');
    }
}
