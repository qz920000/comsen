<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//use AuthenticatesAndRegistersUsers, ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Mail;
use Auth;
use \Hash;


use App\Http\Requests;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
   // protected $redirectPath = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'username' => 'required|max:255',
            'name' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }
    
    
//        public function postRegister(Request $request)
//    {
//        $validator = $this->validator($request->all());
//
//        if ($validator->fails()) {
//            $this->throwValidationException(
//                $request, $validator
//            );
//        }
//
//        Auth::login($this->create($request->all()));
//
//        return redirect($this->redirectPath());
//    }
public function postRegister(UserEditFormRequest $request)
    {
       //Run validator checks....
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }


        $activation_code = str_random(30);
        $newUser = new User;
        $newUser->name = $request->name;
      //  $newUser->username = $request->username;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->activation_code = $activation_code;

        $newUser->save();

        $data = array('activation_code' => $activation_code);

        Mail::send('emails.verify', $data, function ($message) use ($newUser){
            $message->from('qz9@yahoo.com', 'New User email verification');
            $message->to($newUser->email, $newUser->name);
                $message->subject('Please verify your email address');
        });
        
        //Flash::message('Thanks for signing up! Please check your email.');
        //\Session::flash('message', 'Thanks for signing up! Please check your email.');
//       \Session::flash('message', 'Success, your account has been activated.');
        return redirect ('/home');
        //return Redirect::route('home');
        // return redirect(URL::route('home'));
