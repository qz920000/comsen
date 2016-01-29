<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CommentFormRequest;
use App\Comment;
use Auth;
class CommentsController extends Controller
{
public function newComment(CommentFormRequest $request)
{

$comment = new Comment(array(
'post_id' => $request->get('post_id'),
'content' => $request->get('content'),
 'username' => Auth::user()->name,
 'user_id' => $request->get('post_owner_id'),
      'post_type' => $request->get('post_type')
));
$comment->save();
return redirect()->back()->with('status', 'Your comment has been created!');
//return redirect('/blog')->with('status', 'Your comment has been created!');
}
}

