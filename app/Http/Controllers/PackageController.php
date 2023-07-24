<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use App\Models\Truck;

const PACKAGE = '/package';

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::paginate(5);
        return view('package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = Truck::all();
        return view('package.create')->with(compact('trucks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate
        $request->validate([
            'truck_number',
            'package_number' => 'required|unique:packages',
            'receiver_name' => 'required',
            'destination' => 'required'
        ]);
        $packages = new Package([
            'truck_number' => $request->truck_number,
            'package_number' => $request->package_number,
            'receiver_name' => $request->receiver_name,
            'destination' => $request->destination
        ]);
        $packages->save();
        return redirect(PACKAGE)->with('success', 'Package Details Saved!');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show($package_id)
    {
        $packages = Package::find($package_id);
        return view('package.show', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit($package_id)
    {
        $trucks = Truck::all();
        $packages = Package::find($package_id);
        return view('package.edit', compact('packages'))->with(compact('trucks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $package_id)
    {
        //validate
        $request->validate([
            'truck_number',
            'package_number' => 'required|unique:packages,package_id',
            'receiver_name' => 'required',
            'destination' => 'required'
        ]);
        $packages = Package::find($package_id);
        $packages->truck_number = $request->get('truck_number');
        $packages->package_number = $request->get('package_number');
        $packages->receiver_name = $request->get('receiver_name');
        $packages->destination = $request->get('destination');
        $packages->save();
        return redirect(PACKAGE)->with('success', 'Package Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy($package_id)
    {
        $packages = Package::find($package_id);
        $packages->delete();
        return redirect(PACKAGE)->with('success', 'Package Deleted!');
    }
}