<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('manager');

        //$this->middleware('log', ['only' => ['fooAction', 'barAction']]);

        //$this->middleware('subscribed', ['except' => ['fooAction', 'barAction']]);
    }
public function home()
{
return view('backend.adminhome');
}
}