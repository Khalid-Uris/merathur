<?php

namespace App\Http\Controllers;

use App\Models\Resturant;
use App\Models\ResturantImage;
use Exception;
use Illuminate\Http\Request;

class ResturantImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resturant=Resturant::all();
        return view('merathar.addResturantImage')->with('resturant',$resturant);
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
            'dish_id'=>'required',
            'resturant_image'=>'required|image'
        ]);
        try {
            $obj=new ResturantImage();
        $obj->dish_id=$request->dish_id;
        $obj->resturant_image=$request->resturant_image;
        $obj->save();

        //return $obj;
        return redirect()->route('resturantImage.show');

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
        $show=ResturantImage::join('resturants','resturants.dish_id','resturant_images.dish_id')->get();
        return view('merathar.showResturantImage')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resturant=Resturant::all();
        $edit=ResturantImage::where('resturant_image_id',$id)->first();
        return view('merathar.editResturantImage')->with('edit',$edit)->with('resturant',$resturant);
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
            'dish_id'=>'required',
            'resturant_image'=>'required|image'
        ]);
        try {
            $obj=ResturantImage::where('resturant_image_id',$id)->first();
        $obj->dish_id=$request->dish_id;
        $obj->resturant_image=$request->resturant_image;
        $obj->save();

        //return $obj;
        return redirect()->route('resturantImage.show');

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
        $destroy=ResturantImage::where('resturant_image_id',$id)->delete();
        return redirect()->route('resturantImage.show');
    }
}
