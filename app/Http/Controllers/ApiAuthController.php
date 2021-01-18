<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
//register
      public function handelregister (Request $request)
      {
                  //validation
        $validator = Validator::make($request->all(), [
            'name' => 'Required |string|max:50|min:3',
              'email' => 'Required |email|max:50',
              'password' => 'Required |string |max:50|min:5',
        ]);
        if ($validator->fails())
         {
            $errors= $validator->errors();
            return response()->json($errors);
        }

          $user=User::create([
              'name' =>$request->name,
              'email' =>$request->email,
              'password' =>Hash::make($request->password),
              'access_token'=> Str::random(64),
          ]);
            return response()->json($user->access_token);

      }
//login
    public function handellogin (Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'email' => 'Required |email|max:50',
            'password' => 'Required |string |max:50|min:5',
        ]);
        if ($validator->fails())
         {
            $errors= $validator->errors();
            return response()->json($errors);
        }

            $islogin=Auth::attempt(['email' =>$request->email, 'password' =>$request->password]); //
            if(! $islogin)
            {
                $errors="faild register";
                return response()->json($errors);
            }
            $user=User::where('email','=',$request->email)->first();
            $new_access_token=Str::random(64);
            $user->update([
                'access_token'=>$new_access_token,
            ]);
            return response()->json($new_access_token);
    }

    public function logout (Request $request)
    {
            $access_token=$request->access_token;
            $user=User::where('access_token', $access_token)->first();
            if( $user == null)
            {
                $errors="email or password un correct";
                return response()->json($errors);
            }
            $user->update([
                'access_token'=> null,
            ]);
            $success="log out is cussessful";
            return response()->json($success);
    }

}

