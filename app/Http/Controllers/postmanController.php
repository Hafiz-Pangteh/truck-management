<?php

namespace App\Http\Controllers;

use App\Models\postman;
use Illuminate\Http\Request;
use App\Models\Truck;

class postmanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postman = postman::with('truck')->get();
        return view('postman.index', compact('postman', $postman));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trucks = Truck::all();
        return view('postman.create')->with(compact('trucks'));
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
            'truck_number',
            'postman_number'=>'required|unique:postmen',
            'postman_name'=>'required'
        ]);
        $postman = postman::create([
            'truck_number' => $request->truck_number,
            'postman_number' => $request->postman_number,
            'postman_name' => $request->postman_name
        ]);
        return redirect('postman');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(postman $postman)
    {
        return view('postman.show', compact('postman',$postman));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(postman $postman)
    {
        $trucks = Truck::all('truck_number');
        return view('postman.edit', compact('postman', $postman))->with('truck_number', $trucks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, postman $postman)
    {
        $request->validate([
            'truck_number',
            'postman_number'=>'required|unique:postmen,postman_id',
            'postman_name'=>'required',
        ]);
        $postman->truck_number =  $request->truck_number;
        $postman->postman_number = $request->postman_number;
        $postman->postman_name = $request->postman_name;
        $postman->save();
        $request->session()->flash('message', 'Sucessfully update postman');
        return redirect('postman');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, postman $postman)
    {
        
        $postman->delete();
        $request->session()->flash('message', 'Sucessfully delete postman');
        return redirect('postman');
    }
}