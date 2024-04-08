<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function createArea(Request $request){
        $request->validate([
            "area_name" => "required"
        ]);

        $area = Areas::create([
            'area_name' => $request->area_name,
            'description' => $request->description,
        ]);

        return response()->json($area);
    }
}
