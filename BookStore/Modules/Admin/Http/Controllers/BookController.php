<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $book;
    public function __construct()
    {
        $this->book = new Book();
    }
    public function index()
    {
        $book = $this->book->ListBook();
        // dd($book);
        $viewData = [
            'book' => $book,
            'count' => 1,
        ];
        return view('admin::book', $viewData);
    }

    public function ViewAddBook()
    {
        $category = $this->book->getAllCategory();
        $author = $this->book->getAllAuthor();

        $viewData = [
            'cate' => $category,
            'author' => $author,
        ];
        return view('admin::book.add', $viewData);
    }
    /*Add Book*/
    public function addBook(Request $request)
    {
        // replace
        $quantity = (int)(Str::replace(',', '', $request->quantity));
        $price = (float)(Str::replace(',', '', $request->price));
        $pages = (int)(Str::replace(',', '', $request->pages));
        // replace

        // dd($request->book_images);
        $book_name=Str::of($request->book_name)->trim();

        $book = Book::where(['book_name' => $book_name])->first();
        if ($book) {
            return response()->json(['error' => 'Tên sách đã tồn tại!']);
        } else {
            if ($request->hasFile('book_images')) {


                //    dd($request->all());

                $slug = Str::slug($book_name);
                // $random=Str::random(5);
                $file = $request->file('book_images');
                // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
                $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
                $book_images = $slug . '.' . $extension; // dd($book_images);
                // dd($book_images);
                $this->book->addBook(
                    $book_name,
                    $request->book_desc,
                    $request->language,
                    $book_images,
                    $request->year_publish,
                    $quantity,
                    $price,
                    $request->nxb,
                    $pages,
                    $request->is_top,
                    $request->category,
                    $request->author,
                );
                $file->move('images/book', $book_images);
                
                return response()->json(['success' => 'Thêm sách thành công!']);
            } else {

                $this->book->addBook(
                    $book_name,
                    $request->book_desc,
                    $request->language,
                    null,
                    $request->year_publish,
                    $quantity,
                    $price,
                    $request->nxb,
                    $pages,
                    $request->is_top,
                    $request->category,
                    $request->author,
                );
                return response()->json(['success' => 'Thêm sách thành công!']);
            }
        }
    }
    /**Remove Book */
    public function removeBook(Request $request)
    {
        $book = Book::where('book_slug', $request->book_slug)->first();
        if ($book->avatar) {
            File::delete("images/book/$book->avatar");
            $book->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        } else {
            $book->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        }
    }
    /*Get Book*/
    public function getBook($slug)
    {
        $book = $this->book->GetBook($slug);
        $category = $this->book->getAllCategory();
        $author = $this->book->getAllAuthor();
        $viewData = [
            'book' => $book,
            'cate' => $category,
            'author' => $author,
        ];
        return view('admin::book.update', $viewData);
    }
    /*Update Book */
    public function updateBook(Request $request)
    {
        // dd($request->all());
        $book_name=Str::of($request->book_name)->trim();

        // replace
        $quantity = (int)(Str::replace(',', '', $request->quantity));
        $price = (float)(Str::replace(',', '', $request->price));
        $pages = (int)(Str::replace(',', '', $request->pages));
        // replace
        if ($quantity==0) {
            DB::table('book')->where('book_slug', $request->book_slug)->update(['status'=>0]);

        }

        if ($request->hasFile('book_images')) {



            //    dd($request->all());

            $slug = Str::slug($book_name);
            // $random=Str::random(5);
            $file = $request->file('book_images');
            // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
            $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
            $book_images = $slug . '.' . $extension; // dd($book_images);
            // dd($book_images);
            $this->book->UpdateBook(
                $request->book_slug,
                $book_name,
                $request->book_desc,
                $request->language,
                $book_images,
                $request->year_publish,
                $quantity,
                $price,
                $request->nxb,
                $pages,
                $request->is_top,
                $request->category,
                $request->author,
            );
            $file->move('images/book', $book_images);
            if ($quantity==0) {
                DB::table('book')->where('book_slug', $request->book_slug)->update(['status'=>0]);
            }
            return response()->json(['success' => 'Cập nhật sách thành công!']);
        } else {
            $update = Book::where('book_slug', $request->book_slug)->first();
            if (empty($update->avatar)) {

                $this->book->UpdateBook(
                    $request->book_slug,
                    $book_name,
                    $request->book_desc,
                    $request->language,
                    null,
                    $request->year_publish,
                    $quantity,
                    $price,
                    $request->nxb,
                    $pages,
                    $request->is_top,
                    $request->category,
                    $request->author,
                );
                if ($quantity==0) {
                    DB::table('book')->where('book_slug', $request->book_slug)->update(['status'=>0]);
                }
                // $file->move('images/book', $authors_images);
                return response()->json(['success' => 'Cập nhật sách thành công!']);
            } else {

                $extension = Str::after($update->avatar, ".");
                $slug = Str::slug($book_name);
                $book_images = $slug . "." . $extension;
                File::move("images/book/$update->avatar", "images/book/$book_images");

                $this->book->UpdateBook(
                    $request->book_slug,
                    $book_name,
                    $request->book_desc,
                    $request->language,
                    $book_images,
                    $request->year_publish,
                    $quantity,
                    $price,
                    $request->nxb,
                    $pages,
                    $request->is_top,
                    $request->category,
                    $request->author,
                );
                if ($quantity==0) {
                    DB::table('book')->where('book_slug', $request->book_slug)->update(['status'=>0]);
                }
                // $file->move('images/book', $authors_images);
                return response()->json(['success' => 'Cập nhật sách thành công!']);
            }
        }
    }

    /**Book Details */
    public function bookDetails($slug)
    {
        $book = Book::where('book.book_slug', $slug)->join('category', 'category.id', 'book.category_id')
            ->join('author', 'author.id', 'book.author_id')
            ->select('book.*', 'author.author_name as author', 'category.category_name as category', 'author.author_slug as author_slug')
            ->first();
        // dd($book);
        $viewData = [
            'book' => $book,
        ];
        return view('admin::book.details', $viewData);
    }
}
