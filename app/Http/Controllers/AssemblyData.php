<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assembly;

class AssemblyData extends Controller
{
    public function __invoke(Request $request)
    {

        $assemblies = Assembly::where('name', 'like', "%$request->term%")->get(['id', 'name', 'district_id']);

        $data = $assemblies->map(function ($assembly) {
            return [
                'text' => sprintf('%s(%s)', $assembly->name, $assembly->district->name),
                'id' => $assembly->id,
            ];

        });

        return response()->json(compact('data'), 200);
    }
}
