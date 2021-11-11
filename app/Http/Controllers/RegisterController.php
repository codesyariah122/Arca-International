<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    //
    public function register(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    		'name' => 'required',
    		'email' => 'required|email|unique:users',
    		'password' => 'required|min:8|confirmed'
    	]);

    	if($validator->fails()){
    		return response()->json($validator->errors(), 400);
    	}

        try{
            $user = new User();
            $user->name = strtolower($request->get('name'));
            $user->email = $request->get('email');
            $user->password = Hash::make($request->get('password'));
            $user->roles = json_encode(["USER"]);
            $user->avatar = $request->get('avatar');
            $user->status = 'INACTIVE';
            $user->save();

            $userID = $user->id;

            $details = [
                'title' => 'Email Activation From Arca International',
                'url' => 'http://localhost:8000/activation/'.$userID,
                'name' => $user->name,
                'email' => $user->email,
                'password' => $request->password
            ];


            Mail::to($user->email)->send(new ConfirmationMail($details));
            return response()->json([
                'success' => true,
                'message' => '<b>Register Success! </b> <br/> untuk aktivasi silahkan buka email anda dan klik link aktivasi yang telah kami kirim ke email anda.',
                'data' => $user
            ], Response::HTTP_OK);
        }catch(\Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }

    }

    public function check_register(Request $request, $id)
    {
        $user = User::findOrFail($id);
        try{
            return response()->json([
                'message' => 'Check User Register',
                'data' => $user
            ]);
        }catch(Exception $e){
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function activation_view($id)
    {
        $user = User::findOrFail($id);
        $context = [
            'title' => 'Arca::Backend | Test::Backend',
            'favico' => 'https://www.arcacorp.com/img/arca_logo_small.png',
            'canonical' => 'https://www.arcacorp.com/',
            'meta_desc' => 'PT Arca International - Arca International Corporation',
            'meta_key' => 'PT Arca International - Arca International Corporation',
            'meta_author' => 'Arca::Backend | Test::Backend',
            'og_url' => 'https://www.arcacorp.com/',
            'og_type' => 'website',
            'og_site_name' => 'Arca::Backend | Test::Backend',
            'og_title' => 'Arca::Backend | Test::Backend',
            'og_desc' => 'PT Arca International - Arca International Corporation',
            'og_image' => 'https://www.arcacorp.com/img/arca_logo.png',
            'og_image_width' => '600',
            'og_image_height' => '590',
            'data' => $user
        ];
        return view('webpage.home.activation', $context);
    }

    public function activation(Request $request, $id)
    {
    	$user = User::findOrFail($id);

        if($user->status === "INACTIVE"){
        	$user->status = $request->status;

        	$user->save();

            $context = [
                'title' => 'Arca::Backend | Test::Backend',
                'favico' => 'https://www.arcacorp.com/img/arca_logo_small.png',
                'canonical' => 'https://www.arcacorp.com/',
                'meta_desc' => 'PT Arca International - Arca International Corporation',
                'meta_key' => 'PT Arca International - Arca International Corporation',
                'meta_author' => 'Arca::Backend | Test::Backend',
                'og_url' => 'https://www.arcacorp.com/',
                'og_type' => 'website',
                'og_site_name' => 'Arca::Backend | Test::Backend',
                'og_title' => 'Arca::Backend | Test::Backend',
                'og_desc' => 'PT Arca International - Arca International Corporation',
                'og_image' => 'https://www.arcacorp.com/img/arca_logo.png',
                'og_image_width' => '600',
                'og_image_height' => '590',
                'message' => $user->name.', email anda : '.$user->email.' berhasil di aktivasi.',
                'data' => $user,
                'login' => env('FRONT_END').'/login'
            ];
        	try{
                return view('webpage.home.activation_success', $context);
        		// return response()->json([
        		// 	'message' => $user->name.', email anda : '.$user->email.' berhasil di aktivasi.',
        		// 	'data' => $user,
          //           'login' => 'http://localhost:8080/login'
        		// ]);
        	}catch(\Exception $e){
        		return response()->json([
        			'message' => 'Aktivasi gagal : '.$e->getMessage()
        		]);
        	}
        }else{
            return redirect()->route('home.page')->with('status', $user->name.', has been activated');
        }
    }
}
