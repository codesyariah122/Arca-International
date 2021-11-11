<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
   public function login(Request $request)
   {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::where('email', $request->email)->first();

        if(!$user){
            return response()->json([
                'success' => false,
                'message' => 'Login Failed! Akun belum terfaftar'
            ]);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Login Failed! Password atau email salah',
            ]);
        }

        if($user->status === "INACTIVE"){
            return response()->json([
                'success' => false,
                'message' => 'Login Failed! akun anda belum di aktivasi'
            ]);
        }


        return response()->json([
            'success' => true,
            'message' => 'Login Success!',
            'data'    => $user,
            'token'   => $user->createToken('authToken')->accessToken
        ], 201);
    }

    /**
     * logout
     *
     * @param  mixed $request
     * @return void
     */
    public function logout(Request $request)
    {
        $removeToken = $request->user()->tokens()->delete();

        if($removeToken) {
            return response()->json([
                'success' => true,
                'message' => 'Logout Success!',
            ]);
        }
    }

    public function details($id)
    {
        $user = User::findOrFail($id);
        try{
            return response()->json([
                'message' => 'Detail data user',
                'data' => $user
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => 'Error fetch detail user',
                'data' => $e->getMessage()
            ]);
        }
    }
}
