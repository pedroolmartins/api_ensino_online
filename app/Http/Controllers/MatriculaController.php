<?php

namespace App\Http\Controllers;

use App\Matricula;
use App\Aluno;
use App\Curso;
use Illuminate\Http\Request;

class MatriculaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Matricula::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //verifica se id do aluno existe na tabela alunos 
        $aluno = Aluno::find($request->aluno_id);
        if (!$aluno) {
            return response()->json(['erro' => 'o aluno informado nao possui cadastro'], 404);
        }

        //verifica se id do curso existe na tabela cursos 
        $curso = Curso::find($request->curso_id);
        if (!$curso) {
            return response()->json(['erro' => 'o curso informado nao esta cadastrado'], 404);
        }

        //verifica se aluno ja esta cadastrado no curso
        $matricula = Matricula::where('aluno_id', $request->aluno_id)->where('curso_id', $request->curso_id)->first();
        if ($matricula != null) {
            return response()->json(['erro' => 'o aluno ja esta matriculado no curso informado'], 400);
        }

        if (Matricula::create($request->all())) {
            return response()->json(['sucesso' => 'matricula realizada com sucesso'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function show(Matricula $matricula)
    {
        //
        return $matricula;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function edit(Matricula $matricula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matricula $matricula)
    {
        //verifica se id do aluno existe na tabela alunos 
        $aluno = Aluno::find($request->aluno_id);
        if (!$aluno) {
            return response()->json(['erro' => 'o aluno informado nao possui cadastro'], 404);
        }

        //verifica se id do curso existe na tabela cursos 
        $curso = Curso::find($request->curso_id);
        if (!$curso) {
            return response()->json(['erro' => 'o curso informado nao esta cadastrado'], 404);
        }

        //verifica se aluno ja esta cadastrado no curso
        $matricula = Matricula::where('aluno_id', $request->aluno_id)->where('curso_id', $request->curso_id)->first();
        if ($matricula != null) {
            return response()->json(['erro' => 'o aluno ja esta matriculado no curso informado']);
        }

        if ($matricula->update($request->all())) {
            return ['sucesso' => 'dados atualizados com sucesso'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Matricula  $matricula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matricula $matricula)
    {
        //
        if($matricula->delete()){
            return ['sucesso' => 'dados excluídos com sucesso'];
        }
    }
}
