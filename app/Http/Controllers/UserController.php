<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Hash;

use App\GeneratedTokens;


class UserController extends Controller
{

    function index(Request $request)
    {
        //dd( $request->all() );

        $user= User::where('email', $request->email)->first();
       
        //dd( $request->email, $user );

        if (! $user ) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        // if (! $user || !Hash::check($request->password, $user->password) ) {
        //     return response([
        //         'message' => ['These credentials do not match our records.']
        //     ], 404);
        // }
    
        $token = $user->createToken('my-app-token')->plainTextToken;

        $arrToken = explode("|",$token);


        //Save token data in another DB
        $tokenData = new GeneratedTokens();
        $tokenData->user_id     = $user->id;
        $tokenData->user_mail   = $user->email;
        $tokenData->raw_token   = $token;
        $tokenData->token_id    = $arrToken[0];
        $tokenData->saved_token = $arrToken[1];
        $tokenData->save();

    
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
        return response($response, 201);
    }

    public function userToken(Request $request){

        $user= User::where('email', $request->email)->first();

        $token = $user->tokens()->delete();

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }


    public function checkAbility(Request $request){

          $user= User::where('email', $request->email)->first();
  

          dd( $user, $user->tokenCan('server:update') );

  
          if ( $user->tokenCan('server:update') ) {
               
            return 'View Access';

          }
      
          return 'Ability not working';
  
      }


    function users(){

        return User::all();

    }


}
