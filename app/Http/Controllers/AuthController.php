<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;
use App\Models\User;
Class AuthController extends Controller {

    public function __construct()
    {
        // $this->middleware('guest')->except('logout');
    }

    public function index(Request $request){
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $auth = new AuthService();
        $login = $auth->login($request);
        if($login){
            $user = User::find(auth()->user()->id);
            return response()->json(['status'=>200,'msg'=>'Logged in successfully','url'=>route('admin.dashboard')]);
        }else{
            return response()->json(['status'=>400,'msg'=>'Credentials not matched','data'=>[],'url'=>'']);
        }
    }

    public function store(Request $request)
    {
        $settings = new AuthService();
        // $settings = $settings->store($request);
        // if($settings){
        //     return response()->json(['status'=>200,'msg'=>'Action performed successfully !!','data'=>$settings,'url'=>route('settings')]);
        // }
        return response()->json(['status'=>400,'msg'=>'Something went wrong','data'=>[],'url'=>'']);
    }
}
