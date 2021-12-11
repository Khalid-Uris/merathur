<?php

namespace App\Http\Controllers;

use App\Models\Culture;
use Exception;
use Illuminate\Http\Request;

class CultureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merathar.addCulture');
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
            'culture'=>'required'
        ]);
        try {
            $obj=new Culture();
        $obj->culture=$request->culture;
        $obj->save();

        //return $obj;
        return redirect()->route('culture.show');

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
        $show=Culture::all();
        return view('merathar.showCulture')->with('show',$show);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit=Culture::where('culture_id',$id)->first();
        return view('merathar.editCulture')->with('edit',$edit);
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
            'culture'=>'required'
        ]);
        try {
            $obj=Culture::where('culture_id',$id)->first();
        $obj->culture=$request->culture;
        $obj->save();

        //return $obj;
        return redirect()->route('culture.show');

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
        $destroy=Culture::where('culture_id',$id)->delete();
        return redirect()->route('culture.show');
    }
}
