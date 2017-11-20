<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\PontuarProjeto;
use Illuminate\Http\Request;
use Session;

class PontuarProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pontuarprojeto = PontuarProjeto::where('', 'LIKE', "%$keyword%")
				->orWhere('resposta_publica', 'LIKE', "%$keyword%")
				->orWhere('resposta_confidencial', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $pontuarprojeto = PontuarProjeto::paginate($perPage);
        }

        return view('cadastro.pontuar-projeto.index', compact('pontuarprojeto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cadastro.pontuar-projeto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'ponto' => 'required',
			'resposta_publica' => 'required',
			'resposta_confidencial' => 'required'
		]);
        $requestData = $request->all();
        //dd($requestData);
        PontuarProjeto::create([
            'ponto' => $request->ponto,
            'resposta_publica' => $request->resposta_publica,
            'resposta_confidencial' => $request->resposta_confidencial,
            'projeto_id' => $request->projeto_id,
        ]);

        Session::flash('flash_message', 'PontuarProjeto added!');

        return redirect('cadastro/pontuar-projeto');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $pontuarprojeto = PontuarProjeto::findOrFail($id);

        return view('cadastro.pontuar-projeto.show', compact('pontuarprojeto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $pontuarprojeto = PontuarProjeto::findOrFail($id);

        return view('cadastro.pontuar-projeto.edit', compact('pontuarprojeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        $this->validate($request, [
			'evolucao_projeto' => 'required',
			'resposta_publica' => 'required',
			'resposta_confidencial' => 'required'
		]);
        $requestData = $request->all();
        
        $pontuarprojeto = PontuarProjeto::findOrFail($id);
        $pontuarprojeto->update($requestData);

        Session::flash('flash_message', 'PontuarProjeto updated!');

        return redirect('cadastro/pontuar-projeto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PontuarProjeto::destroy($id);

        Session::flash('flash_message', 'PontuarProjeto deleted!');

        return redirect('cadastro/pontuar-projeto');
    }

    public function pontuar_projeto(Request $request)
    {
        $id_projeto = $request->id;
        return view('cadastro.pontuar-projeto.create', compact('id_projeto'));
    } 
}
