<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $cate;
    public function __construct()
    {
        $this->cate = new Category();
    }
    public function index()
    {
        $cate = $this->cate->AllCategory();
        $viewDada = [
            'category' => $cate,
            'count' => 1,
        ];
        return view('admin::categories', $viewDada);
    }
    /**Get Category */
    public function GetCategory($slug)
    {
        $cate = $this->cate->GetCategory($slug);
        return response()->json(['category' => $cate]);
    }
    /**Add Category */
    public function AddCate(Request $request)
    {
        $Category_name=Str::of($request->Category_name)->trim();

        $cate = $this->cate->GetCategoryCheck($Category_name);
        if ($cate) {
            return response()->json(['error' => 'Thể loại đã tồn tại!']);
        } else {
            $cate = $this->cate->AddCategory($Category_name);
            return response()->json(['success' => 'Thêm thể loại thành công!']);
        }
    }
    /**Update Category */
    public function UpdateCate($id,Request $request){
        $Cate_name_update=Str::of($request->Cate_name_update)->trim();

        $cate = $this->cate->GetCategoryCheck($Cate_name_update);
        if ($cate) {
            return response()->json(['error' => 'Thể loại đã tồn tại!']);
        } else {
            $cate = $this->cate->UpdateCategory($id,$Cate_name_update);
            return response()->json(['success' => 'Cập nhật thể loại thành công!']);
        }
    }

    /**Remove Category*/
    public function RemoveCategory($slug){
        $this->cate->RemoveCategory($slug);
        return response()->json(['success' => 'Xóa thành công!']);
    }
}
