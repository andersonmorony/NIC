<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exemplo2;
use Illuminate\Http\Request;
use Session;

class Exemplo2Controller extends Controller
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
            $exemplo2 = Exemplo2::where('title', 'LIKE', "%$keyword%")
				->orWhere('content', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $exemplo2 = Exemplo2::paginate($perPage);
        }

        return view('cadastro.exemplo2.index', compact('exemplo2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cadastro.exemplo2.create');
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
        
        Exemplo2::create($requestData);

        Session::flash('flash_message', 'Exemplo2 added!');

        return redirect('cadastro/exemplo2');
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
        $exemplo2 = Exemplo2::findOrFail($id);

        return view('cadastro.exemplo2.show', compact('exemplo2'));
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
        $exemplo2 = Exemplo2::findOrFail($id);

        return view('cadastro.exemplo2.edit', compact('exemplo2'));
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
        
        $exemplo2 = Exemplo2::findOrFail($id);
        $exemplo2->update($requestData);

        Session::flash('flash_message', 'Exemplo2 updated!');

        return redirect('cadastro/exemplo2');
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
        Exemplo2::destroy($id);

        Session::flash('flash_message', 'Exemplo2 deleted!');

        return redirect('cadastro/exemplo2');
    }
}
