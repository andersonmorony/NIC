<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Exemplo;
use Illuminate\Http\Request;
use Session;

class ExemploController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
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
            $exemplo = Exemplo::where('title', 'LIKE', "%$keyword%")
				->orWhere('content', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $exemplo = Exemplo::paginate($perPage);
        }

        return view('cadastro.exemplo.index', compact('exemplo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cadastro.exemplo.create');
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
        
        Exemplo::create($requestData);

        Session::flash('flash_message', 'Exemplo added!');

        return redirect('cadastro/exemplo');
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
        $exemplo = Exemplo::findOrFail($id);

        return view('cadastro.exemplo.show', compact('exemplo'));
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
        $exemplo = Exemplo::findOrFail($id);

        return view('cadastro.exemplo.edit', compact('exemplo'));
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
        
        $exemplo = Exemplo::findOrFail($id);
        $exemplo->update($requestData);

        Session::flash('flash_message', 'Exemplo updated!');

        return redirect('cadastro/exemplo');
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
        Exemplo::destroy($id);

        Session::flash('flash_message', 'Exemplo deleted!');

        return redirect('cadastro/exemplo');
    }
}
