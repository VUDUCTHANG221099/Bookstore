<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Shipper;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class ShipperController extends Controller
{
    private $shipper;
    public function __construct()
    {
        $this->shipper = new Shipper();
    }
    public function index()
    {
        $shipper = $this->shipper->AllShipper();
        $viewData = [
            'shipper' => $shipper,
            'count' => 1,
        ];
        return view('admin::shipper', $viewData);
    }


    public function GetShipper(Request $request)
    {
        $shipper = $this->shipper->GetShipper($request->slug);
        return response()->json(['shipper' => $shipper]);
    }

    public function ViewAddShipper()
    {
        return view('admin::shipper.add');
    }
    public function AddShipper(Request $request)
    {
        $shipper = $this->shipper->GetShipperName($request->shipper_name);
        if ($shipper) {
            return response()->json(['error' => 'Đơn vị vận chuyển đã tồn tại!']);
        } else {
            if ($request->hasFile('logo')) {
                //    dd($request->all());
                $slug = Str::slug($request->shipper_name);
                // $random=Str::random(5);
                $file = $request->file('logo');
                // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
                $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
                $logo = $slug . '.' . $extension; // dd($book_images);
                $shipper = $this->shipper->AddShipper($request->shipper_name, $logo);
                $file->move('images/shipper', $logo);
                return response()->json(['success' => 'Thêm đơn vị vận chuyển thành công!']);
            }
        }
    }
    public function destroy(Request $request)
    {
        $shipper = Shipper::where('slug', $request->slug)->first();

        File::delete("images/shipper/$shipper->logo");
        $shipper->delete();
        return response()->json(['success' => 'Xóa thành công!']);
    }
}
