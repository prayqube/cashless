<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Hash;
use App\User;
use Illuminate\Support\Facades\Password;
use Mail;




class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
	 public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	
	 public function index()
    {
          return view('custom.login');
    }
	
	 public function logout(Request $request)
    {

        $request->session()->invalidate();

           return redirect('/');
    }

	 public function validateUser(Request $request)
    {
		 $validatedData = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
        'password' => 'required',
    ]);
		
		

		 if(!Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')]))
        {
            return redirect()->back()->withErrors(['username'=>'Username or password missmatch.']);  
        }
		else
			
        {
			 return redirect('/home');
		}
		
		

    }
	 
	protected function guard()
	{
		return Auth::guard('guard-name');
	}
	 

    public function sendEmail(Request $request)
    {

       $user = User::where('email', request()->input('email'))->first();
       if($user)
       {
    $token = Password::getRepository()->create($user);
    Mail::send(['text' => 'auth.passwords.reset'], ['token' => $token], function ($m) use ($user) {
        $m->from('vivek@rayqube.com', 'CashlessIndia');

            $m->to($user->email, $user->name)->subject('Passwor Reset Link!');
    });

        return redirect()->back()->with('message', 'Email sent successfuly to reset password!');
    }
        else
        {
             return redirect()->back()->withErrors(['username'=>'Please enter registered email.']);

        }

    }
    
}
