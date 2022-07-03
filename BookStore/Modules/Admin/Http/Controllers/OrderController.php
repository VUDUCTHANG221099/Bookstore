<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Order;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private $order;
    public function __construct()
    {
        $this->order = new Order();
    }
    public function index()
    {
        $order = $this->order->ListOrder();
        $viewData = ['order' => $order, 'count' => 1];
        //    dd($order);
        return view('admin::order', $viewData);
    }
    // public function GetCustomerOrder(Request $request){
    //     $customer=$this->order->GetCustomer($request->id_code);
    //     return response()->json($customer);
    // }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function details($id_code)
    {
        try {
            //code...
            $order=$this->order->GetCustomer($id_code);
            $id_shipper=$this->order->GetCustomer($id_code)['id_shipper'];
            $shipper=DB::table('shipper')->find($id_shipper)->shipper_name;
            
            $data=[
                'order'=>$order,
                'shipper'=>$shipper,
            ];
            return view('admin::orderDetails',$data);
        } catch (\Throwable $th) {
            return abort(500);
        }
    }
    public function confirmOrder(Request $request){
        
        DB::table('order')->where('id_code',$request->id_code)->update(['status'=>1]);
        return redirect()->route('admin_order');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
