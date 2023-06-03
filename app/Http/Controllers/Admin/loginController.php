<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\register;

class loginController extends Controller
{

    public function login($email, $password)
    {
        $result = register::where(['email' => $email, 'password' => $password])->get();


       if (!$result->isEmpty()) {
            return "başarılı bir şekilde giriş yapıldı";
        } else {
            return "kullanıcı adınızı veya şifrenizin hatalıdır";
        }

    }
    
    
}