//       Mail::send('emails.ticket', $data, function ($message) {
//            $message->from('qz9@yahoo.com', 'Learning Laravel new ticket');
//            $message->to('qz91@yahoo.com')->subject('There is a new ticket!');
//            });
//        //Continue on with any other logic
    }
    
    public function confirm($activation_code)
    {
        if( ! $activation_code)
        {
            throw new InvalidActivationCodeException;
        }

        $user = User::whereActivationCode($activation_code)->first();

        if ( ! $user)
        {
            throw new InvalidActivationCodeException;
        }

        $user->active = 1;
        $user->activation_code = null;
        $user->save();

        //Flash::message('You have successfully verified your account.');

        //return Redirect::route('login');
        return redirect(action('Auth\AuthController@getLogin'))->with('status', 'You have successfully verified your account!');
       // return redirect(action('Auth\AuthController@getLogin'))
        //return redirect(URL::route('login'));
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    protected $loginPath = '/users/login';
    //private $maxLoginAttempts = 10;
    
    
    //////section copied from sessions contrller
    /**
     * Destroy the user's current session.
     *
     * @return \Redirect
     */
    public function getLogout()
    {
        Auth::logout();
       // flash('You have now been signed out. See ya.');
                    $message ='You have now been signed out. See ya.';
               return redirect('users/login')->with('status', $message);
            //session()->flash('message', $message);
        //return redirect()->route('logout')->with('status', $message);
    }
                
public function checkEmail($email)
    {
      try
        {
           $user = User::where('email', '=', $email)->value('active');//->where('password', '=', $hash)->findOrFail();
      if($user != 1)
            {
         // $usera = $password;
             $statuss = $email;
             return redirect()->route('getlink', ['id' => $email])->with('status', 'Your email has not been verified!');  
      //echo 'USER IS NOT ACTIVE';
     // exit;
                }
                }
                catch(ModelNotFoundException $e)
                {
                    
                    return redirect()->back()->with('status', 'Your email does not exist in out system!');
                     // echo 'USER DOES NOT EXIST';
                     /// exit;
                }
    }
    
    /**
     * Perform the login.
     *
     * @param  Request  $request
     * @return \Redirect
     */
    public function postLogin2(Request $request)
    {
       
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $email = $request->get('email');
      // $rr= checkEmail($email);
      //  checkEmail($email);
        //if ($this->checkEmail($email))
        //{
                //return true;
        
//        $password = bcrypt($request->get('password')); //$request->get('password');
////             $usera = User::where('email', '=', $email)
////                     ->where('password', '=', $password)->value('active');//->findOrFail();
              $usera = User::where('email', '=', $email)->value('active');//->findOrFail();
//              
//                
              if ($this->signIn($request)) {
//                  if($usera != 1)
//             {
//             $usera = $password;
//             $statuss = $email;
//             return redirect()->route('profile', ['id' => 1])->with('status', 'Your email has not been verified!');    
//            // 
//            //return redirect('emails/sendverify')->with('status', 'Your email has not been verified!');
//             
//             //return view('emails.sendverify', compact('email','usera'));
//                        //return redirect()->route('getlink', [$email])->with('status', 'Your email has not been verified. Please click below to have a link sent to you at '."\r\n".$email);
//                     //    return redirect()->back()->with('status', 'Your email has not been verified!');
//                        }
//        
//        else{         
            $message ='Welcome back!';
            return redirect()->intended('/home')->with('status', 'Welcome back!');
       // }
           // return redirect('/home');
        }
        //flash('Could not sign you in.');
        else{
                 if($usera != 1)
             {
            // $usera = $password;
            // $statuss = $email;
             //return redirect()->route('profile', ['id' => 1])->with('status', 'Your email has not been verified!');    
            // 
            //return redirect('emails/sendverify')->with('status', 'Your email has not been verified!');
             
             //return view('emails.sendverify', compact('email','usera'));
                       return redirect()->route('getlink', [$email])->with('status', 'Your email has not been verified. Please click below to have a link sent to you at '."\r\n".$email);
                     //    return redirect()->back()->with('status', 'Your email has not been verified!');
                        }
//        
        else{    
        return redirect()->back()->with('status', 'You have signed in with an invalid email or password!');
        }
        }
      //  return redirect()->back();
    }
    
     public function postLogin(Request $request)
    {
       
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
        $email = $request->get('email');
      // $rr= checkEmail($email);
      //  checkEmail($email);
        //if ($this->checkEmail($email))
        //{
                //return true;
        
//        $password = bcrypt($request->get('password')); //$request->get('password');
////             $usera = User::where('email', '=', $email)
////                     ->where('password', '=', $password)->value('active');//->findOrFail();
              $usera = User::where('email', '=', $email)->value('active');//->findOrFail();
             $userdbemail= User::where('email', '=', $email)->value('email');
//                
              if ($this->signIn($request)) {
//                  if($usera != 1)
//             {
//             $usera = $password;
//             $statuss = $email;
//             return redirect()->route('profile', ['id' => 1])->with('status', 'Your email has not been verified!');    
//            // 
//            //return redirect('emails/sendverify')->with('status', 'Your email has not been verified!');
//             
//             //return view('emails.sendverify', compact('email','usera'));
//                        //return redirect()->route('getlink', [$email])->with('status', 'Your email has not been verified. Please click below to have a link sent to you at '."\r\n".$email);
//                     //    return redirect()->back()->with('status', 'Your email has not been verified!');
//                        }
//        
//        else{         
            $message ='Welcome back!';
            return redirect()->intended('/home')->with('status', 'Welcome back!');
       // }
           // return redirect('/home');
        }
        //flash('Could not sign you in.');
        else{
                 if (!($usera == 1) and !($userdbemail==$email))
             {
            // $usera = $password;
            // $statuss = $email;
             //return redirect()->route('profile', ['id' => 1])->with('status', 'Your email has not been verified!');    
            // 
            //return redirect('emails/sendverify')->with('status', 'Your email has not been verified!');
             
             //return view('emails.sendverify', compact('email','usera'));
                       return redirect()->route('getlink', [$email])->with('status', 'Your email has not been verified. Please click below to have a link sent to you at '."\r\n".$email);
//                     //    return redirect()->back()->with('status', 'Your email has not been verified!');
                        }
//        
        else{    
        return redirect()->back()->with('status', 'You have signed in with an invalid email or password!');
        }
        }
      //  return redirect()->back();
    }
    //}
     public function send_verification(Request $request)
    {
         $email = $request->get('email');
                    $statuss ='Your email has not been verifivbvnved!'.$email;
        return view('emails.sendverify', compact('statuss','email'));
    }
    
    
    public function send_verification_action(Request $request)
    {
        $email = $request->get('email');
         $uvuser = User::where('email', '=', $email)->get();
        //  $uvuser = User::findOrFail($email);
          $activation_code = str_random(30);
           $uvuser->activation_code = $activation_code;
        $uvuser->email=$email;
                User::where('email', $email)
                    ->update(['activation_code' => $activation_code]);
        $data = array('activation_code' => $activation_code);

//                Mail::send('emails.ticket', $data, function ($message) {
//            $message->from('qz9@yahoo.com', 'Learning Laravel new ticket');
//            $message->to('qz91@yahoo.com')->subject('There is a new ticket!');
//            });
            
        Mail::send('emails.verify', $data, function ($message) use ($uvuser){
            $message->from('qz9@yahoo.com', 'New User email verification');
            $message->to($uvuser->email);
                $message->subject('Please verify your email address');
        });
                    $message ='An email has been sent to you at '.$email .' Please check your email and click on the link to verify your email address!';
              // $status='Your email has not been verifiedxxxx!';
   return redirect()->back()->with('status', $message);
       // return redirect('emails/sendverify')->with('status', $message,'email',$email);
    }
    
    /**
     * Attempt to sign in the user.
     *
     * @param  Request $request
     * @return boolean
     */
    

    
    protected function signIn(Request $request)
    {
        return Auth::attempt($this->getCredentials($request), $request->has('remember'));
       // return $this->getCredentials($request), $request->has('remember');
    }
    
    /**
     * Get the login credentials and requirements.
     *
     * @param  Request $request
     * @return array
     */
    protected function getCredentials2(Request $request)
            
    {
        //if ('active' != false){
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
            //'active' => 1
        ];
        }
        
            protected function getCredentials(Request $request)
            
    {
        //if ('active' != false){
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ];
        }
        
        //     protected function checkEmail(Request $request)
