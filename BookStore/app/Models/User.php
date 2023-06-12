<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
        'rules'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /*Count User register */
    public function CountUsers()
    {
        $users = User::where(['rules'=> 0])->count();
        return $users;
    }
    /*Admin Users */
    public function AdminUsers()
    {
        $users = User::where(['rules' => 1])->OrderBy('created_at','desc')->get();
        return $users;
    }
    /*customers Users */
    public function CustomersUsers()
    {
        $users = User::where(['users.rules'=>0,'customer.status'=>1])->OrderBy('users.created_at','desc')
            ->join('customer', 'customer.users_id', 'users.id')
            ->select('customer.phone', 'customer.address', 'users.*')
            ->get();
        return $users;
    }
    /**Get customer */
    public function GetCustomer($id)
    {
        $users = User::where('users.id', $id)
            ->join('customer', 'customer.users_id', 'users.id')->select('customer.phone', 'customer.address', 'users.*')
            ->first();
        return $users;
    }

    /**Get User Admin */
    public function GetAdmin($id)
    {
        $users = User::find($id);
        return $users;
    }
    /**Register Admin */
    public function RegisterAdmin($full_name, $email, $password)
    {
        $data=[
            'full_name' => $full_name,
            'email' => $email,
            'password' => Hash::make($password),
            'rules'=>1,
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now(),


        ];
        DB::table('users')->insert($data);
        // $user = new User();
        // $user->full_name = $full_name;
        // $user->email = $email;
        // $user->password = ;
        // $user->rules = 1;
        // $user->save();
    }
    /**Tìm kiếm User check user  */
    public function GetAdminCheck($email)
    {
        return User::where('email', $email)->first();
    }
    /**Update Admin */
    public function UpdateAdmin($id, $full_name)
    {
        DB::table('users')->where('id', $id)->update(['full_name' => $full_name,'updated_at'=>Carbon::now()]);
        // $user = User::find($id);
        // $user->full_name = $full_name;
        // $user->update();
    }
    /**Remove Admin */
    public function RemoveAdmin($id)
    {
        $user = User::find($id);
        $user->delete();
    }
    /**Remove Customer */
    public function RemoveCustomer($id)
    {
        DB::table('customer')->where('users_id', $id)->delete();
        $user = User::find($id);
        $user->delete();
    }
    /*FE */

    /*FE */
    //Check if User is Online
    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

   

}
