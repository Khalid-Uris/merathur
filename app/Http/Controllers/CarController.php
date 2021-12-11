<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Exception;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addCar');
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
        // $request->validate([
        //     'car_model'=>'required',
        //     'driver_experience'=>'required',
        //     'contact_number'=>'required|numeric',
        //     'driver_name'=>'required|alpha',
        //     'car_image'=>'required|image',
        //     'driver_image'=>'required|image'
        // ]);
        try {

            $image = $request->file('car_image');
            if(isset($image)){

                $image_name = $image->getClientOriginalName();
                $image_name = str_replace("" ,'_',time().$image_name);
                $image_path = 'upload/CarImages/';

                $image->move($image_path,$image_name);

                $car_image = $image_path.$image_name;
            }else{
                $car_image = null;
            }

           // return response()->json($car_image);


        $obj=new Car();
        $obj->car_model=$request->car_model;
        $obj->driver_experience=$request->driver_experience;
        $obj->contact_number=$request->contact_number;
        $obj->driver_name=$request->driver_name;
        $obj->car_image=$car_image;
        $obj->driver_image=$request->driver_image;
        $obj->save();

        //return $obj;
        return redirect()->route('car.show');

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
        $show=Car::all();
        return view('merathar.showCar')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Car::where('car_id',$id)->first();
        return view('merathar.editCar')->with('edit',$edit);
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
        // $request->validate([
        //     'car_model'=>'required',
        //     'driver_experience'=>'required',
        //     'contact_number'=>'required|numeric',
        //     'driver_name'=>'required|alpha',
        // ]);
        try {

            $image = $request->file('car_image');
            if(isset($image)){

                $image_name = $image->getClientOriginalName();
                $image_name = str_replace("" ,'_',time().$image_name);
                $image_path = 'upload/CarImages/';

                $image->move($image_path,$image_name);

                $car_image = $image_path.$image_name;
            }else{
                $car_image = $request->previous_image;
            }

        $obj=Car::where('car_id',$id)->first();
        $obj->car_model=$request->car_model;
        $obj->driver_experience=$request->driver_experience;
        $obj->contact_number=$request->contact_number;
        $obj->driver_name=$request->driver_name;
        $obj->car_image=$car_image;
        $obj->driver_image=$request->driver_image;
        $obj->save();

        //return $obj;
        return redirect()->route('car.show');

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
        $edit=Car::where('car_id',$id)->delete();
        return redirect()->route('car.show');
    }
}
