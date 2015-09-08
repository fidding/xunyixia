<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App;
use View,
    Excel;

class HomesController extends Controller
{
    public function __construct(){
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        return View::make('home',array('navsub'=>'0'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
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
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
    /*
    *主页
    */
    public function getHome(){
        return View::make('home',array('navsub'=>'0'));
    }
    /*
    *寻物启事
    */
    public function getSeeksth(){
        
    } 
    /*
    *失物招领
    */   
    public function getLoststh(){
        
    }  
    /*
    *寻人启事
    */  
    public function getPeople(){

    }
    /*
    *寻宠启事
    */
    public function getPet(){

    }  
}
