<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Models\Coupon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AuthController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    
    protected function registered(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|max:10|min:10|unique:users',
            'password' => 'required|string|min:8',
            'refer_code' => 'nullable|string|exists:users,refer_code',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $refer =strtoupper(substr(trim($request->name),0,3).rand(0,9).rand(0,9).Str::random(2).rand(0,9));
        $checkRefer=User::where('refer_code',$request->refer_code)->first();
        if(!isset($checkRefer)){
            $referCode=$refer;
        }
        else{
            $referCode=strtoupper(substr(trim($request->name),0,3).rand(0,9).rand(0,9).Str::random(2).rand(0,9));
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'refer_code' => $referCode,
            'referel_by' => isset($checkRefer)?$checkRefer->id:0,
        ]);
       
        $user->wallet_balance+=0;
        $user->save();
        // if(isset($request->refer_code)){
        //     $oldUser =User::where('refer_code',$request->refer_code)->first();
        //     $oldUser->wallet_balance+=50;
        //     $oldUser->save();
        // }

        return response()->json($user, 201);
    
    }
    protected function authenticated(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success'=>true,
            'access_token' => $token,
            'user' => $user,
            'token_type' => 'Bearer',
        ]);
    }
    
}

