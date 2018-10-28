<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Socialite;
use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $userFacebook = Socialite::driver($provider)->user();
        if ($userFacebook) {
            $user = User::where('email',$userFacebook->getEmail())->first();
            if ($user) {
                $user = $user;
                Auth::login($user, true);
            }
            else {
                $dataUser = array(
                    'name' => $userFacebook->getName(),
                    'email' => $userFacebook->getEmail(),
                    'password' => bcrypt('123456'),
                    'image' => $userFacebook->getAvatar(),
                    'verifyToken' => $userFacebook->token
                );
                $data = User::create($dataUser);
                Auth::login($data, true);
            }
        }
        else {
            $authUser = $this->findOrCreateUser($user, $provider);
            Auth::login($authUser, true);
        }
        return redirect($this->redirectTo);
    }

    public function userLogin(Request $request){
        $data = $request->all();
        $user = User::where('email',$data['email'])->first();
        $result = array();
        if ($user) {
            $user = $user;
            Auth::attempt($data);
            $usersd = Auth::user();
            if($usersd){
                $result['status'] = true;
            }else {
                $result['status'] = false;
                $result['message'] = 'メールアドレスかパスワードが間違いました。';
            }
        }
        else {
            $result['status'] = false;
            $result['message'] = 'メールアドレスかパスワードが間違いました。';
        }
        return json_encode($result);
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'provider' => $provider,
            'provider_id' => $user->id
        ]);
    }
}
