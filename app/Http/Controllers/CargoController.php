<?php

namespace App\Http\Controllers;

use App\Cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtendo os dados dos cargos
        $cargos  = Cargo::all();
        //retornando o index com o parâmetro
        return view('cargos.index', compact('cargos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornando a tela de cadastro de cargos
        return view('cargos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validando os dados
        $validateData = $request->validate([
            'nome_cargo'             =>   'required|max:30',
            'desc_cargo'             =>   'required|max:250'
        ]);
        //executar o método de gravação
        $cargo = Cargo::create($validateData);
        //retornando a tela principal
        return redirect('/cargos')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //criando objeto para receber o resultado da busca
        $cargo = Cargo::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('cargos.show', compact('cargo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cargo = Cargo::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('cargos.edit', compact('cargo'));
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
        //validando os dados
        $validateData = $request->validate([
            'nome_cargo'             =>   'required|max:30',
            'desc_cargo'             =>   'required|max:250'
        ]);
        //
        Cargo::whereId($id)->update($validateData);
        //retornando a tela principal
        return redirect('/cargos')->with('success','Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //localizando objeto ara excluir
        $cargo = Cargo::findOrFail($id);
        //excluindo
        $cargo->delete();
        //redirecionando para o index
        return redirect('/cargos')->with('success','Dados removidos com sucesso!');
    }
}
