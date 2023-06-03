<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\emailMailable;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\register;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Admin\registerController;

class emailController extends Controller
{
    public function send($email)
    {
        $rakam = rand(10000, 99999);   
        $resul = Mail::to($email)->send(new emailMailable($rakam));
        if($resul)
        {
            return $rakam;
        }
        else 
        {
            return 0;
        }
    }

   
}
