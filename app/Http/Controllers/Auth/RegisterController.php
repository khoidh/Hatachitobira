<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Str;
use Mail;
use Auth;
use App\Mail\verifyEmail;
use Session;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(Request $request)
    {
        $data = $request->all();
        $result = array();
        $users = User::where('email',$data['email'])->first();
        $validation = Validator::make( $request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ( $validation->fails() ) {
            return $validation->messages();
        }else {
            $user_data = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'verifyToken' => Str::random(40),
            ];
            if(filter_var($user_data['email'], FILTER_VALIDATE_EMAIL)) {
                $user = User::create($user_data);
                $thisUser = User::findOrFail($user->id);
                $this->sendEmail($thisUser);
                Auth::login($thisUser, true);
                return response()->json([
                    'success' => 'true'
                ]);
            }else{
                return response()->json([
                    'email' => 'The email not correct'
                ]);
            }
        }
    }

    public function sendEmail($thisUser)
    {
        Mail::to($thisUser['email'])->send(new verifyEmail($thisUser));
    }

    public function verifyEmailFirst()
    {
        return view('email.verifyEmailFirst');
    }

    public function sendEmailDone($email, $verifyToken)
    {
        $user = User::where(['email' => $email,'verifyToken' => $verifyToken])->first();
        if($user)
        {
            if(User::where(['email' => $email,'verifyToken' => $verifyToken])
                ->update(['status' => '1','verifyToken' => NULL]))
                {
                    return view('auth.registerComplete',['message' => 'Registration complete']);
                }
        }
        else 
        {
            return view('auth.registerComplete',['message' => 'User not found']);
        }

    }
}
