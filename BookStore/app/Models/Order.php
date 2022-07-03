<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    use HasFactory;
    protected $table="order";
    protected $guarded = [];
    public function ListOrder(){
        // $order=DB::table('order')->selectRaw('SUM(order.quantity*book.price) as Price,
        //  SUM(order.quantity) as Quantity, users.full_name, order.status,order.customer_id')
        // ->rightJoin('book', 'book.id','order.book_id')
        // ->Join('customer','customer.id','order.customer_id')
        // ->Join('users','users.id','customer.users_id')
        // ->groupBy('order.customer_id','order.status')->where('order.status',1)->get();
        // return $order;
        $order=
        DB::table('order')->selectRaw('SUM(order.quantity*(book.price-3000)) as Price,
        SUM(order.quantity) as Quantity, users.full_name, order.status,order.id_code,order.date_order')
       ->rightJoin('book', 'book.id','order.book_id')
       ->Join('customer','customer.id','order.customer_id')
       ->Join('users','users.id','customer.users_id')
       ->groupBy('order.customer_id','order.id_code','order.status','order.date_order')
       ->get();
       return $order;
    }
    public function GetCustomer($id_code){
        $data['customer']=DB::table('order')->select('users.full_name','users.email','customer.*')
        ->Join('customer','customer.id','order.customer_id')
        ->Join('users','users.id','customer.users_id')
        ->groupBy('order.id_code','order.id_code','customer.id')->where('order.id_code',$id_code)->where('customer.status',1)->first();

        $data['order']=DB::table('order')->selectRaw('book.*, order.quantity as orderQuantity,
        SUM((book.price-3000)*order.quantity) as PriceTotal')->rightJoin('book','book.id','order.book_id')
        ->groupBy('order.book_id','order.quantity')->where('order.id_code',$id_code)->get();
        
        $data['date']=DB::table('order')->where('id_code',$id_code)->groupBy('id_code','date_order')->select('date_order')->first()->date_order;
        $data['id_shipper']=DB::table('order')->where('id_code',$id_code)->groupBy('id_code','shipper_id')->select('shipper_id')->first()->shipper_id;

        $data['total']=DB::table('order')->selectRaw("sum(order.quantity*(book.price-3000)) as totalsBook")->
        rightJoin('book', 'book.id','order.book_id')->where('order.id_code',$id_code)->first()->totalsBook;
       $data['idCodeStatus'] = DB::table('order')->groupBy('id_code','status')->where('id_code',$id_code)
       ->select('id_code','status')->first();

        return $data;
    }
    
    //Tổng doanh thu
    public function Totals(){
        $total=DB::table('order')->selectRaw('SUM((book.price-3000)*order.quantity) as Totals')
        ->rightJoin('book', 'book.id','order.book_id')->where('order.status',1)->first();
        return $total;
    }
    //FE
    public function order($id_code){
        return DB::table('order')->where('order.id_code', $id_code)
        ->rightJoin('book', 'book.id', 'order.book_id')->select(
            'book.avatar',
            'book.book_name',
            'book.price',
            'order.*'
        )
        ->get();

    }
    public function quantity($id_code){
       return DB::table('order')->where('id_code', $id_code)->sum('quantity');
    }
    public function AddOrder($id_code,$customer_id,$book_id,$quantity,$paymentName,$shipper_id,$datetime){
        DB::table('order')->insert([
            "id_code" => $id_code,
            "customer_id" =>$customer_id,
            'book_id' => $book_id,
            'quantity' => $quantity,
            'payment' => $paymentName,
            'shipper_id' => $shipper_id,
            'date_order' => $datetime,
            'status' => 0,
            'created_at' => $datetime,
            'updated_at' => $datetime,
        ]);
    }
}
