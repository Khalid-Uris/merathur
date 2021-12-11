<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Exception;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel=Hotel::all();
        return view('merathar.addRoom')->with('hotel',$hotel);
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
            'hotel_id'=>'required',
            'title'=>'required',
            'room_rent'=>'required|numeric',
            'contact_number'=>'required|numeric',
            'location'=>'required',
            'room_image'=>'required|image'
        ]);
        try {
            $obj=new Room();
            $obj->hotel_id=$request->hotel_id;
            $obj->title=$request->title;
            $obj->room_rent=$request->room_rent;
            $obj->contact_number=$request->contact_number;
            $obj->location=$request->location;
            $obj->room_image=$request->room_image;
            $obj->save();

            // return $obj;
            return redirect()->route('room.show');

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
        $show=Room::join('hotels','hotels.hotel_id','rooms.hotel_id')->get();
        return view('merathar.showRoom')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hotel=Hotel::all();
        $edit=Room::where('room_id',$id)->first();
        return view('merathar.editRoom')->with('edit',$edit)->with('hotel',$hotel);
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
            'hotel_id'=>'required',
            'title'=>'required',
            'room_rent'=>'required|numeric',
            'contact_number'=>'required|numeric',
            'location'=>'required',
            'room_image'=>'required|image'
        ]);
        try {
            $obj=Room::where('room_id',$id)->first();
        $obj->hotel_id=$request->hotel_id;
        $obj->title=$request->title;
        $obj->room_rent=$request->room_rent;
        $obj->contact_number=$request->contact_number;
        $obj->location=$request->location;
        $obj->room_image=$request->room_image;
        $obj->save();

        // return $obj;
        return redirect()->route('room.show');
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
        $destroy=Room::where('room_id',$id)->delete();
        return redirect()->route('room.show');
    }
}
