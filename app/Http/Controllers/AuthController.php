<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use PhpParser\Builder\Use_;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }
    //register
    public function handelregister (Request $request)
    {

        $request->validate([
            'name' => 'Required |string|max:50|min:3',
            'email' => 'Required |email|max:50',
            'password' => 'Required |string |max:50|min:5',

        ]);

        $user=User::create([
            'name' =>$request->name,
            'email' =>$request->email,
            'password' =>Hash::make($request->password),
        ]);

            Auth::login($user); // to stor session
        return redirect (route('books.index'));

    }
// login
    public function login()
    {
        return view('auth.login');
    }
    public function handellogin (Request $request)
    {

        $request->validate([
            'email' => 'Required |email|max:50',
            'password' => 'Required |string |max:50|min:5',

        ]);

            $islogin=Auth::attempt(['email' =>$request->email, 'password' =>$request->password]); //
            if(! $islogin)
            {

                return back();

            }
            return redirect(route('books.index'));


    }
//logout
    public function logout()
    {
        Auth::logout();
        return back();
    }

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        $email=$user->email;
        $userdb= User::where('email','=', $email)->frist();
        if($userdb == null)
        {
           $userr= User::create([
                'name' =>$user->name,
                'email' =>$user ->email,
                'password' =>$user->Hash::make('123456'),
                'oauth_token'=>$user->token,
            ]);
                    Auth::login($userr);
        }
        else
        {
            Auth::login($userdb);
        }
        return redirect(route('books.index'));

        // $user->token;
    }

}
