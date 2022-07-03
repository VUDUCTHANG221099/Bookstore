<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shipper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RegisterController extends Controller
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
        

    }
    public function index()
    {
        return view('register');
    }
    public function register(Request $request)
    {
        $user = User::where('email', $request->RegisterEmailFE)->first();
        if ($user) {
            return response()->json(['error' => 'Email đã tồn tại!']);
        } else {
            DB::table('users')->insert([
                'full_name' => $request->RegisterfullnameFE,
                'email' => $request->RegisterEmailFE,
                'password' => Hash::make($request->RegisterPasswordFE),
                'rules' => 0
            ]);
            $viewData = [
                'emailRegister' => $request->RegisterEmailFE,
                'Login' => route('loginViewFE'),
                'index' => route('index'),
            ];
            $emailRegister = $request->RegisterEmailFE;
            Mail::send('email.register', $viewData, function ($email) use ($emailRegister) {
                $email->subject('Thông tin đăng ký tài khoản tại SkyBook');
                $email->to($emailRegister);
            });
            return response()->json(['success' => 'Đăng ký thành công']);
        }
    }
    public function SendEmailRegister()
    {
     
        $countShipper=DB::table('shipper')->count();
        dd(rand(1,Shipper::count()));
        $cart = DB::table('sessions')->where('id_book',10)->count();
        if($cart>0){

            return 50;
        }else{
            return 10;
        }

        
        // return session()->get('id_code');
        // session()->flush('cart');
        // dd(session()->get('cart')[]['quantity']);

        // return view('email.forgotPassword');

        // $sha256=Str::random(50);
        // return hash('sha256',$sha256);
    }
}
