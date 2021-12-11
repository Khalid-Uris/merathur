<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\LocationImage;
use Exception;
use Illuminate\Http\Request;

class LocationImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location=Location::all();
        return view('merathar.addLocationImage')->with('location',$location);
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
            'location_id'=>'required',
            'location_image'=>'required'
        ]);

        try {
            $obj=new LocationImage();
            $obj->location_id=$request->location_id;
            $obj->location_image=$request->location_image;
            $obj->save();

        //return $obj;
        return redirect()->route('locationImage.show');

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
        $show=LocationImage::join('locations','locations.location_id','location_images.location_id')->get();
        return view('merathar.showLocationImage')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location=Location::all();
        $edit=LocationImage::where('location_image_id',$id)->first();
        return view('merathar.editLocationImage')->with('edit',$edit)->with('location',$location);
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
            'location_id'=>'required',
            'location_image'=>'required'
        ]);

        try {
            $obj=LocationImage::where('location_image_id',$id)->first();
            $obj->location_id=$request->location_id;
            $obj->location_image=$request->location_image;
            $obj->save();

            //return $obj;
            return redirect()->route('locationImage.show');

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
        $destroy=LocationImage::where('location_image_id',$id)->delete();
        return redirect()->route('locationImage.show');
    }
}
