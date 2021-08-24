<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // obtendo os dados de todos os pacientes
        $pacientes = Paciente::all();
        // chamando a tela e enviando o objeto $pacientes
        // como parâmetro
        return view('pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // chamando a tela para o cadastro de pacientes
        return view ('pacientes.create');
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
            'genero'    =>      'required|max:35'
        ]);
        // executando o método para a gravação do registro
        $paciente = Paciente::create($validateData);
        // redirecionando para a tela principal do módulo
        // de pacientes
        return redirect('/pacientes')->with('success','Dados adicionados com sucesso!');
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
        $paciente = Paciente::findOrFail($id);
        // retornando a tela de visualização com o
        // objeto recuperado
        return view('pacientes.show',compact('paciente'));
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
        $paciente = Paciente::findOrFail($id);
        // retornando a tela de edição com o
        // objeto recuperado
        return view('pacientes.edit', compact('paciente'));
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
            'genero'    =>      'required|max:35'
        ]);
        // criando um objeto para receber o resultado
        // da persistência (atualização) dos dados validados 
        Paciente::whereId($id)->update($validateData);
        // redirecionando para o diretório raiz (index)
        return redirect('/pacientes')->with('success', 
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
        $paciente = Paciente::findOrFail($id);
        // realizando a exclusão
        $paciente->delete();
        // redirecionando para o diretório raiz (index)
        return redirect('/pacientes')->with('success', 
        'Dados removidos com sucesso!');
    }
}
