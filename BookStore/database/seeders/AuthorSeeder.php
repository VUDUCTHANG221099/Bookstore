<?php

namespace Database\Seeders;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $start = strtotime("1930/01/01");
        //End point of our date range.
        $end = strtotime("1990/31/12");
        $Data=[
            [
                'author_name'=>'Antoine De Saint-Exupéry',
                'author_slug'=>Str::slug('Antoine De Saint-Exupéry'),
                'avatar'=>null,
                'birth_date'=>'1900-6-29',
                'description'=>'là một nhà văn và phi công Pháp nổi tiếng. Saint-Exupéry được biết tới nhiều nhất với kiệt tác văn học Hoàng tử bé',
                'category_id'=>1
            ],
            [
                'author_name'=>'Luis Sepulveda',
                'author_slug'=>Str::slug('Luis Sepulveda'),
                'avatar'=>null,
                'birth_date'=>'1949-10-9',
                'description'=>'là một nhà văn và phóng viên Chile. Ông là một chiến sĩ cộng sản, chống lại chế độ Augusto Pinochet, đã bị chế độ độc tài quân sự cầm tù và tra tấn trong thập niên 1970[1]. Sepúlveda là tác giả những tập thơ và truyện ngắn. Ngoài tiếng Tây Ban Nha là tiếng mẹ đẻ, ông còn nói được tiếng Anh, Pháp và Ý. Vào cuối thập niên 1980, Sepúlveda chinh phục giới văn học với tiểu thuyết đầu tiên Lão già mê đọc truyện tình',
                'category_id'=>1
            ],
            [
                'author_name'=>'Robert Winston',
                'author_slug'=>Str::slug('Robert Winston'),
                'avatar'=>null,
                'birth_date'=>'1940-7-15',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Sirilak Rattanasuwaj',
                'author_slug'=>Str::slug('Sirilak Rattanasuwaj'),
                'avatar'=>null,
                'birth_date'=>'1950-6-29',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Kannawan Pannawan',
                'author_slug'=>Str::slug('Kannawan Pannawan'),
                'avatar'=>null,
                'birth_date'=>'1960-7-12',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Tô Hoài',
                'author_slug'=>Str::slug('Tô Hoài'),
                'avatar'=>null,
                'birth_date'=>'1920-9-27',
                'description'=>'là một nhà văn Việt Nam. Một số tác phẩm đề tài thiếu nhi của ông được dịch ra ngoại ngữ. Ông được nhà nước Việt Nam trao tặng Giải thưởng Hồ Chí Minh về Văn học – Nghệ thuật Đợt 1 (1996) cho các tác phẩm: Xóm giếng, Nhà nghèo, O chuột, Dế mèn phiêu lưu ký, Núi Cứu quốc, Truyện Tây Bắc, Mười năm, Xuống làng, Vỡ tỉnh, Tào lường, Họ Giàng ở Phìn Sa, Miền Tây, Vợ chồng A Phủ, Tuổi trẻ Hoàng Văn Thụ.',
                'category_id'=>1
            ],
            [
                'author_name'=>'Fuku Mitsu',
                'author_slug'=>Str::slug('Fuku Mitsu'),
                'avatar'=>null,
                'birth_date'=>'1980-3-27',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Clint Emerson',
                'author_slug'=>Str::slug('Clint Emerson'),
                'avatar'=>null,
                'birth_date'=>'1972-5-20',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Phùng Quán',
                'author_slug'=>Str::slug('Phùng Quán'),
                'avatar'=>null,
                'birth_date'=>'1932-1-27',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Giulia Enders',
                'author_slug'=>Str::slug('Giulia Enders'),
                'avatar'=>null,
                'birth_date'=>'1990-6-3',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'John Boyne',
                'author_slug'=>Str::slug('John Boyne'),
                'avatar'=>null,
                'birth_date'=>'1971-4-30',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Jayneen Sanders',
                'author_slug'=>Str::slug('Jayneen Sanders'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'J. K. Rowling',
                'author_slug'=>Str::slug('J. K. Rowling'),
                'avatar'=>null,
                'birth_date'=>'1965-7-31',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Tim Marshall',
                'author_slug'=>Str::slug('Tim Marshall'),
                'avatar'=>null,
                'birth_date'=>'1959-5-1',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Jessica Smith',
                'author_slug'=>Str::slug('Jessica Smith'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Grace Easton',
                'author_slug'=>Str::slug('Grace Easton'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Aleksandra Mizielińska',
                'author_slug'=>Str::slug('Aleksandra Mizielińska'),
                'avatar'=>null,
                'birth_date'=>'1982-9-27',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Daniel Mizieliński',
                'author_slug'=>Str::slug('Daniel Mizieliński'),
                'avatar'=>null,
                'birth_date'=>'1982-9-27',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Rod Campbell',
                'author_slug'=>Str::slug('Rod Campbell'),
                'avatar'=>null,
                'birth_date'=>'1945-5-4',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Anita Jerami',
                'author_slug'=>Str::slug('Anita Jeram'),
                'avatar'=>null,
                'birth_date'=>'1965-7-13',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Sam McBratney',
                'author_slug'=>Str::slug('Sam McBratney'),
                'avatar'=>null,
                'birth_date'=>'1943-3-1',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Dan Green',
                'author_slug'=>Str::slug('Dan Green'),
                'avatar'=>null,
                'birth_date'=>'1975-2-7',
                'description'=>null,
                'category_id'=>1
            ],
            [
                'author_name'=>'Bộ Giáo Dục Và Đào Tạo',
                'author_slug'=>Str::slug('Bộ Giáo Dục Và Đào Tạo'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'N. Gregory Mankiw',
                'author_slug'=>Str::slug('N. Gregory Mankiw'),
                'avatar'=>null,
                'birth_date'=>'1958-2-3',
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'PGS TS Võ Văn Nhị',
                'author_slug'=>Str::slug('PGS TS Võ Văn Nhị'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'Phạm Văn Ất',
                'author_slug'=>Str::slug('Phạm Văn Ất'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'Lê Trường Thông',
                'author_slug'=>Str::slug('Lê Trường Thông'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'Đinh Đoàn Long',
                'author_slug'=>Str::slug('Đinh Đoàn Long'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'TS Lê Minh Toàn',
                'author_slug'=>Str::slug('TS Lê Minh Toàn'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'TS. Lê Đắc Nhường',
                'author_slug'=>Str::slug('TS. Lê Đắc Nhường'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'Đỗ Đức Giáo',
                'author_slug'=>Str::slug('Đỗ Đức Giáo'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>2
            ],
            [
                'author_name'=>'Morgan Housel',
                'author_slug'=>Str::slug('Morgan Housel'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>'là một chuyên gia tài chính hành vi từng viết bài cho các Tạp chí lớn như The Motley Fool và The Wall Street Journal liên quan đến chủ đề tài chính, đầu tư và kinh doanh.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Alan Phan',
                'author_slug'=>Str::slug('Alan Phan'),
                'avatar'=>null,
                'birth_date'=>'1945-8-7',
                'description'=>'là một nhà kinh doanh, giảng viên thỉnh giảng, nhà báo và viết sách báo.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Napoleon Hill',
                'author_slug'=>Str::slug('Napoleon Hill'),
                'avatar'=>null,
                'birth_date'=>'1883-10-26',
                'description'=>'là một tác giả người Mỹ, một trong những người sáng lập nên một thể loại văn học hiện đại đó là môn "thành công học" (là khoa học về sự thành công của cá nhân).[1] Tác phẩm được cho là nổi tiếng nhất của ông có tên "Nghĩ giàu và làm giàu" (Think and Grow Rich) là một trong những cuốn sách bán chạy nhất mọi thời đại.[2] Trong sự nghiệp của mình, ông cũng từng được trở thành một cố vấn cho Tổng thống Franklin D. Roosevelt.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Robin Sharma',
                'author_slug'=>Str::slug('Robin Sharma'),
                'avatar'=>null,
                'birth_date'=>'1964-6-16',
                'description'=>'là nhà văn người Canada, nổi tiếng với bộ sách The Monk Who Sold His Ferrari. Sharma làm luật sư tranh tụng cho đến năm 25 tuổi, khi anh tự xuất bản MegaLiving, một cuốn sách về quản lý căng thẳng và tâm linh.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Benjamin Graham',
                'author_slug'=>Str::slug('Benjamin Graham'),
                'avatar'=>null,
                'birth_date'=>'1894-5-9',
                'description'=>'là một nhà kinh tế học, doanh nhân và là nhà đầu tư nổi tiếng và chuyên nghiệp người Anh-Mỹ. Không những thế, Graham được coi là người khai sinh ra trường phái đầu tư giá trị.',
                'category_id'=>3
            ],
            [
                'author_name'=>'GEORGE SAMUEL CLASON',
                'author_slug'=>Str::slug('GEORGE SAMUEL CLASON'),
                'avatar'=>null,
                'birth_date'=>'1874-11-7',
                'description'=>'là một doanh nhân, nhà văn người Mỹ, tên tuổi của ông thường được gắn liền với cuốn sách của ông "Người giàu có nhất thành Babylon" (The Richest Man in Babylon) được xuất bản lần đầu vào năm 1926',
                'category_id'=>3
            ],
            [
                'author_name'=>'Nguyễn Dương',
                'author_slug'=>Str::slug('Nguyễn Dương'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>3
            ],
            [
                'author_name'=>'Trác Nhã',
                'author_slug'=>Str::slug('Trác Nhã'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>' là một nữ tác giả với nhiều đầu sách bán chạy nhất và khá được yêu thích tại Việt Nam. Cùng chúng tôi tìm hiểu vài nét về “mẹ đẻ” của ấn phấm nổi tiếng “Khéo ăn nói sẽ có được thiên hạ” qua bài viết sau đây nhé.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Song Hongbing',
                'author_slug'=>Str::slug('Song Hongbing'),
                'avatar'=>null,
                'birth_date'=>'1968-5-31',
                'description'=>null,
                'category_id'=>3
            ],
            [
                'author_name'=>'Richard Smitten',
                'author_slug'=>Str::slug('Richard Smitten'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>'là một nhà đầu tư chuyên nghiệp và nhà văn sống ở Ft. Lauderdale, Florida. Ông là Phó Chủ tịch của MTS International. Công việc chính của ông là quản lý nhân sự tại giếng dầu North Sea và quản lý những giếng dầu ở Nigeria được khai thác sau đó.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Rubén Villahermosa Chaves',
                'author_slug'=>Str::slug('Rubén Villahermosa Chaves'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>3
            ],
            [
                'author_name'=>'Don Failla',
                'author_slug'=>Str::slug('Don Failla'),
                'avatar'=>null,
                'birth_date'=>'1936-8-7',
                'description'=>'là một tác giả người Mỹ nổi tiếng với công việc trong ngành tiếp thị đa cấp',
                'category_id'=>3
            ],
            [
                'author_name'=>'Rubén Villahermosa Chaves',
                'author_slug'=>Str::slug('Rubén Villahermosa Chaves'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>3
            ],
            [
                'author_name'=>'Mohnish Pabrai',
                'author_slug'=>Str::slug('Mohnish Pabrai'),
                'avatar'=>null,
                'birth_date'=>'1964-6-12',
                'description'=>'là một doanh nhân, nhà đầu tư và nhà từ thiện người Mỹ gốc Ấn Độ. Ông sinh ra ở Bombay, Ấn Độ',
                'category_id'=>3
            ],
            [
                'author_name'=>'Simon Sinek',
                'author_slug'=>Str::slug('Simon Sinek'),
                'avatar'=>null,
                'birth_date'=>'1973-10-9',
                'description'=>'là một tác giả người Mỹ gốc Anh và một diễn giả truyền cảm hứng. Ông là tác giả của năm cuốn sách, bao gồm Start With Why và The Infinite Game.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Zoe McKey',
                'author_slug'=>Str::slug('Zoe McKey'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>3
            ],
            [
                'author_name'=>'Timothy Ferris',
                'author_slug'=>Str::slug('Timothy Ferris'),
                'avatar'=>null,
                'birth_date'=>'1977-7-30',
                'description'=>'là một doanh nhân, nhà đầu tư, tác giả, podcaster và chuyên gia về phong cách sống người Mỹ.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Lâm Minh Chánh',
                'author_slug'=>Str::slug('Lâm Minh Chánh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>'là Chủ nhiệm Chương trình CEO – dành cho Chủ doanh nghiệp, Giám đốc của trường đào tạo QTKD BizUni. Anh cũng là Chủ nhiệm và giảng viên chương trình CEO QTvKN của Cộng đồng Quản trị và Khởi nghiệp. Anh là tư vấn, mentor cho một số doanh nghiệp, startup, khởi nghiệp.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Keith Ferrazzi',
                'author_slug'=>Str::slug('Keith Ferrazzi'),
                'avatar'=>null,
                'birth_date'=>'1966-4-3',
                'description'=>'là một tác giả và doanh nhân người Mỹ. Ông là người sáng lập và CEO của Ferrazzi Greenlight, một công ty nghiên cứu và tư vấn có trụ sở tại Los Angeles, California. Ông đã viết những cuốn sách bán chạy nhất của New York Times Never Eat Alone và Whos Got Your Back?',
                'category_id'=>3
            ],
            [
                'author_name'=>'Tahl Raz',
                'author_slug'=>Str::slug('Tahl Raz'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>'là cây viết luôn khám phá ra những ý tưởng lớn và những câu chuyện tuyệt vời với cách kể chuyện sống động, giúp thắp sáng những ý tưởng thiết yếu, giúp thúc đẩy sự thay đổi và phát triển trong cá nhân và tổ chức.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Donald J.Trump',
                'author_slug'=>Str::slug('Donald J.Trump'),
                'avatar'=>null,
                'birth_date'=>'1946-6-14',
                'description'=>'là một tỷ phú, doanh nhân người Mỹ và là Tổng thống thứ 45 của Hoa Kỳ từ 2017 đến năm 2021. Trump sinh ra và lớn lên ở Queens, một quận của Thành phố New York, theo học Đại học Fordham trong hai năm và nhận bằng cử nhân kinh tế của Trường Wharton thuộc Đại học Pennsylvania.',
                'category_id'=>3
            ],
            [
                'author_name'=>'Robert T.Kiyosaki',
                'author_slug'=>Str::slug('Robert T.Kiyosaki'),
                'avatar'=>null,
                'birth_date'=>'1947-4-8',
                'description'=>'là một nhà đầu tư, doanh nhân đồng thời là một tác giả người Mỹ. Kiyosaki nổi tiếng bởi cuốn sách Rich Dad, Poor Dad. Ông đã viết 18 cuốn sách, bán tổng cộng 26 triệu bả',
                'category_id'=>3
            ],
            [
                'author_name'=>'The Windy',
                'author_slug'=>Str::slug('The Windy'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Mai Lan Hương',
                'author_slug'=>Str::slug('Mai Lan Hương'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Hà Thanh Uyên',
                'author_slug'=>Str::slug('Hà Thanh Uyên'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'The Zhishi',
                'author_slug'=>Str::slug('The Zhishi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Hoàng Ngân',
                'author_slug'=>Str::slug('Hoàng Ngân'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Dương Ký Châu',
                'author_slug'=>Str::slug('Dương Ký Châu'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Vũ Hải',
                'author_slug'=>Str::slug('Vũ Hải'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Khương Lệ Bình',
                'author_slug'=>Str::slug('Khương Lệ Bình'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Seung -eun Oh',
                'author_slug'=>Str::slug('Seung -eun Oh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Hackers',
                'author_slug'=>Str::slug('Hackers'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'The Changmi',
                'author_slug'=>Str::slug('The Changmi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Trang Nhung',
                'author_slug'=>Str::slug('Trang Nhung'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'William Jang',
                'author_slug'=>Str::slug('William Jang'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Mike wattie',
                'author_slug'=>Str::slug('Mike wattie'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Min Jin Young',
                'author_slug'=>Str::slug('Min Jin Young'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Ahn Jean myung',
                'author_slug'=>Str::slug('Ahn Jean myung'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Juliana Jiyoon Lee',
                'author_slug'=>Str::slug('Juliana Jiyoon Lee'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Stacey Riches',
                'author_slug'=>Str::slug('Stacey Riches'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Claire Luong',
                'author_slug'=>Str::slug('Claire Luong'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Nguyễn Văn Hiệp',
                'author_slug'=>Str::slug('Nguyễn Văn Hiệp'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>4
            ],
            [
                'author_name'=>'Diệp Hồng Vũ',
                'author_slug'=>Str::slug('Diệp Hồng Vũ'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'David A. Phillips',
                'author_slug'=>Str::slug('David A. Phillips'),
                'avatar'=>'David-A-Phillips.jpg',
                'birth_date'=>'1934-1-7',
                'description'=>'là một nhà triết học và một chuyên gia về chăm sóc sức khỏe – dinh dưỡng. Ông dành cả cuộc đời để nghiên cứu, giảng dạy, diễn thuyết và tư vấn về Nhân số học, về sức khỏe và phát triển cá nhân cho mọi người. Tiến sĩ A. Phillips viết tổng cộng 12 cuốn sách, trong đó The Complete Book of Numerology được biết đến rộng rãi nhất',
                'category_id'=>5
            ],
            [
                'author_name'=>'Ca Tây',
                'author_slug'=>Str::slug('Ca Tây'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'John Gray',
                'author_slug'=>Str::slug('John Gray'),
                'avatar'=>'John-Gray-author-in-2016.jpg',
                'birth_date'=>'1954-12-28',
                'description'=>'là một cố vấn, giảng viên và tác giả người Mỹ. Năm 1969, ông bắt đầu một liên hệ kéo dài 9 năm với Maharishi Mahesh Yogi trước khi bắt đầu sự nghiệp với tư cách là một tác giả và cố vấn quan hệ cá nhân. Năm 1992, ông xuất bản cuốn sách Men Are from Mars, Women Are from Venus, trở thành cuốn sách bán chạy nhất trong thời gian dài và hình thành chủ đề trung tâm của tất cả các cuốn sách và hoạt động nghề nghiệp tiếp theo của ông. Sách của ông đã bán được hàng triệu bản.',
                'category_id'=>5
            ],
            [
                'author_name'=>'Minh Niệm',
                'author_slug'=>Str::slug('Minh Niệm'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Robin Sharma',
                'author_slug'=>Str::slug('Robin Sharma'),
                'avatar'=>'T1-0257.jpg',
                'birth_date'=>'1964-6-16',
                'description'=>'là nhà văn người Canada, nổi tiếng với bộ sách The Monk Who Sold His Ferrari. Sharma làm luật sư tranh tụng cho đến năm 25 tuổi, khi anh tự xuất bản MegaLiving, một cuốn sách về quản lý căng thẳng và tâm linh.',
                'category_id'=>5
            ],
            [
                'author_name'=>'Choi Kwanghuyn',
                'author_slug'=>Str::slug('Choi Kwanghuyn'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Tống Mặc',
                'author_slug'=>Str::slug('Tống Mặc'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Bác sĩ George K. Simon',
                'author_slug'=>Str::slug('Bác sĩ George K. Simon'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Tạ Quốc Kế',
                'author_slug'=>Str::slug('Tạ Quốc Kế'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Trâu Hoành Minh',
                'author_slug'=>Str::slug('Trâu Hoành Minh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Trương Manh',
                'author_slug'=>Str::slug('Trương Manh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Tần Lộ',
                'author_slug'=>Str::slug('Tần Lộ'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Mã Hạo Thiên',
                'author_slug'=>Str::slug('Mã Hạo Thiên'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Vĩ Nhân',
                'author_slug'=>Str::slug('Vĩ Nhân'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Otegha Uwagba',
                'author_slug'=>Str::slug('Otegha Uwagba'),
                'avatar'=>'tải xuống.jpg',
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>' là nhà văn chuyên nghiệp, nhà báo và tác giả có sách bán chạy nhất. Cô cũng được biết đến với vai trò diễn giả truyền động lực được yêu thích. Ngoài ra, cô cũng là chuyên gia tư vấn cuộc sống & sự nghiệp cho hàng trăm ngàn phụ nữ trên khắp hành tinh.',
                'category_id'=>5
            ],
            [
                'author_name'=>'Vãn Tình',
                'author_slug'=>Str::slug('Vãn Tình'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>'là một trong số ít nữ tác giả trẻ người Trung Quốc đi sâu vào khai thác mối quan hệ giữa bản thân, gia đình và cuộc sống. Với ngòi bút tả thực, giọng văn sắc sảo, chiêm nghiệm về cuộc đời sâu sắc và tinh tế, các tác phẩm của Văn Tình đều được coi là hành trang cho các bạn trẻ trong cuộc sống hiện đại.',
                'category_id'=>5
            ],
            [
                'author_name'=>'Rhowa Byrne',
                'author_slug'=>Str::slug('Rhowa Byrne'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>5
            ],
            [
                'author_name'=>'Dương Hương',
                'author_slug'=>Str::slug('Dương Hương'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Nhiều Tác Giả',
                'author_slug'=>Str::slug('Nhiều Tác Giả'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Nguyễn Đình Thành Công',
                'author_slug'=>Str::slug('Nguyễn Đình Thành Công'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Trang Anh',
                'author_slug'=>Str::slug('Trang Anh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Nguyễn Xuân Nam',
                'author_slug'=>Str::slug('Nguyễn Xuân Nam'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Nguyễn Thành Huân',
                'author_slug'=>Str::slug('Nguyễn Thành Huân'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Lê Văn Tuấn',
                'author_slug'=>Str::slug('Lê Văn Tuấn'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Moon',
                'author_slug'=>Str::slug('Moon'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Lê Hoành Phò',
                'author_slug'=>Str::slug('Lê Hoành Phò'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Lê Hồng Đức',
                'author_slug'=>Str::slug('Lê Hồng Đức'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Đào Thị Ngọc Hà',
                'author_slug'=>Str::slug('Đào Thị Ngọc Hà'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Đỗ Hoàng Hà',
                'author_slug'=>Str::slug('Đỗ Hoàng Hà'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Lê Hoàng Nam',
                'author_slug'=>Str::slug('Lê Hoàng Nam'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Đoàn Minh Châu',
                'author_slug'=>Str::slug('Đoàn Minh Châu'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Trần Công Diêu',
                'author_slug'=>Str::slug('Trần Công Diêu'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Nguyễn Anh Vinh',
                'author_slug'=>Str::slug('Nguyễn Anh Vinh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>6
            ],
            [
                'author_name'=>'Tiến sĩ Shefali Tsabary',
                'author_slug'=>Str::slug('Tiến sĩ Shefali Tsabary'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Uyên Bùi ',
                'author_slug'=>Str::slug('Uyên Bùi '),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'BS. Trí Đoàn',
                'author_slug'=>Str::slug('BS. Trí Đoàn'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Ibuka Masaru',
                'author_slug'=>Str::slug('Ibuka Masaru'),
                'avatar'=>'11.jpg',
                'birth_date'=>'1908-4-11',
                'description'=>'là một nhà công nghiệp điện tử người Nhật Bản và là người đồng sáng lập Sony, cùng với Akio Morita.',
                'category_id'=>7
            ],
            [
                'author_name'=>'Ito Mika',
                'author_slug'=>Str::slug('Ito Mika'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Tsutsumi Chiharu',
                'author_slug'=>Str::slug('Tsutsumi Chiharu'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Tracy Hogg',
                'author_slug'=>Str::slug('Tracy Hogg'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Melinda Blau',
                'author_slug'=>Str::slug('Melinda Blau'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Masato Takeuchi',
                'author_slug'=>Str::slug('Masato Takeuchi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Urako Kanamori',
                'author_slug'=>Str::slug('Urako Kanamori'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Erika Takeuchi',
                'author_slug'=>Str::slug('Erika Takeuchi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Shefali Tsabary',
                'author_slug'=>Str::slug('Shefali Tsabary'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Bubu Huong',
                'author_slug'=>Str::slug('Bubu Huong'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Mẹ Ong Bông',
                'author_slug'=>Str::slug('Mẹ Ong Bông'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Hachun Lyonnet',
                'author_slug'=>Str::slug('Hachun Lyonnet'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Bernadette Russell',
                'author_slug'=>Str::slug('Bernadette Russell'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Daniel J. Siegel',
                'author_slug'=>Str::slug('Daniel J. Siegel'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Tina Payne Bryson',
                'author_slug'=>Str::slug('Tina Payne Bryson'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Reiko Ueda',
                'author_slug'=>Str::slug('Reiko Ueda'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Junko Ueda',
                'author_slug'=>Str::slug('Junko Ueda'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Ths. Phạm Thị Thúy',
                'author_slug'=>Str::slug('Ths. Phạm Thị Thúy'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Susan Mayclin Stephenson',
                'author_slug'=>Str::slug('Susan Mayclin Stephenson'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Makoto Shichida',
                'author_slug'=>Str::slug('Makoto Shichida'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Ko Shichida',
                'author_slug'=>Str::slug('Ko Shichida'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Phạm Dung',
                'author_slug'=>Str::slug('Phạm Dung'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Kim Geon Oh',
                'author_slug'=>Str::slug('Kim Geon Oh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'Trương Nguyện Thành',
                'author_slug'=>Str::slug('Trương Nguyện Thành'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>7
            ],
            [
                'author_name'=>'José Mauro de Vasconcelos',
                'author_slug'=>Str::slug('José Mauro de Vasconcelos'),
                'avatar'=>'José Mauro de Vasconcelos.jpg',
                'birth_date'=>'1920-2-26',
                'description'=>'là một nhà văn người Brazil.',
                'category_id'=>8
            ],
            [
                'author_name'=>'Ocean Vương',
                'author_slug'=>Str::slug('Ocean Vương'),
                'avatar'=>'Ocean Vương.jpg',
                'birth_date'=>'1988-10-14',
                'description'=>'là một nhà thơ, nhà tiểu luận và tiểu thuyết gia người Mỹ gốc Việt. Anh là người nhận được học bổng Ruth Lilly / Sargent Rosenberg năm 2014 từ Poetry Foundation, Giải thưởng Whites 2016 và Giải thưởng Eliot TS 2017 cho thơ của anh.[2] Cuốn tiểu thuyết đầu tay của anh, Một thoáng ta rực rỡ ở nhân gian, được xuất bản vào năm 2019. Năm 2019, anh nhận giải MacArthur Fellowship, còn được gọi là "giải thiên tài".',
                'category_id'=>8
            ],
            [
                'author_name'=>'Yagisawa Satoshi',
                'author_slug'=>Str::slug('Yagisawa Satoshi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Koga Fumitake',
                'author_slug'=>Str::slug('Koga Fumitake'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Kishimi Ichiro',
                'author_slug'=>Str::slug('Kishimi Ichiro'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Andrea Hirata',
                'author_slug'=>Str::slug('Andrea Hirata'),
                'avatar'=>'Andrea Hirata.jpg',
                'birth_date'=>'1967-10-24',
                'description'=>'là một tác giả người Indonesia nổi tiếng với tiểu thuyết Laskar Pelangi năm 2005 và các phần tiếp theo của nó.',
                'category_id'=>8
            ],
            [
                'author_name'=>'Paulo Coelho',
                'author_slug'=>Str::slug('Paulo Coelho'),
                'avatar'=>'Paulo Coelho.jpg',
                'birth_date'=>'1947-8-24',
                'description'=>'là tiểu thuyết gia nổi tiếng người Brasil.',
                'category_id'=>8
            ],
            [
                'author_name'=>'Higashino Keigo',
                'author_slug'=>Str::slug('Higashino Keigo'),
                'avatar'=>'Higashino Keigo.jpg',
                'birth_date'=>'1958-2-4',
                'description'=>'là một tác giả người Nhật Bản được biết tới rộng rãi qua các tiểu thuyết trinh thám của ông. Ông từng là Chủ tịch thứ 13 của Hội nhà văn Trinh thám Nhật Bản từ năm 2009 tới năm 2013. Ông đã thắng giải Edogawa Rampo lần thứ 31 vào năm 1985 cho tiểu thuyết Hōkago',
                'category_id'=>8
            ],
            [
                'author_name'=>'Ichikawa Takuji',
                'author_slug'=>Str::slug('Ichikawa Takuji'),
                'avatar'=>'Ichikawa Takuji.jpg',
                'birth_date'=>'1962-10-7',
                'description'=>'là một tiểu thuyết gia người Nhật. Những tác phẩm nổi tiếng nhất của Ichikawa có thể kể đến Em sẽ đến cùng cơn mưa (Ima, Ai ni Yukimasu, /いま、会いにゆきます, 2003), Tấm ảnh tình yêu và một câu chuyện khác (Renai shashin: mōhitotsu no monogatari/​恋愛写真: もうひとつの物語, 2003) và Nếu gặp người ấy cho tôi gửi lời chào (Sono Toki wa Kare ni Yoroshiku, 2004)',
                'category_id'=>8
            ],
            [
                'author_name'=>'Diệp Lạc Vô Tâm',
                'author_slug'=>Str::slug('Diệp Lạc Vô Tâm'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Nhục Bao Bất Cật Nhục',
                'author_slug'=>Str::slug('Nhục Bao Bất Cật Nhục'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Mishima Yukio',
                'author_slug'=>Str::slug('Mishima Yukio'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Lucy Maud Montgomery',
                'author_slug'=>Str::slug('Lucy Maud Montgomery'),
                'avatar'=>'Lucy Maud Montgomery.jpg',
                'birth_date'=>'1874-11-30',
                'description'=>'là nhà văn người Canada nổi tiếng với sê-ri truyện viết về cô bé Anne tóc đỏ. Bà tiếp tục viết 20 cuốn tiểu thuyết cùng với khoảng 500 truyện ngắn và thơ.',
                'category_id'=>8
            ],
            [
                'author_name'=>'Tracy Garvis Graves',
                'author_slug'=>Str::slug('Tracy Garvis Graves'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Khaled Hosseini',
                'author_slug'=>Str::slug('Khaled Hosseini'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Guillermo Del Toro',
                'author_slug'=>Str::slug('Guillermo Del Toro'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Daniel Kraus',
                'author_slug'=>Str::slug('Daniel Kraus'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Vũ Trọng Phụng',
                'author_slug'=>Str::slug('Vũ Trọng Phụng'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Agatha Christie',
                'author_slug'=>Str::slug('Agatha Christie'),
                'avatar'=>'Agatha Christie.jpg',
                'birth_date'=>'1890-9-15',
                'description'=>'là một nhà văn trinh thám người Anh. Bà còn viết tiểu thuyết lãng mạn với bút danh Mary Westmacott, nhưng vẫn được nhớ đến hơn cả với bút danh Agatha Christie và hơn 80 tiểu thuyết trinh thám',
                'category_id'=>8
            ],
            [
                'author_name'=>'Lan Rùa',
                'author_slug'=>Str::slug('Lan Rùa'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>8
            ],
            [
                'author_name'=>'Harper Lee',
                'author_slug'=>Str::slug('Harper Lee'),
                'avatar'=>'Harper Lee.jpg',
                'birth_date'=>'1926-4-28',
                'description'=>' một nữ nhà văn người Mỹ. Bà được biết tới nhiều nhất qua tiểu thuyết đầu tay Giết con chim nhại. Ngày 5 tháng 11 năm 2007, Harper Lee đã được tổng thống George W Bush trao Huân chương Tự do Tổng thống Hoa Kỳ (Presidential Medal of Freedom), huân chương cao quý nhất dành cho công dân Hoa Kỳ, vì những đóng góp của bà cho văn học Mỹ',
                'category_id'=>8
            ],
            [
                'author_name'=>'Gege Akutami',
                'author_slug'=>Str::slug('Gege Akutami'),
                'avatar'=>null,
                'birth_date'=>'1992-2-26',
                'description'=>'là một họa sĩ truyện tranh Nhật Bản, được biết đến với tác phẩm Jujutsu Kaisen. Gege Akutami là một bút danh, chưa rõ tên thật và giới tính của tác giả.',
                'category_id'=>9
            ],
            [
                'author_name'=>'Yoshito Usui',
                'author_slug'=>Str::slug('Yoshito Usui'),
                'avatar'=>'Yoshito Usui.jpg',
                'birth_date'=>'1958-4-21',
                'description'=>'là một hoa sĩ truyện tranh người Nhật, tác giả của bộ truyện tranh nổi tiếng Shin - cậu bé bút chì. Ông sinh ra ở thành phố Shizuoka, tỉnh Shizuoka, Nhật Bản',
                'category_id'=>9
            ],
            [
                'author_name'=>'Gosho Aoyama',
                'author_slug'=>Str::slug('Gosho Aoyama'),
                'avatar'=>'Gosho Aoyama.jpg',
                'birth_date'=>'1963-6-21',
                'description'=>'là một mangaka nổi tiếng với các tác phẩm như Yaiba, Magic Kaito hay Thám tử lừng danh Conan',
                'category_id'=>9
            ],
            [
                'author_name'=>'Seimaru Amagi',
                'author_slug'=>Str::slug('Seimaru Amagi'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'Fumiya Sato',
                'author_slug'=>Str::slug('Fumiya Sato'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'Osamu Tezuka',
                'author_slug'=>Str::slug('Osamu Tezuka'),
                'avatar'=>'Osamu Tezuka.jpg',
                'birth_date'=>'1989-2-9',
                'description'=>'là một họa sĩ truyện tranh, họa sĩ diễn hoạt, nhà sản xuất phim, bác sĩ y khoa và nhà hoạt động xã hội người Nhật',
                'category_id'=>9
            ],
            [
                'author_name'=>'Koyoharu Gotouge',
                'author_slug'=>Str::slug('Koyoharu Gotouge'),
                'avatar'=>null,
                'birth_date'=>'1989-5-5',
                'description'=>'là một mangaka người Nhật Bản, nổi tiếng với loạt manga Thanh gươm diệt quỷ. Tính đến tháng 2 năm 2021, bộ truyện đã bán ra hơn 150 triệu bản trên toàn thế giới, qua đó trở thành loạt manga bán chạy thứ 9 mọi thời đại',
                'category_id'=>9
            ],
            [
                'author_name'=>'Negi Haruba',
                'author_slug'=>Str::slug('Negi Haruba'),
                'avatar'=>null,
                'birth_date'=>'1991-7-27',
                'description'=>'là một tác giả manga Nhật Bản. Anh tốt nghiệp bằng Trident College of Design năm 2013. Bắt đầu sự nghiệp với tác phẩm đầu tay Coward Cross World được xuất bản trên tạp chí Kodansha năm 2013. Sau đó cùng với Hirose Shun, cả hai đã xuất bản Rengoku no Karma trên tạp chí Weekly Shōnen 2014',
                'category_id'=>9
            ],
            [
                'author_name'=>'Eiichiro Oda',
                'author_slug'=>Str::slug('Eiichiro Oda'),
                'avatar'=>'Eiichiro Oda.jpg',
                'birth_date'=>'1975-1-1',
                'description'=>'là một họa sĩ truyện tranh người Nhật Bản, hiện đang sáng tác cho nhà xuất bản Shūeisha. Ông là tác giả của bộ truyện nổi tiếng thế giới One Piece',
                'category_id'=>9
            ],
            [
                'author_name'=>'Masashi Kishimoto',
                'author_slug'=>Str::slug('Masashi Kishimoto'),
                'avatar'=>'Masashi Kishimoto.jpg',
                'birth_date'=>'1974-11-8',
                'description'=>'là một họa sĩ truyện tranh đã được biết đến qua bộ truyện tranh nổi tiếng thế giới Naruto. Người em song sinh của Masashi, Kishimoto Seishi, cũng là một họa sĩ truyện tranh, tác giả của 666 Satan và Blazer Drive',
                'category_id'=>9
            ],
            [
                'author_name'=>' Shimizu Yu',
                'author_slug'=>Str::slug(' Shimizu Yu'),
                'avatar'=>'Akira Toriyama.jpg',
                'birth_date'=>'1955-4-5',
                'description'=>'là một tác giả manga Nhật Bản, nổi tiếng với tác phẩm Dragon Ball và Dr. Slump. Nét vẽ của ông có ảnh hưởng từ hai bộ Astro Boy và 101 con chó đốm',
                'category_id'=>9
            ],
            [
                'author_name'=>'Rumiko Takahashi',
                'author_slug'=>Str::slug('Rumiko Takahashi'),
                'avatar'=>'Rumiko Takahashi.jpg',
                'birth_date'=>'1957-10-10',
                'description'=>'là một họa sĩ truyện tranh người Nhật Bản. Với một số tác phẩm thành công về mặt thương mại, bắt đầu với Urusei Yatsura vào năm 1978, Takahashi là một trong những mangaka giàu có và nổi tiếng nhất Nhật Bản',
                'category_id'=>9
            ],
            [
                'author_name'=>'Yoshino Satsuki',
                'author_slug'=>Str::slug('Yoshino Satsuki'),
                'avatar'=>null,
                'birth_date'=>'1985-5-25',
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'Clamp',
                'author_slug'=>Str::slug('Clamp'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'Kamui Fujiwara',
                'author_slug'=>Str::slug('Kamui Fujiwara'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'Chiaki Kawamata',
                'author_slug'=>Str::slug('Chiaki Kawamata'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'AidaIro',
                'author_slug'=>Str::slug('AidaIro'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>9
            ],
            [
                'author_name'=>'GS. Hoàng Phê',
                'author_slug'=>Str::slug('GS. Hoàng Phê'),
                'avatar'=>'GS. Hoàng Phê.jpg',
                'birth_date'=>'1919-7-15',
                'description'=>'là một nhà từ điển học, chuyên gia về chính tả tiếng Việt',
                'category_id'=>10
            ],
            [
                'author_name'=>'Shozo Shibuya',
                'author_slug'=>Str::slug('Shozo Shibuya'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Huyền Linh',
                'author_slug'=>Str::slug('Huyền Linh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Văn Lang Culture Jsc',
                'author_slug'=>Str::slug('Văn Lang Culture Jsc'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Thành Yến',
                'author_slug'=>Str::slug('Thành Yến'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],
            [
                'author_name'=>'Bích Hằng',
                'author_slug'=>Str::slug('Bích Hằng'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Hoàng Tuấn Công',
                'author_slug'=>Str::slug('Hoàng Tuấn Công'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Lại Nguyên Ân',
                'author_slug'=>Str::slug('Lại Nguyên Ân'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Bùi Văn Trọng Cường',
                'author_slug'=>Str::slug('Bùi Văn Trọng Cường'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Nguyễn Q. Thắng ',
                'author_slug'=>Str::slug('Nguyễn Q. Thắng '),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Nguyễn Bá Thế',
                'author_slug'=>Str::slug('Nguyễn Bá Thế'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Nguyễn Anh Vinh',
                'author_slug'=>Str::slug('Nguyễn Anh Vinh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Phạm Lê Liên ',
                'author_slug'=>Str::slug('Phạm Lê Liên '),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Nguyễn Tôn Nhan',
                'author_slug'=>Str::slug('Nguyễn Tôn Nhan'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'G.S Nguyễn Lân',
                'author_slug'=>Str::slug('G.S Nguyễn Lân'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Vũ Ngọc Phan',
                'author_slug'=>Str::slug('Vũ Ngọc Phan'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

            [
                'author_name'=>'Trần Văn Chánh',
                'author_slug'=>Str::slug('Trần Văn Chánh'),
                'avatar'=>null,
                'birth_date'=>date("Y-m-d", mt_rand($start, $end)),
                'description'=>null,
                'category_id'=>10
            ],

        ];
        DB::table('author')->insert($Data);
    }
}
