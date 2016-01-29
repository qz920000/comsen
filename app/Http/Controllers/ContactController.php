<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Contact;
use App\User;
Use Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
 

     public function store(ContactFormRequest $request)
    {
        //return $request->all();//
          $name = $request->get('name');
        $email = $request->get('email');
        $subject = $request->get('subject');
        $content = $request->get('content');
                  
                  
        $slug = uniqid();
       $contact = new Contact(array(
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject' => $request->get('subject'),
        'content' => $request->get('content'),
        'slug' => $slug
        ));
        $contact->save();
            $data = array(
            'contact' => $slug,
            );
                  
//            Mail::raw( $content, function($message){
//            //Mail::send('emails.ticket', $data, function ($message) {
//            $message->from($email, $name);
//            $message->to('qz91@yahoo.com')->subject($subject);
//            });
             Mail::raw($content, function ($message) use ($contact){
            $message->from('admin@commonsensenow.com', $contact->name . "with email address " . $contact->email);
            $message->to('qz91@yahoo.com', 'Admin');
                $message->subject('New Message from Contatc form Subhect: '.$contact->subject);
        });
//             Mail::raw($content, $data, function ($message) use ($contact){
//            $message->from($contact->email, 'New User email verification');
//            $message->to('qz91@yahoo.com', $contact->name);
//                $message->subject($contact->subject);
//        });
//            Mail::send('emails.ticket', $data, function ($message) {
//            $message->from('qz9@yahoo.com', 'Learning Laravel new ticket');
//            $message->to('qz91@yahoo.com')->subject('There is a new ticket!');
//            });
          //  return redirect(action('PostsController@showPreview', $post_id))->with('status', 'Your post has been submitted as a draft!');
        //return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
        return redirect()->back()->with('status', 'Your message has been sent!');

    }
    
    public function sendEmailtoUser(ContactFormRequest $request)
    {     
        
        $user_to_email = $request->get('user_to_email');
        // $uvuser = User::findOrFail($user_to_email)->get();
               
         $uvuser = User::where('email', '=', $user_to_email)->get();
        // $user_to_email = $request->get('user_to_email');
         // $uvuser->email=User::find($request->get('user_to_name'))->value('email');
       //  $user_to_email2=User::findOrFail($request->get('user_to_name'))->value('email');
         $user_to_email2=User::where('email', '=', $user_to_email)->value('email');
          $uvuser->email=$user_to_email2;
          $uvuser->name = User::where('email', '=', $user_to_email)->value('name');//$request->get('user_to_name');
                   
        //return $request->all();//
          $name = $request->get('name');
        $email = $request->get('email');
//          $contact->user_to_name = $request->get('user_to_name');
//        $contact->user_to_email = $request->get('user_to_email');
       // $subject = $request->get('subject');
        $content = $request->get('content');
          $subject = 'You have received a message from '.$name;        
                  
        $slug = uniqid();
       $contact = new Contact(array(         
        'name' => $request->get('name'),
        'email' => $request->get('email'),
        'subject' => $subject,
        'content' => $request->get('content'),
        'slug' => $slug
        ));
        $contact->save();
            $ddd = array(
                  'contact' => $slug,
            );
                  
//            Mail::raw( $content, function($message){
//            //Mail::send('emails.ticket', $data, function ($message) {
//            $message->from($email, $name);
//            $message->to('qz91@yahoo.com')->subject($subject);
//            });
            // $user = User::findOrFail($request->get('user_to_name'));
             Mail::raw($content, function ($message) use ($contact,$uvuser){
            $message->from($contact->email, $contact->name . " with email address " . $contact->email);
            $message->to($uvuser->email, $uvuser->name);
                $message->subject('New Message from Contatc form Subhect: '.$contact->subject);
        });
     //  return redirect(action('PostsController@showPreview', $post_id))->with('status', 'Your post has been submitted as a draft!');
        //return redirect('/contact')->with('status', 'Your ticket has been created! Its unique id is: '.$slug);
        return redirect()->back()->with('status', 'Your message has been sent!');

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
//              $ticket = Ticket::whereSlug($slug)->firstOrFail();
//        $ticket->delete();
//        return redirect('/tickets')->with('status', 'The ticket '.$slug.' has been deleted!');
        //
    }
}
