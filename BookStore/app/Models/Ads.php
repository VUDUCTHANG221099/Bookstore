<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Ads extends Model
{
    use HasFactory;
    
    protected $table="ads";
    protected $guarded = [];
    //List Ads
    public function ListAds(){
        return Ads::OrderByDesc('create_at')->get();
    }

    
    //Add Ads
    public function AddAds($title,$avatar,$location){
        DB::table('ads')->insert([
            'title' => $title,
            'slug' => Str::slug($title),
            'avatar' => $avatar,
            'type'=>$location,
            'create_at' => Carbon::now(),
        ]);
    }

    //Get Ads
    public function getAds($slug){
        $ads=DB::table('ads')->where('slug',$slug)->first();
        return $ads;
    }

    //Update ads
    public function UpdateAds($slug,$title,$avatar,$location){
        DB::table('ads')->where('slug',$slug)->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'avatar' => $avatar,
            'type'=>$location,
            'create_at' => Carbon::now(),
        ]);
    }
    //FE
    public function AdsFE($type,$get){
        $ads=Ads::where('type',$type)->$get();
        return $ads;
    }
    // $adsCenter=Ads::where('type',1)->get();
    // $adsRight=Ads::where('type',2)->first();
}
