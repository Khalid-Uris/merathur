<?php

namespace App\Http\Controllers;

use App\Models\Resturant;
use Exception;
use Illuminate\Http\Request;

class ResturantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addResturant');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'dish_name'=>'required|alpha',
            'history'=>'required',
            'contact_number'=>'required|numeric'
        ]);
        try {
            $obj=new Resturant();
            $obj->dish_name=$request->dish_name;
            $obj->history=$request->history;
            $obj->contact_number=$request->contact_number;
            $obj->save();

            //return $obj;
            return redirect()->route('resturant.show');

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
        $show=Resturant::all();
        return view('merathar.showResturant')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Resturant::where('dish_id',$id)->first();
        return view('merathar.editResturant')->with('edit',$edit);
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
            'dish_name'=>'required|alpha',
            'history'=>'required',
            'contact_number'=>'required|numeric'
        ]);
        try {
            $obj=Resturant::where('dish_id',$id)->first();
        $obj->dish_name=$request->dish_name;
        $obj->history=$request->history;
        $obj->contact_number=$request->contact_number;
        $obj->save();

        //return $obj;
        return redirect()->route('resturant.show');

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
        $destroy=Resturant::where('dish_id',$id)->delete();
        return redirect()->route('resturant.show');
    }
}
