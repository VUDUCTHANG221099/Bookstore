<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Author;
use App\Models\Order;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    private $users, $order, $author;
    public function __construct()
    {
        $this->users = new User();
        $this->order = new Order();
        $this->author = new Author();
    }
    public function index()
    {
        $author = $this->author->ListAuthor();


        // $this->author->ListAuthor();
        if ($key = request()->key) {
            $author = $this->author->searchAuthor($key);
        }
        $order = $this->order->ListOrder();
        $viewData = [
            'order' => $order,
            'count' => 1, 
            'author' => $author,
        ];
        return view('admin::index', $viewData);
    }


    public function login()
    {
        return view('admin::login');
    }

    public function countUsers()
    {
        $countUsers = $this->users->countUsers();
        if ($countUsers == null) {
            return response()->json(['countUsers' => $countUsers]);
        } else {
            return response()->json(['countUsers' => $countUsers]);
        }
    }
    public function countOrder()
    {
        $countOrder = DB::table('order')->where('status',0)->distinct()->count('id_code');
        if ($countOrder == null) {
            return response()->json(['countOrder' => $countOrder]);
        } else {
            return response()->json(['countOrder' => $countOrder]);
        }
    }
    //Tổng doanh thu
    public function TotalBook()
    {
        $totalBook = $this->order->Totals();
        return response()->json($totalBook);
    }
    public function test(){
        $order=DB::table('order')->selectRaw('SUM(order.quantity*book.price) as Price,
         SUM(order.quantity) as Quantity, users.full_name, order.status,order.id_code')
        ->rightJoin('book', 'book.id','order.book_id')
        ->Join('customer','customer.id','order.customer_id')
        ->Join('users','users.id','customer.users_id')
        ->groupBy('order.customer_id','order.id_code','order.status')->where('order.status',1)->get();
        return $order;
    }
}
