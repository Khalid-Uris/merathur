<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;
use Exception;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $city=City::all();
        return view('merathar.addLocation')->with('city',$city);
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
            'city_id'=>'required',
            'location_name'=>'required'
        ]);
        try {
            $obj=new Location();
            $obj->city_id=$request->city_id;
            $obj->location_name=$request->location_name;
            $obj->save();

            //return $obj;
            return redirect()->route('location.show');
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
        $show=Location::join('city','city.city_id','locations.city_id')->get();
        return view('merathar.showLocation')->with('show',$show);
        // $getDataloan=add_loan::join('borrowers','borrowers.borrower_id','add_loans.borrower_id')
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city=City::all();
        $edit=Location::where('location_id',$id)->first();
        return view('merathar.editLocation')->with('edit',$edit)->with('city',$city);
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
            'city_id'=>'required',
            'location_name'=>'required|alpha'
        ]);
        try {
            $obj=Location::where('location_id',$id)->first();
        $obj->city_id=$request->city_id;
        $obj->location_name=$request->location_name;
        $obj->save();

        return redirect()->route('location.show');
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
        $destroy=Location::where('location_id',$id)->delete();
        return redirect()->route('location.show');
    }
}
