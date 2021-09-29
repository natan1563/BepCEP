<?php

namespace App\Http\Controllers;

use App\Models\Cep;
use Exception;
use Illuminate\Http\Request;

class CepController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'cep'       => 'required',
                'localidade'=> 'required',
                'bairro'    => 'required',
                'logradouro'=> 'required',
                'uf'        => 'required'
            ]);

            if (!is_null(Cep::find($request->all()['cep']))) return response()  ->json(['message' => 'Cep já registrado'], 412);

            Cep::Create($request->all());
            return response()->json(['message' => 'Criado com sucesso'], 201);
        }catch (Exception $e) {;
            return response()->json(['message' => 'Falha ao criar'], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $endereco = Cep::FindOrFail($id);
            return response()->json(['data' => $endereco]);
        }catch (Exception $e) {
            return response()->json(['message' => 'Não encontrado'], 404);
        }
    }
}
