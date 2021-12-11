<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Location;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getCities()
    {
       $data = City::all();
       return response()->json(['data' => $data] , 200);
    }

    public function addCity(Request $request)
    {

        //return response()->json($request->city_name);
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

            return response()->json(['city' => $obj],200);
    }
    public function editCity($id)
    {
        // $edit=City::where('city_id',$id)->first();
        $edit=City::find($id);
        return response()->json(['edit'=>$edit],200);
    }

    public function update(Request $request,$id)
    {
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

            return response()->json(['update',$update],200);
    }
    public function destroy($id)
    {
        $destroy=City::where('city_id',$id)->delete();
        return response()->json(['destroy',$destroy]);
    }

    public function getLocation()
    {
        $getLocation=Location::join('city','city.city_id','locations.city_id')
        ->select('city.city_name','locations.location_name')->get();
        return response()->json(['getLocation'=>$getLocation],200);
    }
    public function storeLocation(Request $request)
    {
        $obj=new Location();
        $obj->city_id=$request->city_id;
        $obj->location_name=$request->location_name;
        $obj->save();

        return response()->json(['location'=>$obj],200);
    }
    public function editLocation($id)
    {
        $city=City::all();
        $edit=Location::where('location_id',$id)->first();
        //return response()->json([''])
    }
}
