<?php

namespace App\Http\Controllers;

use App\Aluno;
use App\Matricula;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('nome')) {
            $aluno = Aluno::where('nome', $request->nome)->get();
            $res = ($aluno != null ? $aluno : response()->json(['erro' => 'aluno nao encontrado'], 404));
            return $res;
        }
        if ($request->has('email')) {
            $aluno = Aluno::where('email', $request->email)->get();
            $res = ($aluno != null ? $aluno : response()->json(['erro' => 'aluno nao encontrado'], 404));
            return $res;
        }
        return Aluno::all();
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
        //
        if (Aluno::create($request->all())) {
            return response()->json(['sucesso' => 'aluno registrado com sucesso'], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function show(Aluno $aluno)
    {
        //
        return $aluno;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function edit(Aluno $aluno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aluno $aluno)
    {
        //
        if ($aluno->update($request->all())) {
            return ['sucesso' => 'dados do aluno atualizados com sucesso'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Aluno  $aluno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aluno $aluno)
    {
        //
        if ($aluno->delete()) {
            return ['sucesso' => 'dados excluídos com sucesso'];
        }
    }
}
