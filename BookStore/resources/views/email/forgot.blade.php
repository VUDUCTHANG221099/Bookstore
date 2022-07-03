<div style="padding:20px 10px 15px 10px"><div class="adM">
		
</div><p>Xin chào {{$name}},</p>

<p>Anh/chị đã yêu cầu đổi mật khẩu tại <strong>SkyBook</strong>.</p>

<p>Anh/chị vui lòng truy cập vào liên kết dưới đây để thay đổi mật khẩu của Anh/chị nhé.</p>

<div style="margin-top:25px"><span style="padding:14px 35px;background:#357ebd">
    
    <a href="{{ route('reset_password', ['email'=>$email,'token'=>$token,'id'=>$user_id]) }}" style="font-size:16px;text-decoration:none;color:#fff" target="_blank" >Đặt lại mật khẩu</a></span></div>
<hr>
<p style="text-align:right">Nếu Anh/chị có bất kỳ câu hỏi nào, xin liên hệ với chúng tôi tại 
    <a href="mailto:php.laravel.serve@gmail.com" style="color:#357ebd" target="_blank">php.laravel.serve@gmail.com</a></p>

<p style="text-align:right"><i>Trân trọng,</i></p>

<p style="text-align:right"><strong>Ban quản trị cửa hàng SkyBook</strong></p>
</div>