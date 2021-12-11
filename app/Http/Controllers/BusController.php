<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Exception;
use Illuminate\Http\Request;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addBus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'bus_name'=>'required|alpha',
            'timing'=>'required|timezone',
            'location'=>'required',
            'bus_image'=>'required|image'
        ]);
        try {
            $obj=new Bus();
            $obj->bus_name=$request->bus_name;
            $obj->timing=$request->timing;
            $obj->location=$request->location;
            $obj->bus_image=$request->bus_image;
            $obj->save();

            //return $obj;
            return redirect()->route('bus.show');

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $show=Bus::all();
        return view('merathar.showBus')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Bus::where('bus_id',$id)->first();
        return view('merathar.editBus')->with('edit',$edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_name'=>'required|alpha',
            'timing'=>'required|timezone',
            'location'=>'required',
            'bus_image'=>'required|image'
        ]);
        try {
            $obj=Bus::where('bus_id',$id)->first();
            $obj->bus_name=$request->bus_name;
            $obj->timing=$request->timing;
            $obj->location=$request->location;
            $obj->bus_image=$request->bus_image;
            $obj->save();

            //return $obj;
            return redirect()->route('bus.show');

        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy=Bus::where('bus_id',$id)->delete();
        return redirect()->route('bus.show');
    }
}
