<?php

namespace App\Http\Controllers;

use App\Models\Musica;
use App\Models\Disco;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class MusicaController extends Controller
{
    public function index()
    {
        try {
            $musicas = Musica::select('musicas.*', 'discos.nome as nome_album')
                ->join('discos', 'musicas.id_album', '=', 'discos.id')
                ->get();

            return response()->json($musicas, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao recuperar músicas'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'duracao' => 'required|integer',
                'id_album' => 'required|exists:discos,id',
            ]);

            $disco = Disco::findOrFail($request->id_album);

            $musica = Musica::create([
                'nome' => $request->nome,
                'duracao' => $request->duracao,
                'id_album' => $request->id_album,
                'nome_album' => $disco->nome,
            ]);

            return response()->json($musica, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Álbum não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar música'], 500);
        }
    }

    public function show($id)
    {
        try {
            $musica = Musica::select('musicas.*', 'discos.nome as nome_album')
                ->join('discos', 'musicas.id_album', '=', 'discos.id')
                ->where('musicas.id', $id)
                ->firstOrFail();

            return response()->json($musica, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Música não encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao recuperar música'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $musica = Musica::findOrFail($id);

            $request->validate([
                'nome' => 'sometimes|required|string|max:255',
                'duracao' => 'sometimes|required|integer',
                'id_album' => 'sometimes|required|exists:discos,id',
            ]);

            $musica->update($request->all());

            if ($request->has('id_album')) {
                $disco = Disco::findOrFail($request->id_album);
                $musica->nome_album = $disco->nome;
                $musica->save();
            }

            return response()->json($musica, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Música ou álbum não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar música'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $musica = Musica::findOrFail($id);
            $musica->delete();

            return response()->json(['message' => 'Música deletada com sucesso.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Música não encontrada'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar música'], 500);
        }
    }
}
