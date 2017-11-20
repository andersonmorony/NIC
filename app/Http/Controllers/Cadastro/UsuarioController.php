<?php

namespace App\Http\Controllers\cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Session;

class UsuarioController extends Controller
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

        if (!empty($keyword)) {
            $usuario = User::where('nome', 'LIKE', "%$keyword%")
				->orWhere('sobrenome', 'LIKE', "%$keyword%")
				->orWhere('cpf', 'LIKE', "%$keyword%")
				->orWhere('data_nascimento', 'LIKE', "%$keyword%")
				->orWhere('celular', 'LIKE', "%$keyword%")
				->orWhere('rua', 'LIKE', "%$keyword%")
				->orWhere('cidade', 'LIKE', "%$keyword%")
				->orWhere('estado', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('senha', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usuario = User::paginate($perPage);
        }

        return view('Cadastro.usuario.index', compact('usuario'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('Cadastro.usuario.create');
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
        
        $requestData = $request->all();
        
        Usuario::create($requestData);

        Session::flash('flash_message', 'Usuario added!');

        return redirect('cadastro/usuario');
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
        $usuario = User::findOrFail($id);

        return view('Cadastro.usuario.show', compact('usuario'));
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
        $usuario = User::findOrFail($id);

        return view('Cadastro.usuario.edit', compact('usuario'));
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
        
        $requestData = $request->all();
        
        $usuario = User::findOrFail($id);
        $usuario->update($requestData);

        Session::flash('flash_message', 'Usuario updated!');

        return redirect('cadastro/usuario');
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
        User::destroy($id);

        Session::flash('flash_message', 'Usuario deleted!');

        return redirect('cadastro/usuario');
    }
}
