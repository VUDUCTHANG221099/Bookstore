<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class BookController extends Controller
{
    private $book,$ads;
    public function __construct()
    {
        $this->book = new Book();
        $this->ads=new Ads();
    }
    public function index($slug = "all")
    {
        // dd(request()->get('sort'));
        $bookHot=$this->book->FEBookHot();
        $adsLeft=$this->ads->AdsFE(0,'first');
        session()->put('book_token', Str::random(40));

        if ($slug == "all") {

            $book = $this->book->FEListBook();
            $category = null;
            switch (request()->get('sort')) {
                case 'alpha-asc':
                    $book = $this->book->FESortBook("book.book_name", 'asc','!=',null);
                    break;
                case 'alpha-desc':
                    $book = $this->book->FESortBook("book.book_name", 'desc','!=',null);
                    break;
                case 'price-asc':
                    $book = $this->book->FESortBook('book.price', 'asc','!=',null);
                    break;

                case 'price-desc':
                    $book = $this->book->FESortBook('book.price', 'desc','!=',null);
                    break;
                case 'created-desc':
                    $book = $this->book->FESortBook('book.created_at', 'desc','!=',null);
                    break;
                case 'created-asc':
                    $book = $this->book->FESortBook('book.created_at', 'asc','!=',null);
                    break;
                default:
                    $book = $this->book->FEListBook();
                    break;
            }
        }elseif($slug=='sach-noi-bat'){
            $book = $this->book->FEBookHotAll();
            $category = null;
            switch (request()->get('sort')) {
                case 'alpha-asc':
                    $book = $this->book->FEBookSortHot("book.book_name", 'asc','!=',null);
                    break;
                case 'alpha-desc':
                    $book = $this->book->FEBookSortHot("book.book_name", 'desc','!=',null);
                    break;
                case 'price-asc':
                    $book = $this->book->FEBookSortHot('book.price', 'asc','!=',null);
                    break;

                case 'price-desc':
                    $book = $this->book->FEBookSortHot('book.price', 'desc','!=',null);
                    break;
                case 'created-desc':
                    $book = $this->book->FEBookSortHot('book.created_at', 'desc','!=',null);
                    break;
                case 'created-asc':
                    $book = $this->book->FEBookSortHot('book.created_at', 'asc','!=',null);
                    break;
                default:
                    $book = $this->book->FEBookHotAll();
                    break;
            }
        } 
        else {
            $category = $this->book->FECate($slug);
            $book = $this->book->FEListBookCate($slug);

                // dd($book);
                switch (request()->get('sort')) {
                    case 'alpha-asc':
                        $book = $this->book->FESortBook("book.book_name", 'asc','=',$slug);
                        break;
    
                    case 'alpha-desc':
                        $book = $this->book->FESortBook("book.book_name", 'desc','=',$slug);
                        break;
                    case 'price-asc':
                        $book = $this->book->FESortBook('book.price', 'asc','=',$slug);
                        break;
    
                    case 'price-desc':
                        $book = $this->book->FESortBook('book.price', 'desc','=',$slug);
                        break;
                    case 'created-desc':
                        $book = $this->book->FESortBook('book.created_at', 'desc','=',$slug);
                        break;
                    case 'created-asc':
                        $book = $this->book->FESortBook('book.created_at', 'asc','=',$slug);
                        break;
                    default:
                        $book = $this->book->FEListBookCate($slug);
                        break;
                }
        }
        $viewData = [
            'book' => $book,
            'category' => $category,
            'bookHot'=>$bookHot,
            'adsLeft'=>$adsLeft,
        ];
        return view('book', $viewData);
    }

    public function bookDetails($book_slug){
        $bookDetails=$this->book->bookDetailsFE($book_slug);
        // dd($bookDetails);
        $bookHot=$this->book->FEBookHot();
        $bookSimilar=$this->book->bookSimilar($bookDetails->category_id,$book_slug);
        $viewData=[
            'bookDetails'=>$bookDetails,
            'bookHot'=>$bookHot,
            'bookSimilar'=>$bookSimilar,
        ];
        return view('bookDetails',$viewData);
    }
    
}
