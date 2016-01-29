<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostsFormRequest;
use App\Updateposts;
use App\Post;
use Auth;

class UpdatePostsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//
//        //$this->middleware('log', ['only' => ['fooAction', 'barAction']]);
//
//        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
//    }
  public function updatePost222(UpdatePostsFormRequest $request)
{
$updp = new Updateposts(array(
'post_id' => $request->get('post_id'),
'content' => $request->get('content')
));
$updp->save();
return redirect()->back()->with('status', 'Your post has been updated !');
} 
public function updatePostxx($id)
            {
            $post = Post::whereId($id)->firstOrFail();
            $updp = $post->updateposts()->get();
            return view('backend.posts.updateposts', compact('post','updp'));
            }
            
 public function updatePost($id)
            {
            $post = Post::whereId($id)->firstOrFail();
            $updp = $post->updateposts()->get();
            $images = $post->images()->get();
            return view('backend.posts.updateposts', compact('post','updp','images'));
            }
            
   public function newUpdate(UpdatePostsFormRequest $request)
            {
            $newupdate = new Updateposts(array(
            'post_id' => $request->get('post_id'),
            // 'user_id' => Auth::user()->id,
             'username' => Auth::user()->name,
            'content' => $request->get('content')////                'post_type' => $request->get('post_type')
            ));
            $newupdate->save();
            return redirect()->back()->with('status', 'Your post has been updated!');
            //return redirect('/blog')->with('status', 'Your comment has been created!');
            }
            
}
