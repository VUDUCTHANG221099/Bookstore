<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;




class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->emailFE, 'password' => $request->passwordFE, 'rules' => 0])) {
            session()->put('book_token', Str::random(40));
            $user = User::where('email', $request->emailFE)->first();
        //    session()->put('customers_user',$user);
           
            return response()->json(['success' => 'Đăng nhập thành công', 'user' => $user]);
        } else {
            return response()->json(['error' => 'Tài khoản hoặc mật khẩu chưa đúng!']);
        }
    }
    public function logout()
    {
        Cookie::queue(Cookie::forget('emailFE'));
        
        return response()->json(Auth::logout());
    }
    public function ChangePassFE(Request $request)
    {
        $user = User::find($request->id);
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return response()->json(['success' => 'Đổi mật khẩu thành công!']);
        }
        Cookie::queue(Cookie::forget('emailFE'));
        return response()->json(Auth::logout());
    }
    public function forgotPassword(Request $request)
    {
        $user = User::where(['rules' => 0, 'email' => $request->EmailForgot])->first();
        if ($user) {
            $token = Str::upper(Str::random(20));
            $request->session()->put('token', $token);
            $token_session = $request->session()->get('token');

            $viewData = [
                'name' => $user->full_name,
                'email' => $request->EmailForgot,
                'token' => $token_session,
                'user_id' => $user->id,
            ];
            $EmailForgot = $request->EmailForgot;
            Mail::send('email.forgot', $viewData, function ($email) use ($EmailForgot) {
                $email->subject('Thiết lập lại mật khẩu của tài khoản khách hàng');
                $email->to($EmailForgot);
            });
            // view('email.forgot')
            return response()->json(['success' => 'Chúng tôi đã gửi cho bạn một email!']);
        } else {
            return response()->json(['error' => 'Email không tồn tại!']);
        }
    }
    public function reset_password()
    {
        $user = User::where(['email' => request()->get('email')])->first();
        if (request()->session()->get('token')==request()->get('token')) {

            if ($user) {
                if ($user->id == request()->get('id')) {
                    return view('email.reset_password');
                }
                else {
                    return abort(404);
                }
            }
            else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }
    public function Postreset_password(Request $request){
       $user=User::where(['email'=>$request->email])->first();
       if($user){
           $user->password=Hash::make($request->Password);
           $user->save();
           return response()->json(['success'=>'Cập nhật mật khẩu thành công']);
       }
    }
}
