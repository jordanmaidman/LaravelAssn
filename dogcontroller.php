<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\dogs;

class dogcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dog = DB::table('dogs')->get();
	return json_encode($dog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create(Request $request)
/*    {
 	//$dog = new dog;
	//$dog->name = Input::get('name');
	$dog->breed = Input::get('breed');
	$dog->weight = Input::get('weight');
	$dog ->save();
	return json_econde($dog);
	  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	$dog=$request->all();
	$dog=dogs::create($dog);
	//$dog = new dog;
	return json_encode(array($dog));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $dog=dogs::find($id);
	return json_encode(array($dog));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*   public function update(Request $request, $id)
    {
        $data = dogs::find($id);
	$dog = $request->all();
	$data->fill($input)->save();
	return json encode(array($data)); 
	
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dog=dogs::find($id);
	$dog->delete(); 
   	return json_encode($dog);
	 }

    public function  updateDog ($id, Request $request) 
	{
	$data=dogs::find($id);
	$input = $request->all();
	$data->fill($input)->save();
	return json_encode(array($data));
	}
}
   
