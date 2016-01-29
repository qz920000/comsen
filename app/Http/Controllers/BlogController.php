<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index3()
    {
        //$posts = Post::all();
         //$posts =Post::orderBy('created_at','desc')->get();
          $posts =Post::whereStatus(1) ->orderBy('created_at','desc')->get();
       return view('blog.index', compact('posts'));
    }
    
    
public function unauthorized()
    {
    return view('errors/unauthorized')->with('status', 'nt authorized!');
            
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
            public function index()
            {
                //$posts = Post::all();
                 //$posts =Post::orderBy('created_at','desc')->get();
//                $posts =Post::leftjoin('images', 'posts.id', '=', 'images.post_id')                        
//            ->select('posts.*', 'images.post_id', 'images.filePath')
//            ->orderBy('posts.created_at','desc')->get();
//                          $comments = Comment::where ('username',$tt)->orderBy('created_at', 'desc') //->simplepaginate(3);
//         ->paginate(config('comsenblog.posts_per_page'));
                $posts =Post::whereStatus(1) ->leftjoin('images', function ($join) {
            $join->on('posts.id', '=', 'images.post_id');
                 
        })
            ->select('posts.*', 'images.post_id', 'images.filePath')
                ->groupBy('posts.id')
            ->orderBy('posts.created_at','desc')
        ->paginate(config('comsenblog.posts_per_mainpage'));
                 $images = Image::all();
                 // // $posts =Post::whereStatus(1) ->orderBy('created_at','desc')->get();
                 // $posts = Post::whereId(41)->get();
                  //$images = $posts->images()->get();
                 // $images = Image::where ('post_id',$posts->id )->get();
//                  $post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
//        ->orderBy('created_at', 'desc')
//        ->value('id');
                return view('blog.index', compact('posts','images'));
            }
            public function show2($slug)
            {
            $post = Post::whereSlug($slug)->firstOrFail();
            $comments = $post->comments()->get();
            $updps = $post->updateposts()->get();
            return view('blog.show', compact('post', 'comments','updps'));
            }
            
            
            public function index2()
            {  
                
                $posts =Post::whereStatus(1) ->leftjoin('images', function ($join) {
            $join->on('posts.id', '=', 'images.post_id');
                 
        })
            ->select('posts.*', 'images.post_id', 'images.filePath')
                ->groupBy('posts.id')
            ->orderBy('posts.created_at','desc')->get();
        
                 $images = Image::all();
    
                return view('blog.index2', compact('posts','images'));
            }
   
            
            
            
            public function show($id)
            {
            $post = Post::whereId($id)->firstOrFail();
            $comments = $post->comments()->get();
            $updps = $post->updateposts()->get();
            $images = $post->images()->get();
            $post_status= $post->status;
            $utags = $post->tags()->get();
             if($post_status == "1")
                 {
            return view('blog.show', compact('post', 'comments','updps','images','utags'));
       } else {
            return view('errors/unauthorized')->with('status', 'nt authorized!');
        }
        //endif;
            }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
