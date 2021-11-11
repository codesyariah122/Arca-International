<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SendConfirmationEmailController extends Controller
{
    //
    public function sending_mail(Request $request)
    {
		$details = [
			'title' => 'Email Confirmation From Puji::WebDev',
			'name' => $request->name,
			'email' => $request->email
		];
	    try{
	    	Mail::to($details['email'])->send(new ConfirmationMail($details));
	    	return response()->json([
	    		'message' => 'Email confirmation has been send',
	    		'data' => $details
	    	], Response::HTTP_OK);
	    }catch(\Exception $e){
	    	return response()->json([
	    		'message' => $e->getMessage()
	    	]);
	    }
    }
}
