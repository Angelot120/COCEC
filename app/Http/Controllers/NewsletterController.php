<?php

namespace App\Http\Controllers;

use App\Mail\NewsLettersMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NewsletterController extends Controller
{
    // Subscribe to the newsletter
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email:rfc,dns|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Adresse e-mail invalide.'
            ], 422);
        }

        DB::table('newsletter_subscribers')->updateOrInsert(
            ['email' => $request->email],
        );

        Mail::to($request->email)->send(new NewsLettersMail($request->email));


        return response()->json([
            'status' => 'success',
            'message' => 'Merci pour votre inscription !'
        ]);
    }
}
