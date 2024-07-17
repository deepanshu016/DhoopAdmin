<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class AuthService {


    public function login(Object $request){
        if (Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return true;
        }else{
            return false;
        }
    }
 }


?>
