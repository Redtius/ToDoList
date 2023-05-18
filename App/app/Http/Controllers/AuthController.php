<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{

    public function register(Request $request){
        $fields = $request->validate([
            'fname' => 'required|string',
            'lname'=>'required|string',
            'username'=>'required|string|unique:users,username',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ]);

        $user = User::query()->create([
            'fname'=>$fields['fname'],
            'lname'=>$fields['lname'],
            'username'=>$fields['username'],
            'email'=>$fields['email'],
            'password'=>bcrypt($fields['password'])
            ]);

        $token = $user->createToken('todoliststoken')->plainTextToken;
        return \response([
            'user'=>$user,
            'token'=>$token
        ],201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

    public function login(Request $request){
        $fields = $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $user = User::query()->get()->where('email','=',$fields['email'])->first();

        if(!$user || !Hash::check($fields['password'],$user['password'])){
            return response([
                'message'=>'Bad Credentiels'
            ],401);

        }

        $token =$user->createToken('todoliststoken')->plainTextToken;
        return \response([
            'user'=>$user,
            'token'=>$token
        ],201);


    }
}
