<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;




class ProfileController extends Controller
{
    private $customer;
    private $post;

    public function __construct()
    {
        $this->customer = new Customer();
        $this->post = new Post();
    }
    public function index()
    {
        // try {
            // $id=session()->get('customers_user')['id'];
            $id = Auth::user()->id;
        
            $customer = $this->customer->profile($id, '!=', null, 'first');
            
            if (empty($customer)) {
                //      $viewData = [
                //     'address' => $address,
                //     'post' => $post,
                //     'count' => 1,
                // ];
                // dd($viewData);
                return view('profile');
            } else {

                $post = Post::where(['user_id' => $customer->users_id])->get();
                $address = $this->customer->profile($id, '!=', null, 'get');
            }
            
            // dd($address);
            //             if($post==null)
            // {

            //     dd(400);
            // }   


            // dd($post);

            $viewData = [
                'address' => $address,
                'post' => $post,
                'count' => 1,
            ];
            // dd($viewData);
            return view('profile', $viewData);
        
    }
    public function Profile(Request $request)
    {
        $profile = $this->customer->profile($request->id, '=', 1, 'first');

        // Customer::where('users_id',$request->id)->where('status',1)->first();
        return response()->json($profile);
    }
    // public function MyAddress(Request $request)
    // {
    //     $address = $this->customer->profile($request->id, '!=', null, 'get');
    //     return response()->json($address);
    // }

    public function Province()
    {
        $province = $this->customer->Province();
        return response()->json($province);
    }
    public function District($province_id)
    {
        $district = $this->customer->District($province_id);
        return response()->json($district);
    }
    public function Ward($district_id)
    {
        $ward = $this->customer->Ward($district_id);
        return response()->json($ward);
    }


    public function CountAddress(Request $request)
    {
        $count = Customer::where('users_id', $request->id)->count();
        return response()->json($count);
    }

    //Remove Address
    public function DeleteAddress(Request $request)
    {
        $customerAddress = Customer::find($request->id);
        $customerAddress->delete();
        return response()->json();
    }
    //Check Address
    public function CheckAddressFE(Request $request){
        $check = Customer::where('customer.users_id', auth::user()->id)->where('customer.id',$request->id)
       ->Join('order','order.customer_id','customer.id')->select('customer.id')
        ->first();
        // dd($check);
        return response()->json($check);

    }
    //Remove Address

    //Add Address
    public function AddAddressFE(Request $request)
    {
        // $this->customer->AddAddressFE($request->id,$request->phone,$request->address,$request->province_id,
        // $request->district_id,$request->ward_id,1); 
        $count = Customer::where('users_id', $request->id)->count();
        // return $request->all();
        if ($count == 0) {

            $this->customer->AddAddressFE(
                $request->id,
                $request->phone,
                $request->address,
                $request->province_id,
                $request->district_id,
                $request->ward_id,
                1
            );
            return response()->json();
        } else {
            if ($request->IsDefault == 1) {
                DB::table('customer')->where(['users_id' => $request->id, 'status' => 1])->update(['status' => 0]);
                $this->customer->AddAddressFE(
                    $request->id,
                    $request->phone,
                    $request->address,
                    $request->province_id,
                    $request->district_id,
                    $request->ward_id,
                    1
                );
                return response()->json();
            } else {
                $this->customer->AddAddressFE(
                    $request->id,
                    $request->phone,
                    $request->address,
                    $request->province_id,
                    $request->district_id,
                    $request->ward_id,
                    0
                );
                return response()->json();
            }
        }
    }
    //Add Address

