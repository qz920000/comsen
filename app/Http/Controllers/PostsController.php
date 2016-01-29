<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Post;
use App\Post_draft;
use App\Tag;
use Auth;
use Illuminate\Support\Str;
use App\Http\Requests\PostFormRequest;
use App\Http\Requests\PostEditFormRequest;
use App\Http\Requests\PostSaveFinalFormRequest;
use App\Comment;
Use Input;
use Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
            public function __construct()
            {
                $this->middleware('auth');
        
                //$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
        
                //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
            }
    public function index()
    {
        //$posts = Post::all();
        //$posts = Post::all()->orderBy('created_at', 'desc');
        $posts=Post::orderBy('created_at','desc')->get();
        return view('backend.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('backend.posts.create');
        $categories = Category::all();
         return view('backend.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
//

  public function savepost (PostFormRequest $request)
{
       $buttonval = $request->get('save');
       $slug = uniqid();
       if ($buttonval == 'publish'){
        //    echo "publish";
        $post= new Post(array(
        'title' => $request->get('title'),
        'content' => $request->get('content'),
         //'tagtext' => $request->get('tags'),
          // 'category_id'=> $request->get('category_id'),
         'user_id' => Auth::user()->id,
         'username' => Auth::user()->name,
             'useremail' => Auth::user()->email,
          'status'  => 1,
        //     'user_id' => $request->get('user_id'),
        'slug' => $slug,
        ));
        //$buttonval = $request->get('save');
        //$slug = array_get($post, 'slug');
        $post->save();
        //$post->categories()->sync($request->get('categories'));
        //$post_id =41;
        $post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
        ->orderBy('created_at', 'desc')
        ->value('id');

        $tag_post =new Tag (array(
            'tagname' => 'tagname',
            'taggroup' =>'group1',
         'tagtext' => $request->get('tags'),
         'post_id' => $post_id,
            ));
        $tag_post->save();
        //$posts = Post::where ('username',Auth::user()->name,) ;
        return redirect()->route('mypost')->with('status', 'Your post has been published!!');
       // return redirect->route('mypost')->with('status', 'Your post has been published!!');
}
else{
   // echo "save val";
    $post= new Post_draft(array(
'title' => $request->get('title'),
'content' => $request->get('content'),
 'tagtext' => $request->get('tags'),
  // 'category_id'=> $request->get('category_id'),
 'user_id' => Auth::user()->id,
 'username' => Auth::user()->name,
 'useremail' => Auth::user()->email,
  'status'  => 0,
//     'user_id' => $request->get('user_id'),
'slug' => $slug,
));
//$slug = array_get($post, 'slug');

$post->save();
$post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
        ->orderBy('created_at', 'desc')
        ->value('id');
//$post->categories()->sync($request->get('categories'));
//$post_id =41;
//return redirect()->back()->with('status', 'Your post has been submitted as a draft!!');
//return view('/posts/create')->with('status', 'Your post has been submitted as a draft!!');
return redirect(action('PostsController@showPreview', $post->id))->with('status', 'Your draft has been saved!');
//return redirect()->route('mydraft')->with('status', 'Your draft has been saved!!');
}


//var_dump(Input::all());
  
}
//          
  public function update($id, PostEditFormRequest $request)
            {
         $post = Post_draft::whereId($id)->firstOrFail();
      if (Gate::denies('update-post', $post)) {
            abort(403);
        }
         
            $post->title = $request->get('title');
            $post->content = $request->get('content');
            $post->tagtext = $request->get('tags');
            //$post->slug = Str::slug($request->get('title'), '-');
            $post->save();
            //$post->categories()->sync($request->get('categories'));
            return redirect(action('PostsController@showPreview', $post->id))->with('status', 'The post has been updated!');
            //return redirect(action('PostsController@edit', $post->id))->with('status', 'The post has been updated!');
            }

 public function showPreview($post_id)
            {
                 $post = Post_draft::whereId($post_id)->firstOrFail();
     if (Gate::denies('update-post', $post)) {
            abort(403);
        }

            // $utags = $post->tags()->get();
            //$comments = $post->comments()->get();
            return view('backend.posts.preview', compact('post'));
            }
//         public function showPreview2($slug)
//                {
//                $post = Post::whereSlug($slug)->firstOrFail();
//                //$utags = $post->tags()->get();
//                //$comments = $post->comments()->get();
//                return view('backend.posts.preview', compact('post'));
//                }       
            
            
            
public function storeFinal($id,PostSaveFinalFormRequest $request)
{
    $post_draft = Post_draft::whereId($id)->firstOrFail();
    //$post->status = 1;
    
    //    echo "publish";
        $post= new Post(array(
        'title' => $post_draft->title,
        'content' => $post_draft->content,
         //'tagtext' => $request->get('tags'),
          // 'category_id'=> $request->get('category_id'),
         'user_id' => Auth::user()->id,
         'username' => Auth::user()->name,
             'useremail' => Auth::user()->email,
          'status'  => 1,
        //     'user_id' => $request->get('user_id'),
        'slug' => $post_draft->slug,
        ));
   
        $post->save();
        //$post->categories()->sync($request->get('categories'));
        
        $post_id = Post::where ('username',Auth::user()->name)->where('slug',$post_draft->slug)
        ->orderBy('created_at', 'desc')
        ->value('id');

        $tag_post =new Tag (array(
            'tagname' => 'tagname',
            'taggroup' =>'group1',
         'tagtext' => $post_draft->tagtext,
         'post_id' => $post_id,
            ));
        $tag_post->save();
        
post_draft::destroy($id);
//$post->categories()->sync($request->get('categories'));
return redirect('/posts/user/myposts')->with('status', 'The post has been published!');
//return redirect('/posts/create')->with('status', 'The post has been created!');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
      public function showMyPosts()
            {
          $tt = Auth::user()->name;
          $posts = Post::where ('username',$tt) ->orderBy('created_at', 'desc')//->simplepaginate(3);
         ->paginate(config('comsenblog.posts_per_page'));
        return view('backend.posts.showmyposts', compact('posts'));
            }
        
                  public function showMyDrafts()
            {
          $tt = Auth::user()->name;
          $posts = Post_draft::where ('username',$tt) ->orderBy('created_at', 'desc')//->simplepaginate(3);
         ->paginate(config('comsenblog.posts_per_page'));
        return view('backend.posts.showmydrafts', compact('posts'));
            }
            ///used todisplay users comments
       public function showComments()
            {
//                 $comments =Comment::where ('username',$tt) ->join('posts', function ($join) {
//            $join->on('posts.id', '=', 'comments.post_id');
//                 
//        })
//            ->select('comments.*', 'posts.post_id', 'images.filePath')
//                ->groupBy('posts.id')
//            ->orderBy('posts.created_at','desc')
//        ->paginate(config('comsenblog.posts_per_mainpage'));
           
           
          $tt = Auth::user()->name;
          $comments = Comment::where ('username',$tt)->orderBy('created_at', 'desc') //->simplepaginate(3);
         ->paginate(config('comsenblog.posts_per_page'));
        return view('backend.posts.showcomments', compact('comments'));
            }
            

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $post = Post_draft::whereId($id)->firstOrFail();
        if (Gate::denies('update-post-draft', $post)) {
            abort(505, 'Unauthorized action.');
        }
       
        $categories = Category::all();
        //$selectedCategories = $post->categories->lists('id')->toArray();
       // $utags = $post->tags()->get();
        //return view('backend.posts.edit', compact('post', 'categories', 'selectedCategories','utags'));
        return view('backend.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    


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
    
    //             public function showPost($id)
//            {
//            $post = Post::whereId($id)->firstOrFail();
//            $updp = $post->updateposts()->get();
//            return view('backend.posts.updateposts', compact('post','updp'));
//            }
//            public function show2($tt)
//            {
//          $tt = Auth::user()->name;
//          $posts = Post::where ('username',$tt) //->simplepaginate(3);
//         ->paginate(config('comsenblog.posts_per_page'));
//        return view('backend.posts.show2', compact('posts'));
//            }
//            public function show3()
//            {
//                //$posts = DB::table('posts')
//                //                          ->where('username', 'user1')
//                   // ->get();
//                 return view('backend.posts.index', compact('posts'));
//            }
            
//             public function edit3($id)
//    {
//        $posts = Post::where ('username',$id)->paginate(3);
//        // ->paginate(config('comsenblog.posts_per_page'));
//        //$categories = Category::all();
//        //$selectedCategories = $post->categories->lists('id')->toArray();;
//        return view('backend.posts.edit3', compact('posts'));
//    }
//    
//
//    public function edit2($id)
//    {
//        $post = Post::whereId($id)->firstOrFail();
//        //$categories = Category::all();
//        //$selectedCategories = $post->categories->lists('id')->toArray();;
//        return view('backend.posts.edit2', compact('post'));
//    }
       
    
    //    public function update2($id, PostEditFormRequest $request)
//            {
//            $post = Post::whereId($id)->firstOrFail();
//            $post->title = $request->get('title');
//            $post->content = $request->get('content');
//            $post->slug = Str::slug($request->get('title'), '-');
//            $post->save();
//            $post->categories()->sync($request->get('categories'));
//            //return redirect(action('PostsController@showPreview', $post->id))->with('status', 'The post has been updated!');
//            return redirect(action('PostsController@edit', $post->id))->with('status', 'The post has been updated!');
//            }
//            
 //   public function storeDraft(PostFormRequest $request)
//{
//$post= new Post(array(
//'title' => $request->get('title'),
//'content' => $request->get('content'),
// //'tagtext' => $request->get('tags'),
//  // 'category_id'=> $request->get('category_id'),
// 'user_id' => Auth::user()->id,
// 'username' => Auth::user()->name,
//     'useremail' => Auth::user()->email,
//  'status'  => 0,
////     'user_id' => $request->get('user_id'),
//'slug' => Str::slug($request->get('title'), '-'),
//));
//$slug = array_get($post, 'slug');
//
//$post->save();
////$post->categories()->sync($request->get('categories'));
////$post_id =41;
//$post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
//        ->orderBy('created_at', 'desc')
//        ->value('id');
//
//$tag_post =new Tag (array(
//    'tagname' => 'tagname',
//    'taggroup' =>'group1',
// 'tagtext' => $request->get('tags'),
// 'post_id' => $post_id,
//    ));
//$tag_post->save();
////$posts = Post::where ('username',Auth::user()->name,) ;
////$users = DB::table('users')->where('votes', '=', 100)->get();
////return redirect(action('PostsController@showPreview', $slug))->with('status', 'The post has been created!');
////return redirect(action('PostsController@showPreview', $post_id))->with('status', 'Your post has been submitted as a draft!');
////return redirect()->back()->with('status', 'Your post has been submitted as a draft!!');
////return view('/posts/create')->with('status', 'Your post has been submitted as a draft!!');
//return redirect('posts/create')->with('status', 'Your post has been submitted as a draft!!');
////return redirect()->back()->with('status', 'Your post has been submitted as a draft!!');//return redirect('/posts/create');
////PostsController@showPreview($slug);
//}
    
    //  public function publish(PostFormRequest $request)
//{
//$post= new Post(array(
//'title' => $request->get('title'),
//'content' => $request->get('content'),
// //'tagtext' => $request->get('tags'),
//  // 'category_id'=> $request->get('category_id'),
// 'user_id' => Auth::user()->id,
// 'username' => Auth::user()->name,
//     'useremail' => Auth::user()->email,
//  'status'  => 1,
////     'user_id' => $request->get('user_id'),
//'slug' => Str::slug($request->get('title'), '-'),
//));
//$slug = array_get($post, 'slug');
//
//$post->save();
////$post->categories()->sync($request->get('categories'));
////$post_id =41;
//$post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
//        ->orderBy('created_at', 'desc')
//        ->value('id');
//
//$tag_post =new Tag (array(
//    'tagname' => 'tagname',
//    'taggroup' =>'group1',
// 'tagtext' => $request->get('tags'),
// 'post_id' => $post_id,
//    ));
//$tag_post->save();
////$posts = Post::where ('username',Auth::user()->name,) ;
//return redirect('posts/create')->with('status', 'Your post has been published!!');
////return redirect()->back()->with('status', 'Your post has been submitted as a draft!!');//return redirect('/posts/create');
////PostsController@showPreview($slug);
//}

}
