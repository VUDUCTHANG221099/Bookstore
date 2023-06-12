<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Shipper;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class PaymentController extends Controller
{
    private $order, $payment;
    public function __construct()
    {
        $this->order = new Order();
        $this->payment = new Payment();
    }
    public function checkout($token)
    {
        if ($token == session()->get('book_token')) {
            // dd(count(session()->get('cart'))>0?1:0);
            // 
            $shipper = DB::table('shipper')->get();

            $datetime = Carbon::now();
            // dd($datetime);
            session()->put('datetime', $datetime);
            $user = Auth::user();
            $customer = Customer::where(['users_id' => $user->id, 'status' => 1])->first();
            if (empty($customer)) {
                return redirect()->route('profileFEAddress');
            } else {

                $province = DB::table('province')->where('id', $customer->province_id)->first();
                $district = DB::table('district')->where('id', $customer->district_id)->first();
                $ward = DB::table('ward')->where('id', $customer->ward_id)->first();
                // $shipper = Shipper::all();
                $cart = DB::table('sessions')->where('user_id', $user->id)->get();
                $quantity = DB::table('sessions')->where('user_id', $user->id)->selectRaw('sum(quantity) as quantity')->first()->quantity;
                $total = DB::table('sessions')->where('user_id', $user->id)->selectRaw('sum(quantity*(price-3000)) as total')->first()->total;

                // if (isset($cart) and count($cart) > 0) {
                //     foreach ($cart as $id => $book) {
                //         $quantity += $book['quantity'];
                //         $total += $book['price'] * $book['quantity'];
                //     }
                // }
                $viewData = [
                    'user' => $user,
                    'customer' => $customer,
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                    'cart' => $cart,
                    'quantity' => $quantity,
                    'total' => $total,
                    'shipper' => $shipper,
                    'datetime' => $datetime,
                ];
            }



            return view('checkout', $viewData);
        } else {
            return view('errors.404');
        }
    }
    public function orderBook(Request $request, $token)
    {
        // try {

        if ($token == session()->get('book_token')) {

            $cart = DB::table('sessions')->where('user_id', Auth::user()->id)->get();


            if (isset($cart) and count($cart) > 0) {
                $messages = [
                    'paymentMethod.required' => "<p style='color:red;' class='errpaymentMethod'>Bạn chưa chọn phương thức thanh toán!</p>",
                    'shipper.required' => "<p style='color:red;' class='errshipper'>Bạn chưa chọn đơn vị vận chuyển!</p>",

                ];
                $request->validate([
                    'paymentMethod' => 'required',
                    'shipper' => 'required',

                ], $messages);
                DB::table('sessions')->where('user_id', Auth::user()->id)->update(['id_shipper' => $request->shipper]);

                // session()->put('shipper', $request->shipper);
                $payment = $request->paymentMethod;
                $paymentName = "";
                if ($payment == 0) {
                    $paymentName = "Thanh toán khi giao hàng (COD)";
                    // dd($request->all());
                    return redirect()->route('Thankyoucod', ['token_cod' => session()->get('book_token')]);
                } else {
                    // dd($request->amount);

                    $paymentName = "Thanh toán qua VNPAY";
                    if(empty($request->order_type)){
                        return redirect()->back();
                    }
                    // $messages = [
                    //     'order_type.required' => "<p style='color:red;'>Bạn không được để trống loại hàng hóa!</p>"
                    // ];
                    // // session()->put('shipper', $request->shipper);

                    // $request->validate([
                    //     'order_type' => 'required',
                    // ], $messages);

                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');

                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = route('vnpay', ['token_vnpay' => session()->get('book_token')]);
                    $vnp_TmnCode = "Y4U88XFK";
                    // "ZFY9V6CA"; //Mã website tại VNPAY 
                    $vnp_HashSecret = "DTHXNFNBUMNKFKQOZVHTXUXNUQUUXMTV";
                    // "XJCMUWEZJXCFSCGEMQHXPGKVPHJXCKWH"; //Chuỗi bí mật

                    $vnp_TxnRef = $request->order_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
                    $vnp_OrderInfo = $request->order_desc;
                    $vnp_OrderType = $request->order_type;
                    $vnp_Amount = str_replace(',', '', $request->amount) * 100;
                    // $vnp_Amount =  $request->amount;

                    $vnp_Locale = $request->language;
                    $vnp_BankCode = $request->bank_code;
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

                    $inputData = array(
                        "vnp_Version" => "2.0.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,


                    );

                    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                        $inputData['vnp_BankCode'] = $vnp_BankCode;
                    }
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . $key . "=" . $value;
                        } else {
                            $hashdata .= $key . "=" . $value;
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }

                    $vnp_Url = $vnp_Url . "?" . $query;
                    if (isset($vnp_HashSecret)) {
                        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
                        $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
                        $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
                    }
                    $returnData = array(
                        'code' => '00', 'message' => 'success', 'data' => $vnp_Url
                    );
                    if (isset($_POST['redirect'])) {
                        header('Location: ' . $vnp_Url);
                        die();
                    } else {
                        echo json_encode($returnData);
                    }
                }
            }
            // session()->forget('book_token');
        } else {
            return view('errors.404');
        }
        return view('errors.404');
        // } catch (\Throwable $th) {
        //     //throw $th;
        //     dd(4000);
        // }
    }
    public function Thankyoucod($token_cod)
    {

        if ($token_cod == session()->get('book_token')) {
            // 

            // dd(session()->get('shipper'));
            // $id_shipper = rand(1, Shipper::count());
            $datetime = session()->get('datetime');
            $cart = DB::table('sessions')->where('user_id', Auth::user()->id)->get();

            $id_code = DB::table('sessions')->where('user_id', Auth::user()->id)
                ->groupBy('id_code', 'id_shipper')->select('id_code', 'id_shipper')->first();
            $user = Auth::user();
            $shipper = Shipper::find($id_code->id_shipper);
            $customer = Customer::where(['users_id' => $user->id, 'status' => 1])->first();
            $province = DB::table('province')->where('id', $customer->province_id)->first();
            $district = DB::table('district')->where('id', $customer->district_id)->first();
            $ward = DB::table('ward')->where('id', $customer->ward_id)->first();
            $paymentName = "Thanh toán khi giao hàng (COD)";





            if (isset($cart) and count($cart) > 0) {
                foreach ($cart as  $book) {
                    // dd($book);
                    $this->order->AddOrder(
                        $id_code->id_code,
                        $customer->id,
                        $book->id_book,
                        $book->quantity,
                        $paymentName,
                        $id_code->id_shipper,
                        $datetime
                    );
                    $checkQuantity = DB::table('book')->Join('order', 'order.book_id', 'book.id')
                        ->where('order.book_id', $book->id_book)->select('book.quantity')->first();
                    // $checkQuantity = DB::table('book')->Join('order', 'order.book_id', 'book.id')
                    // ->where('order.book_id', $book->id_book)->select('book.quantity')->first();


                    // dd();
                    if ($checkQuantity->quantity > 0) {
                        $quantitySum = $checkQuantity->quantity - $book->quantity;
                        DB::table('book')->Join('order', 'order.book_id', 'book.id')
                            ->where('order.book_id', $book->id_book)->update(
                                ['book.quantity' => $quantitySum]
                            );
                    } else {
                        DB::table('book')->Join('order', 'order.book_id', 'book.id')
                            ->where('order.book_id', $book->id_book)->update(
                                ['book.status' => 0]
                            );
                    }
                    // dd($checkQuantity->quantity);

                    //    echo $checkQuantity;
                    // $quantity += $book['quantity'];
                    // dd($quantity);



                    // DB::table('order')->insert([
                    //     "id_code" => $id_code,
                    //     "customer_id" => $customer->id,
                    //     'book_id' => $book->id_book,
                    //     'quantity' => $book->quantity,
                    //     'payment' => $paymentName,
                    //     'shipper_id' => session()->get('shipper'),
                    //     'date_order' => $datetime,
                    //     'status' => 1,
                    //     'created_at' => $datetime,
                    //     'updated_at' => $datetime,
                    // ]);
                }
                // dd($shipper);
                // return 0;
            }
            // foreach ($cart as $id => $book) {
            //     $cart = session()->get('cart');
            //     unset($cart[$id]);
            //     session()->put('cart', $cart);
            //     $cart = session()->get('cart');
            // }


            $order = $this->order->order($id_code->id_code);

            $quantity = $this->order->quantity($id_code->id_code);




            // dd($shipper);

            $viewData = [
                'user' => $user,
                'customer' => $customer,
                'province' => $province,
                'district' => $district,
                'ward' => $ward,
                'cart' => $order,
                'quantity' => $quantity,
                'datetime' => $datetime,
                'shipper' => $shipper->shipper_name,
                'paymentName' => $paymentName,
                'id_code' => $id_code->id_code,
            ];
            //Email
            $order_confirmation = $user->email;
            $title = "Xác nhận đơn hàng # $id_code->id_code";
            Mail::send('email.order_confirmation', $viewData, function ($email) use ($order_confirmation, $title) {
                $email->subject($title);
                $email->to($order_confirmation);
            });
            // dd($order_confirmation);
            //Email

            session()->forget('book_token');

            DB::table('sessions')->where('id_code', $id_code->id_code)->delete();
            // DB::table('book')->Join('order','order.book_id','book.id')->where('order.id_code',$id_code->id_code)
            // ->update(['book.quantity'=>])


            return view('thankyou', $viewData);
        } else {
            return view('errors.404');
        }
    }

    public function vnpay($token_vnpay, Request $request)
    {
        if ($token_vnpay == session()->get('book_token')) {
            // dd($request->shipper);
            if ($request->vnp_ResponseCode == "00") {
                // $id_shipper = rand(1, Shipper::count());
                // dd($shipper);
                // dd(session()->get('shipper'));
                $datetime = session()->get('datetime');
                // dd($datetime);
                $cart = DB::table('sessions')->where('user_id', Auth::user()->id)->get();
                // $shipper = Shipper::find(session()->get('shipper'));

                $id_code = DB::table('sessions')->where('user_id', Auth::user()->id)->groupBy('id_code', 'id_shipper')->select('id_code', 'id_shipper')->first();
                $shipper = Shipper::find($id_code->id_shipper);
                $user = Auth::user();
                $customer = Customer::where(['users_id' => $user->id, 'status' => 1])->first();
                $province = DB::table('province')->where('id', $customer->province_id)->first();
                $district = DB::table('district')->where('id', $customer->district_id)->first();
                $ward = DB::table('ward')->where('id', $customer->ward_id)->first();
                $paymentName = "Thanh toán qua VNPAY";
                // $cart = session()->get('cart');

                if (isset($cart) and count($cart) > 0) {
                    foreach ($cart as  $book) {
                        $this->order->AddOrder(
                            $id_code->id_code,
                            $customer->id,
                            $book->id_book,
                            $book->quantity,
                            $paymentName,
                            $id_code->id_shipper,
                            $datetime
                        );
                        DB::table("order")->where("id_code", $id_code->id_code)->update(['status' => 1]);
                        // $quantity += $book['quantity'];
                        // dd($quantity);
                        // DB::table('order')->insert([
                        //     "id_code" => $id_code,
                        //     "customer_id" => $customer->id,
                        //     'book_id' => $book->id_book,
                        //     'quantity' => $book->quantity,
                        //     'payment' => $paymentName,
                        //     'shipper_id' => session()->get('shipper'),
                        //     'date_order' => $datetime,
                        //     'status' => 1,
                        //     'created_at' => $datetime,
                        //     'updated_at' => $datetime,
                        // ]);
                        $checkQuantity = DB::table('book')->Join('order', 'order.book_id', 'book.id')
                            ->where('order.book_id', $book->id_book)->select('book.quantity')->first();
                        // $checkQuantity = DB::table('book')->Join('order', 'order.book_id', 'book.id')
                        // ->where('order.book_id', $book->id_book)->select('book.quantity')->first();


                        // dd();
                        if ($checkQuantity->quantity > 0) {
                            $quantitySum = $checkQuantity->quantity - $book->quantity;
                            DB::table('book')->Join('order', 'order.book_id', 'book.id')
                                ->where('order.book_id', $book->id_book)->update(
                                    ['book.quantity' => $quantitySum]
                                );
                        } else {
                            DB::table('book')->Join('order', 'order.book_id', 'book.id')
                                ->where('order.book_id', $book->id_book)->update(
                                    ['book.status' => 0]
                                );
                        }
                    }
                }
                // foreach ($cart as $id => $book) {
                //     $cart = session()->get('cart');
                //     unset($cart[$id]);
                //     session()->put('cart', $cart);
                //     $cart = session()->get('cart');
                // }


                $order = $this->order->order($id_code->id_code);

                $quantity = $this->order->quantity($id_code->id_code);

                // dd(400);



                // dd($shipper);

                $viewData = [
                    'user' => $user,
                    'customer' => $customer,
                    'province' => $province,
                    'district' => $district,
                    'ward' => $ward,
                    'cart' => $order,
                    'quantity' => $quantity,
                    'datetime' => $datetime,
                    'shipper' => $shipper->shipper_name,
                    'paymentName' => $paymentName,
                    'id_code' => $id_code->id_code,
                ];
                //Email
                $order_confirmation = $user->email;
                $title = "Xác nhận đơn hàng #" . $id_code->id_code;
                Mail::send('email.order_confirmation', $viewData, function ($email) use ($order_confirmation, $title) {
                    $email->subject($title);
                    $email->to($order_confirmation);
                });
                //Email

                //VNPAY
                // $payment = new Payment();
                // DB::table('payment')->insert([
                //     'id_code' => $id_code,
                //     'id_users' => $user->id,
                //     'vnp_Amount' => $request->vnp_Amount,
                //     'vnp_BankCode' => $request->vnp_BankCode,
                //     'vnp_BankTranNo' => $request->vnp_BankTranNo,
                //     'vnp_CardType' => $request->vnp_CardType,
                //     'vnp_OrderInfo' => $request->vnp_OrderInfo,
                //     'vnp_PayDate' => date('Y-m-d H:i:s', strtotime($request->vnp_PayDate)),
                //     'vnp_SecureHash' => $request->vnp_SecureHash,

                // ]);
                $this->payment->Addpayment(
                    $id_code->id_code,
                    $user->id,
                    Str::substr($request->vnp_Amount, 0, -2),
                    $request->vnp_BankCode,
                    $request->vnp_BankTranNo,
                    $request->vnp_CardType,
                    $request->vnp_OrderInfo,
                    $request->vnp_PayDate,
                    $request->vnp_SecureHash
                );


                // dd(400);

                // id_code');
                // $table->integer('id_users');
                // $table->string('vnp_Amount');
                // $table->string('vnp_BankCode');
                // $table->string('vnp_BankTranNo');
                // $table->string('vnp_CardType');
                // $table->string('vnp_OrderInfo');
                // $table->string('vnp_PayDate');
                // $table->string('vnp_SecureHash');
                //VNPAY

                session()->forget('book_token');

                DB::table('sessions')->where('id_code', $id_code->id_code)->delete();



                return view('thankyou', $viewData);
            } else {
                // dd("error");
                return redirect()->route('checkout', ['token' => session()->get('book_token')]);
            }
        } else {
            return view('errors.404');
        }
                
    }

            // dd($request->all());


}

// if($token_vnpay== session()->get('book_token')){

                // dd($request->all());
                // dd(date('Y-m-d H:i:s',strtotime($request->vnp_PayDate)));

                // }
                /*
                "vnp_Amount" => "5000000"
                        "vnp_BankCode" => "NCB"
                "vnp_BankTranNo" => "VNP13757113"
                "vnp_CardType" => "ATM"
                "vnp_OrderInfo" => "Thanh toán mua sách 2022-05-26 13:17:01"
                "vnp_PayDate" => "2022 05 26 13 17 56"
                "vnp_ResponseCode" => "00"
                "vnp_TmnCode" => "ZFY9V6CA"
                "vnp_TransactionNo" => "13757113"
                "vnp_TransactionStatus" => "00"
                "vnp_TxnRef" => "20220526131701"
                "vnp_SecureHash" => "d2349197f459b73f7dee3e3a0995a74898a1863d1db2af6bcae944a9fc243066"

                        */