<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;

class PagesController extends Controller
{
    public function home()
{
//return view('welcome');
        return view('home');
}
public function about()
{
return view('about');
}
public function contact()
{
return view('contact');
}

public function search(Request $request)
{ $stextstring = $request->get('searchtext');
//->where('votes', '>', 100)
//                    ->orWhere('name', 'John')
//->where('name', 'like', 'T%')
$posts = Post::where ('content','like','%'. $request->get('searchtext') .'%')
        ->orWhere('title','like','%'. $request->get('searchtext') .'%')
        ->orderBy('created_at', 'desc')  //->simplepaginate(3);
        ->paginate(10);
        return view('searchresults', compact('posts'))->with('rr', $request->get('searchtext'));;
//return view('about2');
}
public function contact2()
{
return view('contact2');
}
   
}

