<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'full_name' => 'Vũ Đức Thắng',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123456'),
                'rules' => 1,
            ],
            [
                'full_name' => 'Nguyễn Thị Thu',
                'email' => 'nguyenthithu@gmail.com',
                'password' => Hash::make('123456'),
                'rules' => 1,
            ],
        ];

        DB::table('users')->insert($users);
        \App\Models\User::factory(500)->create();
        // $category=[
        //     'category_name'=>'Sách thiếu nhi',
        //     'category_slug'=>Str::slug('Sách thiếu nhi'),
        // ];
        // DB::table('category')->insert($category);
        // $payment=[
        //     ['payment_name'=>'Thẻ Tín dụng/Ghi nợ'],
        //     ['payment_name'=>'Trả góp bằng Thẻ tín dụng'],
        //     ['payment_name'=>'Chuyển khoản ngân hàng'],
        //     ['payment_name'=>'Thẻ ATM nội địa (Internet Banking)'],
        //     ['payment_name'=>'Thanh toán khi nhận hàng (COD)'],
        // ];
        // DB::table('payment')->insert($payment);


        $shipper = [
            [
                'shipper_name' => 'VNPost – EMS (Bưu điện Việt Nam)',
                'slug' => Str::slug('VNPost – EMS (Bưu điện Việt Nam)'),
                'logo' => "vnpost-ems-buu-dien-viet-nam.png"
            ],
            [
                'shipper_name' => 'Viettel Post',
                'slug' => Str::slug('Viettel Post'),
                'logo' => "viettel-post.png"
            ],
            [
                'shipper_name' => 'Giaohangnhanh – GHN',
                'slug' => Str::slug('Giaohangnhanh – GHN'),
                'logo' => "giaohangnhanh-ghn.png"
            ],
            [
                'shipper_name' => 'Giaohangtietkiem – GHTK',
                'slug' => Str::slug('Giaohangtietkiem – GHTK'),
                'logo' => "giaohangtietkiem-ghtk.png"
            ],
            [
                'shipper_name' => 'J&T Express',
                'slug' => Str::slug('J&T Express'),
                'logo' => "jt-express.png"
            ],
        ];
        DB::table('shipper')->insert($shipper);

        $ads = [
            [
                'title' => 'Mỗi ngày một tựa sách. Nâng niu từng trang tri thức',
                'slug' => Str::slug('Mỗi ngày một tựa sách. Nâng niu từng trang tri thức'),
                'avatar' => 'moi-ngay-mot-tua-sach-nang-niu-tung-trang-tri-thuc.png',
                'type' => 1,
                'create_at' => Carbon::now(),
            ],
            [
                'title' => 'Bọc sách thêm đẹp. Nâng niu từng trang tri thức',
                'slug' => Str::slug('Bọc sách thêm đẹp. Nâng niu từng trang tri thức'),
                'avatar' => 'boc-sach-them-dep-nang-niu-tung-trang-tri-thuc.png',
                'type' => 1,
                'create_at' => Carbon::now(),
            ],
            [
                'title' => 'Kho tàng tri thức',
                'slug' => Str::slug('Kho tàng tri thức'),
                'avatar' => 'kho-tang-tri-thuc.png',
                'type' => 2,
                'create_at' => Carbon::now(),
            ],
            [
                'title' => 'Chúng tôi mang tri thức đến cho bạn',
                'slug' => Str::slug('Chúng tôi mang tri thức đến cho bạn'),
                'avatar' => 'chung-toi-mang-tri-thuc-den-cho-ban.png',
                'type' => 0,
                'create_at' => Carbon::now(),
            ],
        ];
        DB::table('ads')->insert($ads);
        $this->call([
            ProvinceSeeder::class,
            PostSeeder::class,
            CategorySeeder::class,
            AuthorSeeder::class,
            BookSeeder::class,

        ]);





        $faker = Faker::create();
        foreach (range(3, 502) as $index) {
            $province_id = rand(1, 63);
            if ($province_id < 10) {
                $province_id = "0$province_id";
            } else {
                $province_id = $province_id;
            }
            $province_id = (string)$province_id;
            $province = DB::table('province')->select('name')->find($province_id);
            $district = DB::table('district')->where(['province_id' => $province_id])->select('id', 'name')->inRandomOrder()->first();


            $district_id = $district->id;
            $ward = DB::table('ward')->where(['district_id' => $district_id])->select('id', 'name')->inRandomOrder()->first();

            $random = rand(1, 100);
            DB::table('customer')->insert([

                'phone' => $faker->phoneNumber(),
                'address' => "Số nhà $random, $ward->name, $district->name, $province->name",
                'province_id' => $province_id,
                'district_id' => $district_id,
                'ward_id' => $ward->id,
                'users_id' => $index,
                // 'numberOrder'=>1
            ]);
        }
    }
}
