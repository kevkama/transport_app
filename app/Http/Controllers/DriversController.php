<?php

namespace App\Http\Controllers;

use App\models\Drivers;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function createDriver(Request $request){
        $request->validate([
            "driver_name" => "required",
            "driver_email" => "required"
        ]);

        $driver = Drivers::create([
            'driver_name' => $request->driver_name,
            'driver_email' => $request->driver_email,
        ]);

        return response()->json($driver);
    }
     public function readAllDrivers(){
        $drivers = Drivers::all();
        if(!$drivers){
            return response()->json("No Driver Was found");
        }
        else {
            return response()->json($drivers);
        }
     }

     public function readDriver($id){
        try{
            $driver = Drivers::findOrFail($id);
            if ($driver){
                return response ()->json($driver);
            }
            else{
                 return response()->json("No Driver was found with driver ID:",$id);
            }
                
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Driver Does not exist with such an ID'
            ],400);
        }
            
    }

    public function updateDriver ($id, Request $request){
        try{
            $request ->validate([
                "driver_name" =>"required",
                "driver_email" => "required"

            ]);
            $driver = Drivers::findOrFail($id);
            if ($driver){
                $driver -> driver_name = $request->driver_name;
                $driver -> driver_email = $request->driver_email;
                $driver->save();
                return response ()->json($driver);
            }
            else{
                 return response()->json("No Driver was found with driver ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to update record'
            ],400);
        }
    }

    public function deleteDriver ($id){
        try{
            $driver = Drivers::findOrFail($id);
            if ($driver){
                Drivers::destroy($id);
                return response()->json('Reccord has been successfully deleted');
            }
            else{
                return response()->json("No Driver was found with driver ID:",$id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error' => 'Unable to delete record'
            ],400);
        }
        
    }


}

