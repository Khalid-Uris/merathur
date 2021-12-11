<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Exception;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addHotel');
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
            'hotel_name'=>'required',
            'hotel_image'=>'required|image',
            'rating'=>'required|numeric'
        ]);
        try {
            $obj=new Hotel();
            $obj->hotel_name=$request->hotel_name;
            $obj->hotel_image=$request->hotel_image;
            $obj->rating=$request->rating;
            $obj->save();

        return redirect()->route('hotel.show');

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
        $show=Hotel::all();
        return view('merathar.showHotel')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Hotel::where('hotel_id',$id)->first();
        return view('merathar.editHotel')->with('edit',$edit);
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
            'hotel_name'=>'required',
            'hotel_image'=>'required|image',
            'rating'=>'required|numeric'
        ]);

        try {
            $obj=Hotel::where('hotel_id',$id)->first();
        $obj->hotel_name=$request->hotel_name;
        $obj->hotel_image=$request->hotel_image;
        $obj->rating=$request->rating;
        $obj->save();

        return redirect()->route('hotel.show');

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
        $destroy=Hotel::where('hotel_id',$id)->delete();
        return redirect()->route('hotel.show');
    }
}
