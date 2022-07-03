<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;



class CartController extends Controller
{
    public function addToCart($id, Request $request)
    {
        // session()->flush('cart');

        $date=Carbon::now();
        $product = Book::find($id);
        $user_id = Auth::user()->id;
        $id_code = Carbon::now()->format('Y') . Str::random(5) . Carbon::now()->format('m') . Str::random(5) . Carbon::now()->format('d');
        $id_codeOfDB=DB::table('sessions')->where('user_id',$user_id)->groupBy('id_code')->select('id_code')->
        first();
        // session()->put('id_code', $id_code);

        

        $cart = DB::table('sessions')->where('id_book',$id)->where('user_id',$user_id);;
        // $sum = 0;

        if ($cart->first()!=false) {
            
            $sum = $request->quantity + $cart->first()->quantity;
            // $cart[$id]['quantity'] = $sum;
            // $cart[$id]['time'] = $date;
           
            DB::table('sessions')->where('user_id',$user_id)->
            where('id_code',$id_codeOfDB->id_code)->
            where('id_book',$id)
            ->update([
                'quantity'=>$sum,
                'time'=>$date,
            ]);
        } else {
            // $cart[$id] = [
            //     'name' => $product->book_name,
            //     'price' => $product->price,
            //     'quantity' => $request->quantity,
            //     'image' => $product->avatar,
            //     'time' => $date,
            //     'slug' => $product->book_slug,
            // ];
            if(isset($id_codeOfDB->id_code)){

                DB::table('sessions')->insert([
                    'user_id'=>$user_id,
                    'id_code'=>$id_codeOfDB->id_code,
                    'id_book'=>$id,
                    'book_name'=>$product->book_name,
                    'slug'=>$product->book_slug,
                    'quantity'=>$request->quantity,
                    'price'=>$product->price,
                    'time'=>$date,
                    'image'=>$product->avatar,
                ]);
            }else{
                DB::table('sessions')->insert([
                    'user_id'=>$user_id,
                    'id_code'=>$id_code,
                    'id_book'=>$id,
                    'book_name'=>$product->book_name,
                    'slug'=>$product->book_slug,
                    'quantity'=>$request->quantity,
                    'price'=>$product->price,
                    'time'=>$date,
                    'image'=>$product->avatar,
                ]);
            }
        }
        // session()->put('cart', $cart);
        // $cart = session()->get('cart');
        

        // dd($cart);
        // $TotalCart=view('layouts.sub_them_gio_hang',compact('cart'))->render();
        return response()->json(['code' => 200, 'message' => "success"], 200);
    }
    public function deleteCart($id)
    {
        // return response()->json(['TotalCart' => 100]);

        if ($id) {
            $user_id = Auth::user()->id;

            // $cart = session()->get('cart');
            // unset($cart[$id]);
            // session()->put('cart', $cart);
            // $cart = session()->get('cart');
            DB::table('sessions')->where('user_id',$user_id)->where('id_book',$id)->delete();
            $check=DB::table('sessions')->where('user_id',$user_id)->count();
            // return response()->json(['cart' => $cart]);
        return response()->json(['code' => 200, 'message' => "success","check"=>$check], 200);

        }
    }
    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            // $cart=session()->get('cart');
            // $cart[$request->id]['quantity'] = $request->quantity;
            // $cart[$request->id]['time'] = Carbon::now();
            
            // session()->put('cart', $cart);
            $user_id = Auth::user()->id;
            DB::table('sessions')->where('user_id', $user_id)->where('id_book',$request->id)
            ->update(['quantity'=>$request->quantity,'time'=> Carbon::now()]);
           
            return response()->json(['code' => 200, 'message' => "success"], 200);

        }
        
    }














    //View
    public function Them_Gio_Hang()
    {
        $user_id = Auth::user()->id;
        $carts = DB::table('sessions')->where('user_id',$user_id)->get();
        $quantity=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity) as quantity')->first()->quantity;
        $total=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity*(price-3000)) as total')->first()->total;
        
        // $cart = session()->get('cart');
        $viewData=[
            'carts' =>$carts,
            // 'cart' =>$cart,
            'quantity' =>$quantity,
            'total'=>$total,
        ];
        $TotalCart = view('layouts.sub_them_gio_hang',$viewData)->render();
        return response()->json(['TotalCart' => $TotalCart]);
    }
    public function Gio_Hang()
    {
        $user_id = Auth::user()->id;
        $carts = DB::table('sessions')->where('user_id',$user_id)->get();

        $quantity=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity) as quantity')->first()->quantity;
        $total=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity*(price-3000)) as total')->first()->total;
        $viewData=[
            // 'cart'=>$cart,
            'carts'=>$carts,
            'total'=>$total,
            'quantity'=>$quantity,
        ];
        $TotalCart = view('layouts.Gio_Hang',$viewData)->render();
        return response()->json(['TotalCart' => $TotalCart]);
    }
    public function GioHangView()
    {
        return view('cart');
    }
    public function GioHangView_Sub(){
        // $cart = session()->get('cart');
        $user_id = Auth::user()->id;
        $carts = DB::table('sessions')->where('user_id',$user_id)->get();
        $quantity=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity) as quantity')->first()->quantity;
        $total=DB::table('sessions')->where('user_id',$user_id)->selectRaw('sum(quantity*(price-3000)) as total')->first()->total;
        
        $viewData=[
            'carts'=>$carts,
            // 'cart'=>$cart,
            'total'=>$total,
            'quantity'=>$quantity,
        ];
        $TotalCart = view('cart.sub_cart',$viewData)->render();
        return response()->json(['TotalCart' => $TotalCart]);
    }
    //View


    //Sub-Cart
    public function GetdataBook(Request $request){
        $book=DB::table('book')->where('id',$request->id)->first();
        $session=DB::table('sessions')->where(['id_book'=>$request->id,'user_id'=>Auth::user()->id])->first();
        return response()->json(['book'=>$book, 'session'=>$session]);
    }


}
