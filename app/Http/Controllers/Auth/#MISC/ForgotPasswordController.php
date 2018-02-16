<?php

namespace App\Api\V1\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use App\Api\V1\Requests\Auth\ForgotPasswordRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ForgotPasswordController extends Controller
{
    public function sendResetEmail(ForgotPasswordRequest $request)
    {
        $user = User::where('email', '=', strtolower($request->email))->first();

        if(!$user) {
            throw new NotFoundHttpException();
        }

        $f               = $user->token;
        $broker          = $this->getPasswordBroker();
        $sendingResponse = $broker->sendResetLink( ['email' => strtolower($request->email)]);

        if($sendingResponse !== Password::RESET_LINK_SENT) 
        {
            throw new HttpException(500);
        }

        return response()->json([
            'status' => 'ok'
        ], 201);
    }

    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    private function getPasswordBroker()
    {
        return Password::broker();
    }
}
