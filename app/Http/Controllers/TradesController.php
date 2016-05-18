<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News,
    App\Type,
    App\TradesRecord;
use DB,
    Auth,
    Input,
    View,
    Response;
class TradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
        $propose_id = Auth::id();
        $data = Input::all();
        $result = TradesRecord::whereRaw('propose_id = ? and new_id = ?',[Auth::id(),Input::get('new_id')])->get()->toArray();
        //$result = DB::table('tradesRecord')->where('propose_id','=',Auth::id())->where('new_id','=',Input::get('new_id'))->get();
        if($result){
            $response = array('status'=>2,'msg'=>'您已经提醒过了！');
        }else{
            $tradesRecord = new TradesRecord;
            $tradesRecord->fill($data);
            $tradesRecord->propose_id = $propose_id;
            $tradesRecord->state = 1;
            $tradesRecord->save();
            $response = array('status'=>1,'msg'=>'发送提醒成功！');           
        }
        return Response::json($response);
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
    //提醒
    public function remindPoster(){
        if(Auth::check()){
            $user = Auth::user();
            $new_id = Input::get('id');
            $receive_id = News::find($new_id)->first()->user_id;
            return View::make('trades.contact',['user' => $user,'new_id' => $new_id,'receive_id' => $receive_id]);
        }else{
            return null;
        }
    }
    public function receive(){
        //return 123;
        $user = Auth::user();
        $receive_id = $user->id;
        $trades = TradesRecord::where('receive_id',$receive_id)->get();
        foreach ($trades as $key => &$trade) {
            $new = News::find($trade->new_id);
            $new->type_id = Type::find($new->type_id)->first()->type;
            $trade->new = $new;//添加new

        }
        $rewardAll = News::getReward($user->id);
        return View::make('trades.receive',['trades'=>$trades,'rewardAll'=>$rewardAll]);
    }

}
