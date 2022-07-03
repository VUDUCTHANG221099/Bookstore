<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $users;
    public function __construct()
    {
        $this->users = new User();
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


    public function AdminManagement()
    {

        $users = $this->users->AdminUsers();
        $viewData = [
            'users' => $users,
            'count' => 1,
        ];
        return view('admin::Admin', $viewData);
    }
    public function customerManagement()
    {
        $users = $this->users->CustomersUsers();
        $viewData = [
            'customers' => $users,
            'count' => 1,
        ];
        return view('admin::users', $viewData);
    }
    public function GetAdmin($id)
    {
        $users = $this->users->GetAdmin($id);
        return response()->json(['users' => $users]);
    }
    public function GetCustomer($id)
    {
        $users = $this->users->GetCustomer($id);
        return response()->json(['users' => $users]);
    }
    /** Add Admin*/
    public function AddAdmin(Request $request)
    {
        $user = $this->users->GetAdminCheck($request->Admin_email);
        if ($user) {
            return response()->json(['error' => 'Tài khoản đã tồn tại']);
        } else {
            $user = $this->users->RegisterAdmin($request->Admin_name, $request->Admin_email, $request->Admin_password);
            return response()->json(['success' => 'Đăng ký thành công!']);
        }
    }
    /**Remove Admin */
    public function RemoveAdmin($id)
    {
        $this->users->RemoveAdmin($id);
        return response()->json(['success' => 'Xóa thành công!']);
    }
    /**Update Admin` */
    public function UpdateAdmin($id, Request $request)
    {
        $this->users->UpdateAdmin($id, $request->Admin_name_update);
        return response()->json(['success' => 'Cập nhật thành công!']);
    }
    public function RemoveCustomer($id)
    {
        $this->users->RemoveCustomer($id);
        return response()->json(['success' => 'Xóa thành công!']);
    }
}
