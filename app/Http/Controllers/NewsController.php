<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News,
    App\User,
    App\Photo,
    App\Excity,
    App\Message;
use Auth,
    View,
    Input,
    Session,
    Response;

class NewsController extends Controller
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
        return View::make('issue',array('navsub'=>'1'));
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
        $input = Input::except('image');
        $images = Input::file('image');
        $input['time'] = strtotime($input['time']);
        $new = new News();
        $new->fill($input);
        if(Auth::check()){
           $new->user_id = Auth::id();
        }else{
            $new->user_id = 1;//游客
        }
        $new->save();
        if($images){
            if($images[0] == null){
                $response=array('status'=>0,'message'=>'请选择正确的格式文件');
                return Response::json($response);
            }
            else{
                foreach($images as $image){
                    $fileSize = $image->getSize();
                    $entension = $image->getClientOriginalExtension(); //上传文件的后缀.
            
                    if($fileSize>20971520){
                        $response=array('status'=>0,'message'=>'请上传小于20M的文件');
                        return Response::json($response);
                        //return "<script language='javascript'>parent.UploadCallback('" . json_encode(array('status'=>0,'message'=>'请上传小于20M的文件')) . "')</script>";
                    }
                   if($fileSize>4000000){
                        $response=array('status'=>0,'message'=>'请上传小于4M的文件');
                        return Response::json($response);
                    }
                    $clientName = $image -> getClientOriginalName();//源文件名
                    $tmpName = $image ->getFileName(); // 缓存在tmp文件夹中的文件名 
                    $realPath = $image -> getRealPath();    //这个表示的是缓存在tmp文件夹下的文件的绝对路径
                    $newName = md5_file($realPath).'.'.$entension;
                    $path = $image -> move(storage_path('newphoto').'/'.$entension,$newName);
                    $photo = new Photo();
                    $photo->new_id = $new->id;
                    $photo->filename = '/'.$entension.'/'.$newName;
                    $photo->oldname = $clientName;
                    $photo->save();  
                }                
            }
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
        
        //获取数据
        $new = News::find($id);
        //阅读次数+1
        $new->click = $new->click+1;
        $new->save();
        $navsub = $new->type_id+1;
        $new->type_id = $new->type()->first()->type;
        $new->time = date('Y-m-d',$new->time);//将时间戳转为日期格式        
        $user = $new->user()->first();
        //获取图片
        $photo = Photo::where('new_id',$new->id)->get()->toArray();
        //获取回复
        $msg = Message::where('new_id',$new->id)->get()->toArray();
        if(count($msg)){
            foreach ($msg as $key => &$m) {
                $m['user_id'] = User::find($m['user_id'])->first()->name;
            }
        }
        return View::make('news.new',['new'=>$new,'user'=>$user,'photo'=>$photo,'msg'=>$msg,'navsub'=>$navsub]);
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
    //获取指定type的信息数据
    public function desnew($type){
        $news = News::where('type_id',$type)->paginate(6);
        foreach($news as &$new){
            $new->user_id = User::where('id',$new->user_id)->first()->name;
            $new->addresscode = Excity::where('id',$new->addresscode)->first()->city;
            $msg_count = Message::where('new_id',$new->id)->count();
            $new->msg_count = $msg_count;
        }
        return $news;  
    }
    public function seeksth(){
        $news = $this->desnew(1);
        return View::make('news.desnew',['news'=>$news,'type'=>'寻物启事','navsub'=>2]);
    }

    public function loststh(){
        $news = $this->desnew(2);
        return View::make('news.desnew',['news'=>$news,'type'=>'失物招领','navsub'=>3]);
    }
    public function people(){
        $news = $this->desnew(3);
        return View::make('news.desnew',['news'=>$news,'type'=>'寻人启事','navsub'=>4]);
    }
    public function pet(){
        $news = $this->desnew(4);
        return View::make('news.desnew',['news'=>$news,'type'=>'寻宠启事','navsub'=>5]);
    }

}
