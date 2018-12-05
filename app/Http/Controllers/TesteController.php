<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tests=\App\Test::all();
        return view('index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $test= new \App\Test;
        $test->nome=$request->get('nome');
        $test->endereco=$request->get('endereco');
        $test->numero=$request->get('numero');
        $test->cidade=$request->get('cidade');
        
        $test->save();
        
        return redirect('tests')->with('success', 'Informação adicionada');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test= \App\Test::find($id);
        return view('edit',compact('test','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $test= \App\Test::find($id);
        $test->nome=$request->get('nome');
        $test->endereco=$request->get('endereco');
        $test->numero=$request->get('numero');
        $test->cidade=$request->get('cidade');
        $test->save();
        return redirect('tests');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = \App\Test::find($id);
        $test->delete();
        return redirect('tests')->with('success','Informação deletada');
    }
}
