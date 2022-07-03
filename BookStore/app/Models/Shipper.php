<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Shipper extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table="shipper";
    protected $guarded = [];
    public function AllShipper(){
        return Shipper::all();
    }
    public function GetShipper($slug){
        $shipper=Shipper::where('slug',$slug)->first();
        return $shipper;
    }
    public function AddShipper($shipper_name,$logo){
        DB::table('shipper')->insert([
            'shipper_name'=>$shipper_name,
            'slug'=>Str::slug($shipper_name),
            'logo'=>$logo,
        ]);
    }
    public function GetShipperName($shipper_name){
        $shipper=Shipper::where('shipper_name',$shipper_name)->first();
        return $shipper;
    }
}
