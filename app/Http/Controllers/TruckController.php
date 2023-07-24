<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Models\Truck;
use App\Models\Package;
use App\Models\postman;

const TRUCK = '/truck';

class TruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucks = Truck::paginate(5);
        $packages = Package::all('package_number');
        $postmen = postman::all('postman_name');
        return view('truck.index', compact('trucks'))->with('package_number', $packages)->with('postman_name', $postmen);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $postmen = postman::all();
        return view('truck.create')->with(compact('postmen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'truck_number'=>'required|unique:trucks',
            'postman_name',
            'date_of_operation'=>'required',
        ]);
        $trucks = new Truck([
            'truck_number' => $request->get('truck_number'),
            'postman_name' => $request->get('postman_name'),
            'date_of_operation' => $request->get('date_of_operation')
        ]);
        $trucks->save();
        return redirect(TRUCK)->with('success', 'Truck Details Saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($truck_id)
    {
        $trucks = Truck::find($truck_id);
        $packages = Package::all('package_number');
        $postmen = postman::where('truck_number', $trucks->truck_number)->get();
        return view('truck.show', compact('trucks'))->with('package_number', $packages)->with(compact('postmen'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($truck_id)
    {
        $trucks = Truck::find($truck_id);
        $postmen = postman::all();
        return view('truck.edit', compact('trucks'))->with(compact('postmen'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $truck_id)
    {
        $request->validate([
            'truck_number'=>'required|unique:trucks,truck_id',
            'postman_name',
            'date_of_operation'=>'required'
        ]);
        $trucks = Truck::find($truck_id);
        $trucks->truck_number =  $request->get('truck_number');
        $trucks->postman_name = $request->get('postman_name');
        $trucks->date_of_operation = $request->get('date_of_operation');
        $trucks->save();
        return redirect(TRUCK)->with('success', 'Truck Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($truck_id)
    {
        $trucks = Truck::find($truck_id);
        $trucks->delete();
        return redirect(TRUCK)->with('success', 'Truck Deleted!');
    }
}