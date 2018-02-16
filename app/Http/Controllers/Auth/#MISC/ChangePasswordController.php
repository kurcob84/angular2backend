<?php

namespace App\Api\V1\Controllers\Auth;

use Config;
use App\User;
use Mail;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Api\V1\Requests\Auth\ChangePasswordRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Validator;

class ChangePasswordController extends Controller
{   
    public function changePassword(ChangePasswordRequest $request, JWTAuth $JWTAuth)
    {
        $validator = Validator::make($request->all(), [ 
             'email'             => 'required|email',
             'password'          => 'required'
             ]);

        if($validator->fails())
        {
            // TODO global/general error handling
            return response()->json([ 'error' => $validator->errors() ], 422);
        }              
        
        $user =  User::where('email', '=', strtolower($request->get('email')))->first();
        
        if($user === null)
        {           
            // TODO global/general error handling
            return response()->json(['error' => 'User not found'], 406);
        }
        
        $this->reset($user, $request->password);             
                
        Mail::send('mail.password_change', ['user' => $user], function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject(__('passwords.passwordChange'));
        });

        return response()->json([
            'status' => 'ok',
            'token' => $JWTAuth->fromUser($user)
        ]);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    
    public function broker()
    {
        return Password::broker();
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param  ChangePasswordRequest  $request
     * @return array
     */
    protected function credentials(ChangePasswordRequest $request)
    {        
        $request->email = strtolower($request->email);
        return $request->only(
            'email', 'password', 'password_confirmation'
        );
    }

    /**
     * Change the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanChangePassword  $user
     * @param  string  $password
     * @return void
     */
    protected function reset($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
}
