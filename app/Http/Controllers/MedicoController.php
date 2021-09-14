<?php

namespace App\Http\Controllers;

use App\Medico;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo os dados de todos os medicos
        $medicos = Medico::all();
        // chamando a tela e enviando o objeto $medicos
        // como parâmetro
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // chamando a tela para o cadastro de medicos
        return view ('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // criando regras para validação
        $validateData = $request->validate([
            'nome'      =>      'required|max:35',
            'crm'       =>      'required|max:35'
        ]);
        // executando o método para a gravação do registro
        $medico = Medico::create($validateData);
        // redirecionando para a tela principal do módulo
        // de medicos
        return redirect('/medicos')->with('success','Dados adicionados com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $medico = Medico::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('medicos.show',compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // criando um objeto para receber o resultado
        // da busca de registro/objeto específico
        $medico = Medico::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('medicos.edit', compact('medico'));
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
         // criando um objeto para testar/aplicar 
        // validações nos dados da requisição
        $validateData = $request->validate([
            'nome'      =>      'required|max:35',
            'crm'       =>      'required|max:35'
        ]);
        // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Medico::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/medicos')->with('success', 
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
        // localizando o objeto que será excluído
        $medico = Medico::findOrFail($id);
        // realizando a exclusão
        $medico->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/medicos')->with('success', 
        'Dados removidos com sucesso!');
    }
}
