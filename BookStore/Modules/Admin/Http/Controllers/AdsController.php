<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Ads;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $ads;
    public function __construct()
    {
        $this->ads = new Ads();
    }
    public function index()
    {
        $ads = $this->ads->ListAds();
        $viewData = [
            'count' => 1,
            'ads' => $ads,
        ];
        return view('admin::ads', $viewData);
    }
    public function ViewAddAds()
    {
        return view('admin::ads.add');
    }
    public function AddAds(Request $request)
    {

        $ads = DB::table('ads')->where('title', $request->title)->first();
        if ($ads) {
            return response()->json(['error' => 'Đã tồn tại!']);
        } else {

            if ($request->hasFile('ads_images')) {
                //    dd($request->all());
                $slug = Str::slug($request->title);
                // $random=Str::random(5);
                $file = $request->file('ads_images');
                // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
                $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
                $ads_images = $slug . '.' . $extension; // dd($book_images);
                $this->ads->AddAds($request->title, $ads_images, $request->location);

                $file->move('images/ads', $ads_images);

                return response()->json(['success' => 'Thêm thành công!']);
            } else {
                $this->ads->AddAds($request->title, null, $request->location);
                return response()->json(['success' => 'Thêm thành công!']);
            }
        }
    }

    //Get Ads
    public function GetAds(Request $request)
    {
        $ads = $this->ads->GetAds($request->slug);
        return response()->json(['ads' => $ads]);
    }

    public function RemoveAds(Request $request)
    {
        $ads = Ads::where('slug', $request->slug)->first();
        if ($ads->avatar) {
            File::delete("images/ads/$ads->avatar");
            $ads->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        } else {
            $ads->delete();
            return response()->json(['success' => 'Xóa thành công!']);

            // dd(444);
        }
    }
    //Get and Update
    public function GetAdsUpdate($slug)
    {
        $ads = Ads::where('slug', $slug)->first();
        $viewData = ['ads' => $ads];
        return view('admin::ads.update', $viewData);
    }
    public function UpdateAds(Request $request)
    {
        // dd($request->all());
        $title = Str::of($request->title)->trim();

        if ($request->hasFile('ads_images')) {


            //    dd($request->all());

            $slug = Str::slug($title);
            // $random=Str::random(5);
            $file = $request->file('ads_images');
            // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
            $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
            $ads_images = $slug . '.' . $extension; // dd($book_images);
            $this->ads->UpdateAds($request->slug, $title, $ads_images, $request->location);

            $file->move('images/ads', $ads_images);
            return redirect()->route('admin_ads');
        } else {

            $update = Ads::where('slug', $request->slug)->first();

            if (empty($update->avatar)) {

                $this->ads->UpdateAds($request->slug, $title, null, $request->location);
                // $file->move('images/book', $authors_images);
                return redirect()->route('admin_ads');
            } else {

                $extension = Str::after($update->avatar, ".");
                $slug = Str::slug($title);
                $ads_images = $slug . "." . $extension;
                File::move("images/ads/$update->avatar", "images/ads/$ads_images");
                $this->ads->UpdateAds($request->slug, $title, $ads_images, $request->location);

                // $file->move('images/book', $authors_images);
                return redirect()->route('admin_ads');
            }
        }
    }
}
