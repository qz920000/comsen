<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Comment;
use App\Role;
use Gate;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
Use Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', compact('users'));
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
//    public function index()
//    {
//        //$posts = Post::all();
//        //$posts = Post::all()->orderBy('created_at', 'desc');
//        $posts=Post::orderBy('created_at','desc')->get();
//        return view('backend.posts.index', compact('posts'));
//    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePost($id)
            {
            $post = Post::whereId($id)->firstOrFail();
            $updp = $post->updateposts()->get();
            $images = $post->images()->get();
            return view('backend.posts.updateposts', compact('post','updp','images'));
            }
    public function show($name)
    {
        //$user = User::whereId($id)->firstOrFail();
    //if (Gate::denies('update-user', $user)) {
    
        $user = User::whereName($name)->firstOrFail();
        $posts = $user->posts()
                ->orderBy('created_at', 'desc')//->simplepaginate(3);
         ->paginate(20);
        //$comments = $user->comments()->get();
        $comments = Comment::where ('username',$name)->orderBy('created_at', 'desc'); //->simplepaginate(3);
//         ->paginate(config('comsenblog.posts_per_page'));
        $selectedRoles = $user->roles->lists('name');
        return view('backend.users.show', compact('user', 'posts', 'selectedRoles','comments'));
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function edit11($id)
    {
        $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        //$selectedRoles = $user->roles->lists('id')->toArray();
        //return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
    }
public function edit($id)
    {
     $user = User::whereId($id)->firstOrFail();
    //if (Gate::denies('update-user', $user)) {
     if (Auth::user()->id != $id){
            abort(505, 'Unauthorized action.');
        }
       // $user = User::whereId($id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles->lists('id')->toArray();
        return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
    }
    
//    public function edit($name)
//    {
//        $user = User::whereId($id)->firstOrFail();
//        $roles = Role::all();
//        $selectedRoles = $user->roles->lists('id')->toArray();
//        return view('backend.users.edit', compact('user', 'roles', 'selectedRoles'));
//    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 
            public function update($id, UserEditFormRequest $request)
            {
            $user = User::whereId($id)->firstOrFail();
      if (Auth::user()->id != $id){
            abort(505, 'Unauthorized action.');
        }
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $password = $request->get('password');
            if($password != "") {
            $user->password = Hash::make($password);
            }
            $user->save();
            $user->saveRoles($request->get('role'));
            return redirect(action('UsersController@edit', $user->id))->with('status', 'The user has been updated!');
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
