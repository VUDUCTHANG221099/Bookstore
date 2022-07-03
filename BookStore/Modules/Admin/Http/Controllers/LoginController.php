<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function login(Request $request){
        $user=User::where('email',$request->email)->first();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'rules'=>1])) {
            return response()->json(['success' =>'Đã đăng nhập thành công!','user'=>$user]);
        }else{
            return response()->json(['error' =>'Tài khoản hoặc mật khẩu không đúng!']);
        }
    }
  
    public function logout() {
        Cookie::queue(Cookie::forget('email'));

        return response()->json(['logout' =>Auth::logout()]);
    }
    public function Profile(Request $request) {
        // dd($request->all());
        $user=DB::table('users')->where('id',$request->id_profile)->update([
            'full_name'=>$request->admin_name_profile,
            'password'=>Hash::make($request->password_new)
        ]);
        // return response()->json(['success' =>'Đổi thông tin cá nhân thành công!']);
        // return response()->json(['logout' =>Auth::logout()]);

        

    }
}
