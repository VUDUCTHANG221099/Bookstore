<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    protected $table="customer";
    protected $fillable = [
        'phone',
        'address',
        'district_id',
        'province_id',
        'ward_id',
        'users_id'
    ];
    public function Profile($id,$operator,$status,$get){
        $profile=Customer::where('users_id',$id)->where('status',$operator,$status)
        ->OrderByDesc('status')->$get();
        return $profile;
    }
    public function Province(){
        $province=DB::table('province')->get();
        return $province;
    }
    public function ProvinceGET($id){
        $province=DB::table('Province')->where('id',$id)->first();
        return $province;
    }
    public function District($province_id){
        $district=DB::table('district')->where('province_id',$province_id)->get();
        return $district;
    }
    public function DistrictGET($id){
        $district=DB::table('district')->where('id',$id)->first();
        return $district;
    }
    public function Ward($district_id){
        $ward=DB::table('ward')->where('district_id',$district_id)->get();
        return $ward;
    }
    public function WardGET($id){
        $ward=DB::table('ward')->where('id',$id)->first();
        return $ward;
    }
    //Add Address
    public function AddAddressFE($idUser,$phone,$address,$province_id,$district_id,$ward_id,$status){
        DB::table('customer')->insert([
            'phone'=>$phone,
            'address'=>$address,
            'province_id'=>$province_id,
            'district_id'=>$district_id,
            'ward_id'=>$ward_id,
            'users_id'=>$idUser,
            'status'=>$status,
            
        ]);
    }
    //Update Address
    public function UpdateAddressFE($id,$phone,$address,$province_id,$district_id,$ward_id,$status){
        DB::table('customer')->where('id', $id)->update([
            'phone' => $phone,
            'address' => $address,
            'province_id' => $province_id,
            'district_id' => $district_id,
            'ward_id' => $ward_id,
            'status' => $status
        ]);
    }
    //Get Customer
    public function GetCustomer($id){
        $customer=Customer::find($id);
        return $customer;
    }

}
