<?php

namespace App\Http\Controllers;

use App\TipoExame;
use Illuminate\Http\Request;

class TipoExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtendo os dados dos tipos de exames
        $tipoexames  = TipoExame::all();
        //retornando o index com o parâmetro
        return view('tipoexames.index', compact('tipoexames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoexames.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nome_tpex'             =>   'required|max:30',
            'sigla_tpex'             =>   'required|max:5',
            'desc_tpex'             =>   'required|max:250'
        ]);
        //executar o método de gravação
        $tipoexame = TipoExame::create($validateData);
        //retornando a tela principal
        return redirect('/tipoexames')->with('success','Dados adicionados com sucesso!');
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
        $tipoexame = TipoExame::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('tipoexames.show', compact('tipoexame'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoexame = TipoExame::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('tipoexames.edit', compact('tipoexame'));
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
        $validateData = $request->validate([
            'nome_tpex'             =>   'required|max:30',
            'sigla_tpex'             =>   'required|max:5',
            'desc_tpex'             =>   'required|max:250'
        ]);
        TipoExame::whereId($id)->update($validateData);
        //retornando a tela principal
        return redirect('/tipoexames')->with('success','Dados atualizados com sucesso!');
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
        $tipoexame = TipoExame::findOrFail($id);
        //excluindo
        $tipoexame->delete();
        //redirecionando para o index
        return redirect('/tipoexames')->with('success','Dados removidos com sucesso!');
    }
}