//    {
//              //$this->validate($request, ['email' => 'required|email', 'password' => 'required']);
//              $email = $request->get('email');
//        //$password =$request->get('password');
//              try
//{
//      $hash = Hash::make($password);
//      $user = User::where('email', '=', $email)->value('active');//->where('password', '=', $hash)->findOrFail();
//      if($user != 1)
//{
//      echo 'USER IS NOT ACTIVE';
//      exit;
//}
//}
//catch(ModelNotFoundException $e)
//{
//      echo 'USER DOES NOT EXIST';
//      exit;
//}
////$post_id = Post::where ('username',Auth::user()->name)->where('slug',$slug)
////        ->orderBy('created_at', 'desc')
////        ->value('id');
//if($user != 1)
//{
//      echo 'USER IS NOT ACTIVE';
//      exit;
//}

//        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 1]))
//             //  if ( Auth::attempt($this->getCredentials($request)))
//                 {
//             
//                // return Auth::attempt($this->getCredentials($request), $request->has('remember'));
//            return redirect()->back()->with('status', 'welcome');
//            
//    // The user is active, not suspended, and exists.
//                    }
//                    else if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'active' => 0])){
//                    return redirect()->back()->with('status', 'Your account has not been verified!');
//                    }
//                     else {
//                    return redirect()->back()->with('status', 'invalid email or username!');
//                    }
                    
      //  return Auth::attempt($this->getCredentials($request), $request->has('remember'));
       // return $this->getCredentials($request), $request->has('remember');
//    }
 //else {return redirect()->back()->with('status', 'Your account has not been verified!');}
    //}
        
//         protected function checkEmail(Request $request)
//    {
//              //$this->validate($request, ['email' => 'required|email', 'password' => 'required']);
//              $email = $request->get('email');
//        //$password =$request->get('password');
//              try
//{
//      $hash = Hash::make($password);
//      $user = User::where('email', '=', $email)->value('active');//->where('password', '=', $hash)->findOrFail();
//      if($user != 1)
//{
//      echo 'USER IS NOT ACTIVE';
//      exit;
//}
//}
//catch(ModelNotFoundException $e)
//{
//      echo 'USER DOES NOT EXIST';
//      exit;
//}
}
