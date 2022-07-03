<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Payment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    private $payment;
    public function __construct(){
        $this->payment = new Payment();
    }
    public function index()
    {
        $payment=$this->payment->listPay();
        
        $viewData = [
            'count'=>1,
            'payment' => $payment,
        ];
        return view('admin::payment',$viewData);
    }

    // public function AddPay(Request $request){
    //     $pay=$this->payment->GetPay($request->payment_name);
    //     if ($pay) {
    //         return response()->json(['error' => 'Phương thức thanh toán đã tồn tại!']);
    //     } else {
    //         $pay = $this->payment->AddPay($request->payment_name);
    //         return response()->json(['success' => 'Thêm phương thức thành công!']);
    //     }
    // }

    // public function GetPay(Request $request){
    //     $pay= $this->payment->GetPayID($request->id);
    //     return response()->json(['payment' => $pay]);

    // }
    // public function UpdatePay(Request $request){
    //     $pay=$this->payment->GetPay($request->payment_name);
    //     if ($pay) {
    //         return response()->json(['error' => 'Phương thức thanh toán đã tồn tại!']);
    //     } else {
    //         $pay = $this->payment->UpdatePay($request->id_payment,$request->payment_name);
    //         return response()->json(['success' => 'Cập nhật phương thức thanh toán thành công!']);
    //     }
    // }

   
    // public function destroy(Request $request)
    // {
    //     $pay = Payment::find($request->id);
    //     $pay->delete();
    //     return response()->json(['success' => 'Xóa thành công!']);

    // }
}
