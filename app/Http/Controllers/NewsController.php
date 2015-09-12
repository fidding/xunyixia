<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\News,
    App\User,
    App\Type,
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
        //获取最新信息
        $lastNews = News::lastNews();
        return View::make('news.issue',['lastNews'=>$lastNews,'navsub'=>'1']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Requests\StoreNewRequest $request)
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
        //将时间戳转为日期格式
        $new->time = date('Y-m-d',$new->time);
        //将地址编码号转为地址
        $new->addresscode =  Excity::where('id',$new->addresscode)->first()->city;
        if($new->isfind)
        $new->isfind = '已寻回';
        else
        $new->isfind = '寻找中';
        $user = $new->user()->first();
        //获取图片
        $photo = Photo::where('new_id',$new->id)->get();
        //获取回复
        $msg = Message::where('new_id',$new->id)->get();
        if(count($msg)){
            foreach ($msg as $key => &$m) {
                $m->user_id = User::find($m->user_id)->first()->name;
            }
        }
        //获取最新信息
        $lastNews = News::lastNews();
        return View::make('news.new',['new'=>$new,'user'=>$user,'photo'=>$photo,'msg'=>$msg,'lastNews'=>$lastNews,'navsub'=>$navsub]);
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
    public function getNewsType($type){
        //类型索引
        $types = array(
            'seeksth' => 1,
            'loststh' => 2,
            'people' => 3,
            'pet' => 4
            );
        if(isset($types[$type])){
            $type_id = $types[$type];
            //获取指定类型信息
            $news = News::desnew($type_id);
            //获取类型名称
            $type_name = Type::find($type_id)->first()->type;
            //获取最新信息
            $lastNews = News::lastNews();        
            return View::make('news.desnew',['news'=>$news,'lastNews'=>$lastNews,'type'=>$type_name,'navsub'=>$type_id+1]);
        }else{
            abort(404);
        }

    }
    public function lastNews(){
        $lastNews = News::lastAllNews();
        return View::make('news.desnew',['news'=>$lastNews,'lastNews'=>$lastNews,'type'=>'最新信息','navsub'=>1]);
    }
}
