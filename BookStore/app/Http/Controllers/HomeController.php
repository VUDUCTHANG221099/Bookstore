<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Book;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    private $category;
    private $book;
    private $post;
    private $ads;
    public function __construct(){
        $this->category=new Category();
        $this->book=new Book();
        $this->post=new Post();
        $this->ads=new Ads();

    }
    public function index(){
        session()->put('book_token', Str::random(40));

        $post=$this->post->ListPostFE();
        $adsCenter=$this->ads->AdsFE(1,'get');
        $adsRight=$this->ads->AdsFE(2,'first');
        $bookSale=$this->book->BookShowHomeFE('!=',null,4);
        $bookOnSale=$this->book->BookShowHomeFE('!=',null,8);
        $bookHot=$this->book->BookShowHomeFE('=',1,4);;

      
        $viewData=[
           'listPostFE'=>$post,
           'adsCenter'=>$adsCenter,
           'adsRight'=>$adsRight,
           'bookSale'=>$bookSale,
           'bookOnSale'=>$bookOnSale,
           'bookHot'=>$bookHot,
        ];
        return view('index',$viewData);
    }
    public function ListCategory(){
        $category=$this->category->AllCategory();
        // dd($category);
        return response()->json(['categories'=> $category]);
    }
    public function search(Request $request){
        $book=$this->book->Search($request->keyword);
        
        if($book->IsEmpty()){
            $book=null;
        }else{
            $book=$book;
        }
        $viewData=[
            'search'=>$book,
        ];
        return view('layouts.search',$viewData);
    }
    public function viewquick(Request $request){
        $book=$this->book->GetBook($request->slug);
        $session=DB::table('sessions')->where(['slug'=>$request->slug,'user_id'=>Auth::user()->id])->first();
        $bookView=view('layouts.sub_xem_nhanh',compact('book'))->render();
        return response()->json(['bookView'=>$bookView,'book'=>$book,'session'=>$session]);
    }
    // public function ListPostFE(){
    //     return response()->json(['listpostFE'=>$post]);
    // }
    public function introduce(){
        return view('introduce');
    }
}
