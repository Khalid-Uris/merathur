<?php

namespace App\Http\Controllers;

use App\Models\City;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addCity');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $city = City;
        // return response()->json()
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
            'city_name'=>'required|alpha',
            'history'=>'required',
            'city_image'=>'required'
        ]);

        try {
            $image = $request->file('city_image');
            if(isset($image)){

                $image_name = $image->getClientOriginalName();
                $image_name = str_replace("" ,'_',time().$image_name);
                $image_path = 'upload/CityImages/';

                $image->move($image_path,$image_name);

                $city_image = $image_path.$image_name;
            }else{
                $city_image = null;
            }


            $obj=new City();
            $obj->city_name=$request->city_name;
            $obj->history=$request->history;
            $obj->city_image=$city_image;
            $obj->save();

        //return $obj;
        return redirect()->route('city.show');

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
        $show=City::all();
        return view('merathar.showCity')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=City::where('city_id',$id)->first();
        return view('merathar.editCity')->with('edit',$edit);
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
            'city_name'=>'required|alpha',
            'history'=>'required',
            'city_image'=>'required'
        ]);
        try {
            $image = $request->file('city_image');
            if(isset($image)){

                $image_name = $image->getClientOriginalName();
                $image_name = str_replace("" ,'_',time().$image_name);
                $image_path = 'upload/CityImages/';

                $image->move($image_path,$image_name);

                $city_image = $image_path.$image_name;
            }else{
                $city_image = $request->previous_image;
            }

            $update=City::where('city_id',$id)->first();
            $update->city_name=$request->city_name;
            $update->history=$request->history;
            $update->city_image=$city_image;
            $update->save();

            return redirect()->route('city.show');

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
        $destroy=City::where('city_id',$id)->delete();
        return redirect()->route('city.show');
    }
}
