<?php

namespace App\Http\Controllers;

use App\Especialidade;
use Illuminate\Http\Request;

class EspecialidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //obtendo os dados das especialidades
        $especialidades = Especialidade::all();
        //retornando a tela com $especialidades como parâmetro
        return view('especialidades.index', compact('especialidades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornando a tela de cadastro de especialidades
        return view('especialidades.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacao de dados
        $validateData = $request->validate([
            'nome_esp'         =>      'required|max:45',
            'sigla_esp'        =>      'required|max:5',
            'obs_esp'          =>      'required|max:250'
        ]);
        //executar método de gravação dos registros
        $especialidade = Especialidade::create($validateData);
        //retornando a tela principal de Especialidades
        return \redirect('/especialidades')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //criando objeto para receber o resultado do registro buscado
        $especialidade = Especialidade::findOrFail($id);
        //retornando a tela de visualização com o objeto 
        return view('especialidades.show', compact('especialidade'));
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
        $especialidade = Especialidade::findOrFail($id);
        return view('especialidades.edit', compact('especialidade'));
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
        //validacao de dados
        $validateData = $request->validate([
            'nome_esp'         =>      'required|max:45',
            'sigla_esp'        =>      'required|max:5',
            'obs_esp'          =>      'required|max:250'
        ]);
        //objeto para receber os dados atualizados
        Especialidade::whereId($id)->update($validateData);
        //redirecionando para o index
        return redirect('/especialidades')->with('success', 
        'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //localizando objeto para ser excluído
        $especialidade = Especialidade::findOrFail($id);
        //excluindo
        $especialidade->delete();
        //redirecionando para o index
        return redirect('/especialidades')->with('success', 
        'Dados removidos com sucesso!');
    }
}
