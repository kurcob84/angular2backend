<?php

namespace App\Api\V1\Controllers\Auth;

use Config;
use App\User;
use Mail;
use Tymon\JWTAuth\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Api\V1\Requests\Auth\ResetPasswordRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResetPasswordController extends Controller
{   
    private $user;
    
    public function resetPassword(ResetPasswordRequest $request, JWTAuth $JWTAuth)
    {
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->user = $user;
                $this->reset($user, $password);
            }
        );
        
        if($response !== Password::PASSWORD_RESET) {
            throw new HttpException(500);
        }         

        Mail::send('mail.password_reset', ['user' => $this->user], function ($m)
        {
            $m->to($this->user->email, $this->user->name)
              ->subject(__('passwords.passwordReset'));
        });

        return response()->json([
            'status' => 'ok',
            'token' => $JWTAuth->fromUser($this->user)
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
     * @param  ResetPasswordRequest  $request
     * @return array
     */
    protected function credentials(ResetPasswordRequest $request)
    {   
        $request->email = strtolower($request->email);
        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    }

    /**
     * Reset the given user's password.
     *
     * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
     * @param  string  $password
     * @return void
     */
    protected function reset($user, $password)
    {
        $user->password = Hash::make($password);
        $user->save();
    }
}
