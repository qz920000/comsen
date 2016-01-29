<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Image;
use Carbon\Carbon;

//use App\Http\Requests;
use Guzzle\Tests\Plugin\Redirect;
//use App\Image;
//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageController extends Controller
{
 	/**
	 * Show the form for uploading a new resource.
	 *
	 * @return Response
	 */
	public function upload(){
		// Redirect to image upload form
            return view('images/imageupload');
   	}

	/**
	 * Store a newly uploaded resource in storage.
	 *
	 * @return Response
	 */
	public function storeImage(Request $request){
		// Store records process
             $image = new Image();
        $this->validate($request, [
            //'title' => 'required',
            'image' => 'required'
        ]);
//        $image->title = $request->title;
//        $image->description = $request->description;
             $image->title = '$post->title';
        $image->description = 'image';
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;
            $image->post_id = $request->post_id;
            

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        //return $this->create()->with('success', 'Image Uploaded Successfully');
        \Session::flash('message', 'Successfully updated!');
	return redirect()->back()->with('status', 'Image Uploaded Successfully!');
   	}
        
        	public function store(Request $request){
		// Store records process
             $image = new Image();
        $this->validate($request, [
            'title' => 'required',
            'image' => 'required'
        ]);
        $image->title = $request->title;
        $image->description = $request->description;
		if($request->hasFile('image')) {
            $file = Input::file('image');
            //getting timestamp
            $timestamp = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
            
            $name = $timestamp. '-' .$file->getClientOriginalName();
            
            $image->filePath = $name;

            $file->move(public_path().'/images/', $name);
        }
        $image->save();
        return $this->create()->with('status', 'Image Uploaded Successfully');
        
	
   	}
    public function create()
    {
        return view('images/imageupload');
        //return view('backend.posts.create');
       // $categories = Category::all();
         //return view('backend.posts.create', compact('categories'));
    }

    /**
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function show(Request $request){
		// Show lists of the images
             $images = Image::all();
        return view('images/showlists', compact('images'));
    }
    
       public function destroy2($id)
    {
           //  $images = Image::all();
      //  return view('images/showlists', compact('images'));
        $images =Image::destroy($id);
        return redirect()->back()->with('status', 'Image deleted Successfully!');
    }
}
