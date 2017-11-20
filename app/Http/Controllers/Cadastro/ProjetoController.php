<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Projeto;
use Illuminate\Http\Request;
use Session;
use Auth;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
       public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $id_user = Auth::id();
        if (!empty($keyword)) {
            $projeto = Projeto::where('Titulo', 'LIKE', "%$keyword%")
				->orWhere('descricao', 'LIKE', "%$keyword%")
				->orWhere('Arquivo', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $projeto = Projeto::leftjoin('Users','Users.id', '=', 'projetos.id_user')->where('projetos.id_user', '=', $id_user)->paginate($perPage);
        }
        //dd($projeto);
        return view('cadastro.projeto.index', compact('projeto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cadastro.projeto.create');
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
			'Titulo' => 'required',
			'Arquivo' => 'required'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('Arquivo')) {
            foreach($request['Arquivo'] as $file){
                $uploadPath = public_path('/uploads/Arquivo');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['Arquivo'] = $fileName;
            }
        }
        $id_user = Auth::id();
        //dd($request);
        Projeto::create([
            'Titulo' => $request->Titulo,
            'descricao' => $request->descricao,
            'Arquivo' => $request->Arquivo,
            'id_user' => $id_user
        ]);

        Session::flash('flash_message', 'Projeto added!');

        return redirect('cadastro/projeto');
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
        $projeto = Projeto::leftjoin('Users','Users.id', '=', 'projetos.id_user')->findOrFail($id);

        return view('cadastro.projeto.show', compact('projeto'));
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
        $projeto = Projeto::findOrFail($id);

        return view('cadastro.projeto.edit', compact('projeto'));
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
			'Titulo' => 'required',
			'Arquivo' => 'required'
		]);
        $requestData = $request->all();
        

        if ($request->hasFile('Arquivo')) {
            foreach($request['Arquivo'] as $file){
                $uploadPath = public_path('/uploads/Arquivo');

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;

                $file->move($uploadPath, $fileName);
                $requestData['Arquivo'] = $fileName;
            }
        }

        $projeto = Projeto::findOrFail($id);
        $projeto->update($requestData);

        Session::flash('flash_message', 'Projeto updated!');

        return redirect('cadastro/projeto');
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
        Projeto::destroy($id);

        Session::flash('flash_message', 'Projeto deleted!');

        return redirect('cadastro/projeto');
    }
}
