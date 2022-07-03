<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Book extends Model
{
    use HasFactory;
    protected $table = "book";
    protected $guarded = [];
    /**Get All Category */
    public function getAllCategory()
    {
        return Category::all();
    }
    /**Get All Author */
    public function getAllAuthor()
    {
        return Author::all();
    }
    /**Add Book*/
    public function addBook($book_name, $book_desc, $language, $book_avatar, $year_publish, $quantity, $price, $nxb, $pages, $is_top, $category, $author)
    {
        DB::table('book')->insert([
            'book_name' => $book_name,
            'book_slug' => Str::slug($book_name),
            'description' => $book_desc,
            'language' => $language,
            'avatar' => $book_avatar,
            'year_publish' => $year_publish,
            'quantity' => $quantity,
            'price' => $price,
            'NXB' => $nxb,
            'pages' => $pages,
            'is_top' => $is_top,
            'status' => 1,
            'category_id' => $category,
            'author_id' => $author,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    /**All Bookmarks **/
    public function ListBook()
    {
        $book = Book::join('author', 'author.id', 'book.author_id')->OrderBy('book.created_at', 'desc')
            ->join('category', 'category.id', 'book.category_id')
            ->select('book.*', 'author.author_name as author_name', 
            'category.category_name as category_name')
            ->get();
        return $book;
    }
    /*Get Book**/
    public function GetBook($slug)
    {
        $book = Book::where('book.book_slug', $slug)
            ->join('category', 'category.id', 'book.category_id')
            ->join('author', 'author.id', 'book.author_id')
            ->select('book.*', 'author.id as author_id', 'category.id as category_id','category.category_name as category_name')
            ->first();
        return $book;
    }
    /**Update Book*/
    public function UpdateBook($slug, $book_name, $book_desc, $language, $book_avatar, $year_publish, $quantity, $price, $nxb, $pages, $is_top, $category, $author)
    {
        DB::table('book')->where('book_slug', $slug)->update([
            'book_name' => $book_name,
            'book_slug' => Str::slug($book_name),
            'description' => $book_desc,
            'language' => $language,
            'avatar' => $book_avatar,
            'year_publish' => $year_publish,
            'quantity' => $quantity,
            'price' => $price,
            'NXB' => $nxb,
            'pages' => $pages,
            'is_top' => $is_top,
            'status' => 1,
            'category_id' => $category,
            'author_id' => $author,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
    /***********************Front End************** */
    /**List All */
    public function FEListBook()
    {
        $book = DB::table('book')->join('category', 'category.id', 'book.category_id')->select('book.*', 'category.category_name as category_name')
            ->join('author', 'author.id', 'book.author_id')->paginate(12);
        return $book;
    }

    /**List Book [A-Z|Price-Min|Z-A|Price-Max|Book-New|Book-old] */
    public function FESortBook($column, $type, $value, $slug)
    {
        $book = DB::table('book')->join('category', 'category.id', 'book.category_id')->select('book.*', 'category.category_name as category_name')
            ->join('author', 'author.id', 'book.author_id')->where('category.category_slug', $value, $slug)
            ->orderBy($column, $type)->paginate(12);
        return $book;
    }
    public function FEListBookCate($slug)
    {
        $book = DB::table('book')->join('category', 'category.id', 'book.category_id')->select('book.*', 'category.category_name as category_name')
            ->join('author', 'author.id', 'book.author_id')->where('category.category_slug', $slug)
            ->paginate(12);
        return $book;
    }
    public function FECate($slug)
    {
        $cate = DB::table('category')->where('category_slug', $slug)->first();
        return $cate;
    }
    /**Book hot */
    public function FEBookHot()
    {
        $book = DB::table('book')->where('is_top', 1)->where('status', 1)->limit(4)->get();
        return $book;
    }
    /**Book Hot */
    public function FEBookHotAll()
    {
        $book = DB::table('book')->join('category', 'category.id', 'book.category_id')
            ->where('book.is_top', 1)->paginate(12);
        return $book;
    }
    public function FEBookSortHot($column, $type, $value, $slug)
    {
        $book = DB::table('book')->join('category', 'category.id', 'book.category_id')
        ->select('book.*', 'category.category_name as category_name')
            ->join('author', 'author.id', 'book.author_id')
            ->where('category.category_slug', $value, $slug)->where('book.is_top', 1)
            ->orderBy($column, $type)->paginate(12);

        return $book;
    }
    //Search
    public function Search($keyword)
    {
        $serach = DB::table('book')
            ->join('author', 'author.id', 'book.author_id')
            ->where('book.book_name', 'like', '%' . $keyword . '%')
            ->orwhere('author.author_name', 'like', '%' . $keyword . '%')
            ->select('author.author_name as author_name', 'book.*')
            ->paginate(12);
        return $serach;
    }

    ///Book Details FE
    public function bookDetailsFE($book_slug){
        $bookDetails=Book::where('book.book_slug',$book_slug)
        ->join('category','category.id','book.category_id')
        ->select('book.*','category.category_name as category_name',
        'category.category_slug as category_slug')->first();
       return $bookDetails;
    }
    public function bookSimilar($category_id,$book_slug){
      $bookSimilar=  Book::where('category_id',$category_id)
        ->where('book_slug','!=',$book_slug)->limit(4)->get();
        return $bookSimilar;
    }

    //Home FE
    public function BookShowHomeFE($operator,$type,$number){
      $book=  Book::orderByDesc('book.created_at')->where('book.status',1)
      ->where('book.is_top',$operator,$type)
      ->join('category','category.id','book.category_id')->select('book.*')
      ->limit($number)->get();
      return $book;
    }
    // $bookSale=Book::orderByDesc('created_at')->where('status',1)->limit(4)->get();
    // $bookOnSale=Book::orderByDesc('created_at')->where('status',1)->limit(8)->get();
    // $bookHot=Book::orderByDesc('created_at')->where(['is_top'=>1,'status'=>1])->limit(4)->get();
}
