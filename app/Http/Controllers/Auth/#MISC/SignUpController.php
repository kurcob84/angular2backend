<?php

namespace App\Api\V1\Controllers\Auth;

use Mail;
use App\User;
use App\Publisher;
use HttpOz\Roles\Models\Role;
use Tymon\JWTAuth\JWTAuth;
use App\Recommend;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Api\V1\Requests\Auth\SignUpRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;
use App\Api\V1\Services\NotificationService as NotificationService;
use App\User_notification_channel;

class SignUpController extends Controller
{
    /**
     * - Registrierungsdaten auffangen
     * - User erstellen
     * - Email-Verifikationsmail senden
     * 
     * @param SignUpRequest $request
     * @param NotificationService $notificationService
     * @return type
     * @throws HttpException
     */
    
    public function signUp(SignUpRequest $request, NotificationService $notificationService) //JWTAuth $JWTAuth
    {
        $request->email = strtolower($request->email);
        $user = new User($request->all());
        $user->confirm_code_email = $this->getConfirm_code();
        $user->password = Hash::make($request->password);
//        
        if(!$user->save()) 
        {
            throw new HttpException(500);
        }
        
        $user->areas()->withTimestamps()->sync($request->area_id);
        
        
//        
        $unverified_user = Role::whereSlug('UNVERIFIED_USER')->first();
        $user->attachRole($unverified_user);
        
        // Wenn erster Nutzer in einem Verlag, als Ansprechpartner für publisher setzen
        $isAdmin = false;
        $publisher = Publisher::find(intval($user->publisher_id));
        if($publisher->contact_user_id == null) 
        {
            $publisher->contact_user_id = $user->id;
            $publisher->save();
            $company_editor = Role::whereSlug('COMPANY_EDITOR')->first();
            $user->attachRole($company_editor);
            $isAdmin = true;
        }
                
        // Registrierung nach Einladung
//        $recommend = Recommend::where('email', $user->email)
//                     ->get();
//        if(!is_null($recommend) && $recommend->count() > 0) 
//        {
//            Recommend::where('email', $user->email)->update(['registered' => 1]);
//            
//            foreach($recommend as $r)
//            {
//                $userInvited = User::find($r['user_id']);
//                if(!is_null($userInvited))
//                {    
//                    $notificationService->createNotification($userInvited->id, 11, $user->id);
//                }
//            }
//        }

        for ($i = 0; $i < 2; $i++) {
            $notificationChannel = new user_notification_channel();
            $notificationChannel->user_id = $user->id;
            $notificationChannel->notification_channel_id = $i + 1;
            $notificationChannel->save();
        }

        // Mail zur E-Mail-Verifikation senden
        // Admin: dann Admin-Mail
        if($isAdmin)
        {
            // 
            Mail::send('mail.signup.admin_toUser', ['user' => $user], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.confirmEmail'));});
        }
        else 
        {
            // Wir brauchen noch den Publisher+SuperUser in der E-Mail
            $publisher = Publisher::with('contactperson')->where('id', $request->publisher_id)->first();
            
            Mail::send('mail.signup.employee_toUser', ['user' => $user, 'publisher' => $publisher], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.confirmEmail'));});        
        }
        
        return response()->json([
            'status' => 'ok'
        ], 201);
    }
    
    /**
     * calculates a random string
     * 
     * @return type
     */
    protected function getConfirm_code()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
    
    /**
     * rejects user with help of confimration code -> User will be (soft-)deleted!!
     * 
     * @param type $confirmation_code
     * @throws InvalidConfirmationCodeException
     */
    public function rejectUser($confirmation_code, $reason = null)
    {
        if( !$confirmation_code)
        {
            throw new HttpException(404);
        }

        $user = User::with('roles')->whereConfirmCodeUser($confirmation_code)->first();

        if ($user === null)
        {
           throw new HttpException(404);
        }        
                
        // check if registered as COMPANY_EDITOR
        $isAdmin = false;
        foreach( $user->roles as $role)
        {
            if($role['slug'] ===  "COMPANY_EDITOR")
            {
               $isAdmin = true; 
            }
        }
        
        $user->confirm_code_user  = null;        
        $user->confirmed_at       = null;   
        $user->rejected_at        = Carbon::now();
        $user->reject_reason      = $reason; 
        $user->save(); 
        
        $user->delete();    // delete gives user option to try again
        
        // now send emails            
        if($isAdmin)
        {   
            Mail::send('mail.signup.admin_reject', ['user' => $user], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.userRejected'));});
        }
        else 
        {
           // Wir brauchen noch den Publisher+SuperUser in der E-Mail
           $publisher = Publisher::with('contactperson')->where('id', $user->publisher_id)->first();  
            
           Mail::send('mail.signup.employee_reject', ['user' => $user, 'publisher'=>$publisher ], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.userRejected'));});
        } 
        
        return response()->json([
            'status' => 'ok'
        ], 201);
    }
    
    /**
     * confirms user with help of confimration code -> User will be enabled/confirmed/active/ready-to-login when successful
     * 
     * @param type $confirmation_code
     * @throws InvalidConfirmationCodeException
     */  
    public function confirmUser($confirmation_code)
    {        
        $notificationService = new NotificationService();
        if( !$confirmation_code)
        {
            throw new HttpException(404);
        }

        $user = User::with('roles')->whereConfirmCodeUser($confirmation_code)->first();

        if ($user === null)
        {
            throw new HttpException(404);
        }        
                
        // check if registered as COMPANY_EDITOR
        $isAdmin = false;
        foreach( $user->roles as $role)
        {
            if($role['slug'] ===  "COMPANY_EDITOR")
            {
               $isAdmin = true; 
            }
        }        
        
        // set role as (confirmed) user
        $verified_user = Role::whereSlug('USER')->first();
        $user->attachRole($verified_user);
        
        $user->confirm_code_user  = null;        
        $user->confirmed_at       = Carbon::now();
        $user->save();
        
        
        
        //if new user was recommended, send notification
        $recommend = Recommend::where('email', $user->email)
                     ->get();
        if(!is_null($recommend) && $recommend->count() > 0) 
        {
            Recommend::where('email', $user->email)->update(['registered' => 1]);
            
            foreach($recommend as $r)
            {
                $userInvited = User::find($r['user_id']);
                if(!is_null($userInvited))
                {    
                    $notificationService->createNotification($userInvited->id, 11, $user->id);
                }
            }
        }
        // user enabled!
        // now send emails to user        
        if($isAdmin)
        { 
            Mail::send('mail.signup.admin_confirm', ['user' => $user], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.userConfirmed'));});
        }
        else 
        {
           Mail::send('mail.signup.employee_confirm', ['user' => $user], function ($m) use ($user)
            {$m->to($user->email, $user->name)->subject(__('auth.userConfirmed'));});
        }
        
        return response()->json([
            'status' => 'ok'
        ], 201);
    }
    
    /**
     * 
     * @param String $confirmation_code
     * @return type
     * @throws InvalidConfirmationCodeException
     */
    public function confirmEmail($confirmation_code, NotificationService $notificationService)
    {        
        if( !$confirmation_code)
        {
            throw new HttpException(404);
        }

        $user = User::with('roles')->whereConfirmCodeEmail($confirmation_code)->first();

        if ($user === null)
        {
            throw new HttpException(404);
        }        
        $user->confirm_code_email = null;
        
        // check if registered as COMPANY_EDITOR
        $isAdmin = false;
        foreach( $user->roles as $role)
        {
            if($role['slug'] ===  "COMPANY_EDITOR")
            {
               $isAdmin = true; 
            }
        }
        // email confirmed -> now generate user-verfication-token and
        // send emails to coresponding admin
        $user->confirm_code_user = $this->getConfirm_code();
        $user->save();       
        
        // is admin? send mail for user verfication to site admin, otherwise to company editor
        if($isAdmin)
        {        
            // build fake user for salutation in email
            $salutation_user = new User();
            $salutation_user->firstname = "Mehrwertmacher";
            $salutation_user->surname = "";
            $salutation_user->salution= "MALE";
            
            // site admin has to check!
            Mail::send('mail.signup.admin_toAdmin', ['user2' => $user, 'user' => $salutation_user], function ($m) use ($user)
            {$m->to( config('mail.mailmaster') , 'Mehrwertmacher')->subject(__('auth.confirmUser'));});
        }
        else 
        {
            // company editor has to check!
            $publisher = Publisher::with('contactperson')->where('id', $user->publisher_id)->first();
            
            $salutation_user = $publisher->contactperson;
            
            Mail::send('mail.signup.employee_toAdmin', ['user2' => $user, 'user' => $salutation_user], function ($m) use ($salutation_user)
            {$m->to( $salutation_user['email'], $salutation_user['name'])->subject(__('auth.confirmUser'));});   
            
            // Notification an Kontaktperson des Unternehmens            
            $notificationService->createNotification($publisher->contactperson['id'], 12, $user->id);
        }        
        
        return response()->json([
            'status' => 'ok'
        ], 201);
    }
}