<?php

namespace App\Http\Controllers;
use App\models\Areas;

use Illuminate\Http\Request;

class AreasController extends Controller
{
    public function createArea(Request $request){
        $request->validate([
            "area_name" => "required",
            "charges" => "required"
        ]);

        $area = Areas::create([
            'area_name' => $request->area_name,
            'charges' => $request->charges,
            'description' => $request->description,
        ]);

        return response()->json($area);
    }
     public function readAllAreas(){
        $areas = Areas::all();
        if(!$areas){
            return response()->json("No Area Was found");
        }
        else {
            return response()->json($areas);
        }
     }

     public function readArea($id){
        try{
            $area = Areas::findOrFail($id);
            if ($area){
                return response ()->json($area);
            }
            else{
                 return response()->json("No Area was found with area ID:",$id);
            }
                
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Area Does not exist with such an ID'
            ],400);
        }
            
    }

    public function updateArea ($id, Request $request){
        try{
            $request ->validate([
                "area_name" =>"required",
                "charges" => "required"

            ]);
            $area = Areas::findOrFail($id);
            if ($area){
                $area -> area_name = $request->area_name;
                $area -> charges = $request->charges;
                $area -> description = $request->description;
                $area->save();
                return response ()->json($area);
            }
            else{
                 return response()->json("No Area was found with area ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to update record'
            ],400);
        }
    }

    public function deleteArea ($id){
        try{
            $area = Areas::findOrFail($id);
            if ($area){
                Areas::destroy($id);
                return response()->json('Reccord has been successfully deleted');
            }
            else{
                return response()->json("No Area was found with area ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to delete record'
            ],400);
        }
        
    }


}