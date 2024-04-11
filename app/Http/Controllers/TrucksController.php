<?php

namespace App\Http\Controllers;

use App\models\Trucks;
use Illuminate\Http\Request;

class TrucksController extends Controller
{
    public function createTruck(Request $request){
        $request->validate([
            "truck_name" => "required",
            "driver_id" => "required"
        ]);

        $truck = Trucks::create([
            'truck_name' => $request->truck_name,
            'driver_id' => $request->driver_id,
        ]);

        return response()->json($truck);
    }
     public function readAllTrucks(){
        // $trucks = Trucks::all();
        $trucks = Trucks::join('drivers', 'trucks.driver_id', '=', 'drivers.id')->select('trucks.*','drivers.driver_name as driver_name')->get();
        if(!$trucks){
            return response()->json("No Truck Was found");
        }
        else {
            return response()->json($trucks);
        }
     }

     public function readTruck($id){
        try{
            $truck = Trucks::findOrFail($id);
            if ($truck){
                return response ()->json($truck);
            }
            else{
                 return response()->json("No Truck was found with truck ID:",$id);
            }
                
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Truck Does not exist with such an ID'
            ],400);
        }
            
    }

    public function updateTruck ($id, Request $request){
        try{
            $request ->validate([
                "truck_name" =>"required",
                "driver_id" => "required"

            ]);
            $truck = Trucks::findOrFail($id);
            if ($truck){
                $truck -> truck_name = $request->truck_name;
                $truck -> driver_id = $request->driver_id;
                $truck->save();
                return response ()->json($truck);
            }
            else{
                 return response()->json("No Truck was found with truck ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to update record'
            ],400);
        }
    }

    public function deleteTruck ($id){
        try{
            $truck = Trucks::findOrFail($id);
            if ($truck){
                Trucks::destroy($id);
                return response()->json('Reccord has been successfully deleted');
            }
            else{
                return response()->json("No Truck was found with truck ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to delete record'
            ],400);
        }
        
    }
}
