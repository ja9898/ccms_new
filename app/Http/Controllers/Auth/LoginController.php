<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/dashboard';
    
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|email', 'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        
        if (Auth::once(['email' => $credentials['email'], 'password' => $credentials['password'], 'status' => 1]) ) {
            $user = app('auth')->getProvider()->retrieveByCredentials($request->only('email', 'password'));
            //Put Required values in session
			$user_id=$request->session()->get('user_id');
			$remember=$request->session()->get('remember');
            $request->session()->put("user_id", $user->id);
            $request->session()->put("fname", $user->fname);
            $request->session()->put("lname", $user->lname);
            $request->session()->put("remember", $request->get('remember'));

            //Updating user table with new otp            
/*             $randcode=rand(100000,999999);
            $userotp=\App\User::find($user->id);         
            $userotp->otp=$randcode;
            $userotp->save(); */
            /* Temp code, Need to apply SMS service here and 
            then. After that need to remove that session variable
            */
            //$request->session()->put('otp', $randcode);
			Auth::loginUsingId($user->id);
			//$userotp=\App\User::find($user->id); 
            //Redirect to 2FA/OTP
            return redirect('dashboard');
        }

        //redirect again to login view with some errors
        return redirect()->guest('/login')
                    ->withInput($request->only('email', 'remember'))
                    ->with('error', $this->getFailedLoginMessage());

    }

    protected function getFailedLoginMessage()
    {
        return 'Invalid Login Information Plese try again.';
    }
    
}
