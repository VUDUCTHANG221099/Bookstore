<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    use HasFactory;
    protected $table="payment";
    protected $guarded = [];
    //List Payment
    public function ListPay(){
        $pay=Payment::join('users','payment.id_users','users.id')->orderby('payment.vnp_PayDate' ,'desc')->get();
        return $pay;
    }
    //FE
    public function Addpayment($id_code,$id_users,$vnp_Amount,$vnp_BankCode,$vnp_BankTranNo,$vnp_CardType,$vnp_OrderInfo,$vnp_PayDate,$vnp_SecureHash){
        DB::table('payment')->insert([
            'id_code' => $id_code,
            'id_users' => $id_users,
            'vnp_Amount' => $vnp_Amount,
            'vnp_BankCode' => $vnp_BankCode,
            'vnp_BankTranNo' => $vnp_BankTranNo,
            'vnp_CardType' => $vnp_CardType,
            'vnp_OrderInfo' => $vnp_OrderInfo,
            'vnp_PayDate' => date('Y-m-d H:i:s', strtotime($vnp_PayDate)),
            'vnp_SecureHash' => $vnp_SecureHash,
        ]);
    }
    // //Add Payment
    // public function AddPay($payment){
    //     DB::table('payment')->insert(['payment_name'=>$payment]);
    // }
    // //Get Payment 
    // public function GetPay($payment){
    //     return Payment::where('payment_name',$payment)->first(); 
    // }
    // //Get Payment ID
    // public function GetPayID($id){
    //     return Payment::find($id);
    // }
    // //Update Payment
    // public function UpdatePay($id,$payment){
    //     DB::table('payment')->where('id',$id)->update(['payment_name'=>$payment]);
    // }

}
