<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Message,
    App\News,
    App\User,
    App\Type;
use Input,
    Auth,
    Mail;
class MessagesController extends Controller
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
        $input = Input::all();
        $msg = new Message();
        $msg->fill($input);
        if(Auth::check()){
            $msg->user_id = Auth::id();
        }else{
            $msg->user_id = 1;
        }
        $msg->save();
        /*
        *寻一下-信息邮件提示
        */
        $new_id = $input['new_id'];
        $new = News::find($input['new_id']);
        $user = User::find($new->user_id);
        $type = Type::find($new->type_id);
        //如果信息联系邮件c_email不为空或者用户为注册用户
        if($new->c_email||$new->user_id != 1){
            Mail::send('emails.replay', ['new' => $new,'user' => $user,'type' => $type], function($message) use($new,$user)
            {
                if($new->c_email){
                    $email = $new->c_email;   
                }else{
                    $email = $user->email;
                }
                $name = $new->c_name;
                $message->to($email, $new->c_name)->subject('寻一下-信息回复提示');
            });
        }       
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
}
