<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Excity;
use Response,
	DB;

class ExcitiesController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /excities
	 *
	 * @return Response
	 */
	public function index()
	{
		$excity=DB::table('ex_cities')->where('id', 'like', '__0000')->get();
		return $excity;
	}
	
	
	//Province City District
	public function province()
	{
		$excity=DB::table('ex_cities')->where('id', 'like', '__0000')->get();
		return Response::json($excity);
	}
	public function city($id)
	{
		$excity=DB::table('ex_cities')->where('id', 'like', substr ($id, 0,2).'__00')->skip(1)->take(1000)->get();
		return Response::json($excity);
	}
	public function district($id)
	{
		$excity=DB::table('ex_cities')->where('id', 'like', substr ($id, 0,4).'__')->skip(1)->take(1000)->get();
		return Response::json($excity);
	}
	/**
	 * Show the form for creating a new resource.
	 * GET /excities/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /excities
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /excities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$excity=Excity::find($id);
		return $excity;
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /excities/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /excities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /excities/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}