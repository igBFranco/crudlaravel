<?php

namespace App\Http\Controllers;

use App\Convenio;
use Illuminate\Http\Request;

class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtendo os dados dos convenios
        $convenios  = Convenio::all();
        //retornando o index com o parâmetro
        return view('convenios.index', compact('convenios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornando a tela de cadastro de convenios
        return view('convenios.create');
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
            'nome_conv'             =>   'required|max:45',
            'fone_conv'             =>   'required|max:10',
            'site_conv'             =>   'required|max:35',
            'contato_conv'          =>   'required|max:25',
            'perccons_conv'         =>   'required|max:11',
            'percexame_conv'        =>   'required|max:11',
        ]);
        //executar o método de gravação
        $convenio = Convenio::create($validateData);
        //retornando a tela principal
        return redirect('/convenios')->with('success','Dados adicionados com sucesso!');
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
        $convenio = Convenio::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('convenios.show', compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $convenio = Convenio::findOrFail($id);
        //retornando a tela de visualização com o objeto
        return view('convenios.edit', compact('convenio'));
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
            'nome_conv'             =>   'required|max:45',
            'fone_conv'             =>   'required|max:10',
            'site_conv'             =>   'required|max:35',
            'contato_conv'          =>   'required|max:25',
            'perccons_conv'         =>   'required|max:11',
            'percexame_conv'        =>   'required|max:11',
    ]);
    //objeto para receber os dados atualizados
    Convenio::whereId($id)->update($validateData);
    //retornando a tela principal
    return redirect('/convenios')->with('success','Dados atualizados com sucesso!');
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
        $convenio = Convenio::findOrFail($id);
        //excluindo
        $convenio->delete();
        //redirecionando para o index
        return redirect('/convenios')->with('success','Dados removidos com sucesso!');
    }
}
