<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    private function defImages(){
      return  DB::table('default_images')->orderBy('name', 'asc')->get();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts=Post::all();
        
       
        return  view('admin.posts',['posts'=> $posts]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $images=$this->defImages();
        // dd($images);
        //
        return view('admin.createPost',['images'=>$images]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //   dd(  Storage::url('public/images/posts//L4TqYixHAwOBRDAiAdibuq8TFds8VvjYcgmh0XTn.png'));


        if($request->hasFile('file')){
         
           $image=$request->file('file')->store('public/images/default_images');

         }elseif($request->radio){

           $image= $request->radio;

         }else{
            dd('upload  or select image');
         }
        
        // dd($request->all());
        $post=new Post();
        $post->title=$request->title;
        $post->img=$image;
        $post->description=$request->description;
        $post->content=$request->content;

        $post->save();
   
         return redirect('/admin')->with("messageAction","post successfully created ");

    }   

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $images=$this->defImages();
        $post=Post::find($id);
    
        return view('admin/editPost',['post'=>$post,'images'=>$images]);
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
        //
        $post=Post::find($id);
        
        $post->title=$request->title;
        $post->description=$request->description;
        $post->content=$request->content;
       if($request->radio||$request->hasFile('file')){
            if($request->hasFile('file')){
            
                $image=$request->file('file')->store('public/images/default_images');
    
            }else{
    
                $image= $request->radio;
    
            }

            $post->img= $image;

        }
        $post->save();
       return redirect('/admin')->with("messageAction","post successfully updated ");
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Post::destroy($id);
        return redirect('/admin')->with("messageAction","post successfully removed  ");
    }
}
