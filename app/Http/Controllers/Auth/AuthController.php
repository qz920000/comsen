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

        Mail::send('emails.registered', $data, function ($message) use ($newUser){
            $message->from('qAdmin@admin.com', 'Naijablog');
            $message->to($newUser->email, $newUser->name);
                $message->subject('Welcome to our Blog');
        });
//          Mail::send('emails.verify', $data, function ($message) use ($newUser){
//            $message->from('qz9@yahoo.com', 'New User email verification');
//            $message->to($newUser->email, $newUser->name);
//                $message->subject('Please verify your email address');
//        });
//        
   
        return redirect ('/home')->with('status', 'Your accunt has been have successfully created.!');
 
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
     
                    $message ='You have now been logged out.';
               return redirect('users/login')->with('status', $message);
           //return redirect()->route('logout')->with('status', $message);
    }
                
public function userisActive($email)
{
$usera = User::where('email', '=', $email)->value('active');//->findOrFail();
if ($usera==1){
    return true;
}

}
     public function postLoginjjjjj(Request $request)
    {
       
        $this->validate($request, ['email' => 'required|email', 'password' => 'required']);
                  $email = $request->get('email');
              if ($this->signIn($request)) {
        if ($this->userisActive($email)){
            $message ='Welcome back!';
            return redirect()->intended('/home')->with('status', 'Welcome back!');
            }
            else
            
            {
                return redirect()->route('getlink', [$email])->with('status', 'Your email has not been verified. Please click below to have a link sent to you at '."\r\n".$email);

            }
            }                     
//        
        else{    
        return redirect()->back()->with('status', 'You have signed in with an invalid email or password!');
        }
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
    protected function getCredentials(Request $request)
            
    {
        //if ('active' != false){
        return [
            'email'    => $request->input('email'),
            'password' => $request->input('password')
            //'active' => 1
        ];
        }
        
//            protected function getCredentials2(Request $request)
//            
//    {
//        //if ('active' != false){
//        return [
//            'email'    => $request->input('email'),
//            'password' => $request->input('password'),
//            'active' => 1
//        ];
//        }
        
}
