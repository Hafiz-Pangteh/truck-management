<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Truck;
use App\Models\Package;
use App\Models\postman;
use DB;
const TRUCK = '/truck';

class Detailcontroller extends Controller
{
    public function show($truck_id)
    {
        $trucks = Truck::find($truck_id);
        $packages = Package::where('truck_number', $trucks->truck_number)->get();
       // dd($packages); 
        
            if(!$packages){
                abort(401);
            }


       // return view('truck.detail', ['Package' => $packages]);

        return view('truck.detail', compact('packages'))->with(compact('trucks'));
    }
}
