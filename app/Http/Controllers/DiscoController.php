<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;

class DiscoController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Disco::all(), 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao recuperar discos'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nome' => 'required|string|max:255',
                'descricao' => 'nullable|string',
            ]);

            $disco = Disco::create($request->all());
            return response()->json($disco, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao criar disco'], 500);
        }
    }

    public function show($id)
    {
        try {
            $disco = Disco::findOrFail($id);
            return response()->json($disco, 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Disco não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao recuperar disco'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nome' => 'sometimes|required|string|max:255',
                'descricao' => 'sometimes|nullable|string',
            ]);

            $disco = Disco::findOrFail($id);
            $disco->update($request->all());

            return response()->json($disco, 200);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Disco não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao atualizar disco'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $disco = Disco::findOrFail($id);
            $disco->delete();

            return response()->json(['message' => 'Disco deletado com sucesso.'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Disco não encontrado'], 404);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao deletar disco'], 500);
        }
    }
}
