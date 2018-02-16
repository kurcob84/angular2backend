<?php

namespace App\Api\V1\Controllers\Auth;

use App\User;
use App\Api\V1\Requests\Auth\UserAvailableRequest;
use App\Http\Controllers\Controller;

class UserAvailableController extends Controller
{
    public function exists(UserAvailableRequest $request) //JWTAuth $JWTAuth
    {
        $email = strtolower( $request->email);
        
        $user = User::where('email', $email)->first();
        if ($user === null) {
            return response()->json([
                'status' => 'ok',
                'message' => 'FORMVALID_USER',
                'usernameAvailable' => false
            ], 201);
        }
        else {
            return response()->json([
                'status' => 'ok',
                'message' => '',
                'usernameAvailable' => true
            ], 201);
        }
    }
}