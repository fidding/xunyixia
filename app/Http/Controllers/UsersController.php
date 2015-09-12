<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User,
    App\Excity,
    App\Message,
    App\Project;
use View,
    Response,
    Validator,
    Input,
    Mail,
    Session,
    DB,
    Redirect,
    Hash,
    Auth;

class UsersController extends Controller
{
    public function __construct()
    {
    }
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
        return View::make('users.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $input=Input::all();
        $user=new User();
        $user->fill($input);
        $user->email=$input['email'];
        $user->password=$input['password'];
        if($user->isValid()){
            
            $user->password=Hash::make($input['password']);
            $user->save();
            Auth::login($user);//手动登入用户
            
            //添加系统恢复消息
            $msg=new Message();
            $msg->user_id=$user->id;
            $msg->from='0';
            $msg->to=$user->id;
            $msg->content='感谢您的注册，基蓝云矿山欢迎您！';
            $msg->save();       
            //demo创建
            $path=app_path('default/').'demo-default.json';
            $contents=json_decode(file_get_contents($path),true);//将文件内容输出为字符串，并转为数组    
            $config=json_encode($contents['config']);//将数组转为对象
            $data=$contents['data'];
            $project=new Project();
            $project->name='模拟项目';
            $project->description='模拟项目';
            $project->user_id = $user->id;
            $project->config=$config;
            $project->save();
            if($data!=null){
                $project->decodedata($data);
            }
            return Redirect::to('projects');
        }else{
            //return $user->errors;
            return Redirect::to('register')->withInput()->withErrors($user->errors);
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
    public function edit()
    {
        return View::make('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        //
        $input = Input::all();
        $excity = Excity::where('id',$input['addresscode'])->get();
        if($excity){
            $user = User::find(Auth::id());
            $user->fill($input);
            $user->save();
            return Redirect::back()->with('msg', '修改成功');
        }else{
            return Redirect::back()->withInput()->withErrors('地址信息错误');
        }
        
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
    public function login()
    {
        return View::make('users.login',array('navsub'=>'-1'));
    }

    public  function info()
    {
        $user = Auth::user();
        $user->addresscode = Excity::where('id',$user->addresscode)->first()->city;
        return View::make('users.info',['user'=>$user,'navsub'=>1]);
        
    }
    
    public function password()
    {
        return View::make('users.password',array('navsub'=>'2'));
    }
    
    public function updatePwd()
    {
        $input=Input::only('password','new_password','password_confirmation');
        $password=$input['password'];
        $new_password=$input['new_password'];
        $password_confirmation=$input['password_confirmation'];
        if($new_password!=$password_confirmation)
            return Redirect::back()->with('msg', '两次输入密码不同！');
            $id = Auth::id();
            $user = User::find($id);
            if (Hash::check($password,$user['password'] ))
            {
                $user->password=Hash::make($new_password);
                $user->save();
                return Redirect::back()->with('msg', '修改成功！');
            }
            else
            {
                return Redirect::back()->with('msg', '原密码不正确！');
            }
    }
    
    public function test()
    {
        return View::make('test');
    }
}
