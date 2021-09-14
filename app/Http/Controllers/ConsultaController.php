<?php

namespace App\Http\Controllers;

use App\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo os dados de todas as consultas
        $consultas = Consulta::all();
        // chamando a tela e enviando o objeto $consultas
        // como parâmetro
        return view('consultas.index', compact('consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('consultas.create');
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
            'paciente_id'      =>      'required|max:35',
            'medico_id'        =>      'required|max:35',
            'data'             =>      'required|max:35',
            'hora'             =>      'required|max:35'
        ]);
        // executando o método para a gravação do registro
        $consulta = Consulta::create($validateData);
        // redirecionando para a tela principal do módulo
        // de pacientes
        return redirect('/consultas')->with('success','Dados adicionados com sucesso!');
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
        $consulta = Consulta::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('consultas.show',compact('consulta'));
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
        $consulta = Consulta::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('consultas.edit', compact('consulta'));
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
            'paciente_id'      =>      'required|max:35',
            'medico_id'        =>      'required|max:35',
            'data'             =>      'required|max:35',
            'hora'             =>      'required|max:35'
        ]);
        // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Consulta::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/consultas')->with('success', 
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
        $consulta = Consulta::findOrFail($id);
        // realizando a exclusão
        $consulta->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/consultas')->with('success', 
        'Dados removidos com sucesso!');
    }
}
