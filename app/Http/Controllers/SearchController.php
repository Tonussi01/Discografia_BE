<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Musica;
use App\Models\Disco;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Obtém a consulta de busca do request
        $query = $request->input('query');

        // Realiza a busca nas músicas e álbuns
        $musicas = Musica::where('nome', 'like', "%$query%")->get();
        $disco = Disco::where('nome', 'like', "%$query%")->get();

        // Retorna os resultados como JSON
        return response()->json([
            'musicas' => $musicas,
            'disco' => $disco
        ]);
    }
}
