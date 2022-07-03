<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
                'category_name'=> 'Sách thiếu nhi',
                'category_slug'=>Str::slug('Sách thiếu nhi'),
            ],
            [
                'category_name'=> 'Sách Giáo Khoa - Giáo Trình',
                'category_slug'=>Str::slug('Sách Giáo Khoa - Giáo Trình'),
            ],
            [
                'category_name'=> 'Sách kinh tế',
                'category_slug'=>Str::slug('Sách kinh tế'),
            ],
            [
                'category_name'=> 'Sách học ngoại ngữ',
                'category_slug'=>Str::slug('Sách học ngoại ngữ'),
            ],
            [
                'category_name'=> 'Sách tư duy - Kỹ năng sống',
                'category_slug'=>Str::slug('Sách tư duy - Kỹ năng sống'),
            ],
            [
                'category_name'=> 'Sách tham khảo',
                'category_slug'=>Str::slug('Sách tham khảo'),
            ],
            [
                'category_name'=> 'Sách Bà mẹ - Em bé',
                'category_slug'=>Str::slug('Sách Bà mẹ - Em bé'),
            ],
            [
                'category_name'=> 'Tiểu thuyết',
                'category_slug'=>Str::slug('Tiểu thuyết'),
            ],
            [
                'category_name'=> 'Truyện tranh, manga, comic',
                'category_slug'=>Str::slug('Truyện tranh, manga, comic'),
            ],
            [
                'category_name'=> 'Từ điển',
                'category_slug'=>Str::slug('Từ điển'),
            ],
        ];
        DB::table('category')->insert($data);
    }
}