    //Get Address of Customer
    public function GetAddress(Request $request)
    {
        $address = $this->customer->GetCustomer($request->id);
        return response()->json($address);
    }
    //Get Tỉnh\Thành Quận\Huyện Xã\Phường
    //Update Address
    public function UpdateAddressFE(Request $request)
    {
        $count = Customer::where('users_id', $request->id_user)->count();

        $address = Customer::find($request->id);
        if ($count == 1) {
            if ($address) {
                DB::table('customer')->where(['users_id' => $request->id_user, 'status' => 1])->update(['status' => 0]);
                $data = [$request->id, $request->phone, $request->address, $request->province_id, $request->district_id, $request->ward_id, 1];
                $this->customer->UpdateAddressFE($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                return response()->json();
            } else {
                return response()->json();
            }
        } else {

            if ($address) {
                if ($request->IsDefault == 1) {
                    DB::table('customer')->where(['users_id' => $request->id_user, 'status' => 1])->update(['status' => 0]);
                    $data = [$request->id, $request->phone, $request->address, $request->province_id, $request->district_id, $request->ward_id, 1];

                    $this->customer->UpdateAddressFE($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                    return response()->json();
                } else {
                    $data = [$request->id, $request->phone, $request->address, $request->province_id, $request->district_id, $request->ward_id, 0];
                    $this->customer->UpdateAddressFE($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6]);
                    return response()->json();
                }
            } else {
                return response()->json();
            }
        }
    }
    public function removePostFE(Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();

        if ($post->avatar) {
            File::delete("images/post/$post->avatar");
            File::delete("description/images/post/$post->avatar");
            $comments = DB::table('comments')->where('post_id', $post->id)->delete();
            $post->delete();
            return response()->json();
        } else {
            $post->delete();
            return response()->json();
        }
    }
    public function CreatePost(Request $request)
    {
        // dd($request->all());
        $id = Auth::user()->id;

        $user = User::find($id);
        $title = Str::of($request->title)->trim();
        $post = Post::where(['title' => $title])->first();
        // return response()->json(['error' => 'Tên bài viết đã tồn tại!']);

        if ($user) {
            if ($post) {
                return response()->json(['error' => 'Tên bài viết đã tồn tại!']);
            } else {

                if ($request->hasFile('illustration')) {
                    // return response()->json(['error' => 'Tên bài viết đã tồn tại!dddd']);
                    // return  response()->json($request->all());

                    $slug = Str::slug($title);
                    // $random=Str::random(5);
                    $file = $request->file('illustration');
                    // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
                    $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
                    $illustration = $slug . '.' . $extension; // dd($book_images);
                    // dd($book_images);
                    $data = [$title, $illustration, $request->desc_post, $id];
                    $this->post->CreatePost($data[0], $data[1], $data[2], $data[3]);
                    $file->move('images/post', $illustration);
                    // return response()->json($request->all());
                    return response()->json(['success' => 'Thêm bài viết thành công!']);
                } else {
                    // return response()->json(['error' => 'Tên bài viết đã tồn tạissa!']);

                    $data = [$title, null, $request->desc_post, $id];
                    $this->post->CreatePost($data[0], $data[1], $data[2], $data[3]);
                    return response()->json(['success' => 'Thêm bài viết thành công!']);
                }
            }
        } else {

            return  response()->json();
        }
    }
    public function updatePost($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('profile.updatePost', compact('post'));
    }
    public function Update_Post(Request $request)
    {
        // dd($request->all());
        $title = Str::of($request->titleUpdate)->trim();

        if ($request->hasFile('illustrationUpdate')) {
            //    dd($request->all());

            $slug = Str::slug($title);
            // $random=Str::random(5);
            $file = $request->file('illustrationUpdate');
            // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
            $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
            $illustration = $slug . '.' . $extension; // dd($book_images);
            $this->post->UpdatePost($request->slug, $title, $illustration, $request->desc_post);
            $file->move('images/post', $illustration);
            // dd( $illustration);
            return redirect()->route('profileFEPost');
        } else {
            $update = Post::where('slug', $request->slug)->first();
            if (empty($update->avatar)) {
                $this->post->UpdatePost($request->slug, $title, null, $request->desc_post);
                return redirect()->route('profileFEPost');
            } else {
                $extension = Str::after($update->avatar, ".");
                $slug = Str::slug($title);
                $illustration = $slug . "." . $extension;
                File::move("images/ads/$update->avatar", "images/post/$illustration");
                $this->post->UpdateAds($request->slug, $title, $illustration, $request->desc_post);
            }
        }
    }
}
