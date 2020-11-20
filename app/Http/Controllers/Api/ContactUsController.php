<?php

namespace App\Http\Controllers\api;

use App\Models\contactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ContactUsController
{
    public function index()
    {
        $contactus = contactUs::all();
        return response()->json($contactus);
    }
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'description' => 'required',
        ]);
        if ($v->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $v->errors()
            ], 422);
        }
        $contact=new contactUs();
        $contact->name=$request->get('name');
        $contact->email=$request->get('email');
        $contact->description=$request->get('description');
        $contact->save();
        return response()->json("success");
    }

}
