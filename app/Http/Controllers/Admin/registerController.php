<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\register;
use Illuminate\Support\Facades\Mail;
use App\Mail\emailMailable;



class registerController extends Controller
{
    //
    public function register(Request $request)
    {
        $result = register::insert([

            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "password" => $request->password,

        ]);
        if ($result) {

            // $rakam = rand(10000, 99999);
            
            //  // E-posta gönderimi
            //  Mail::to($request->email)->send(new emailMailable($rakam));

            return 'seccuss';
        } else {
            return 'error';
        }
    }
    public function getUser()
    {
        // Kullanıcıyı döndür veya null döndür
        return auth()->user();
    }
}
