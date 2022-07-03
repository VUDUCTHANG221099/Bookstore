<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Author;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;



class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $author;
    public function __construct()
    {
        $this->author = new Author();
    }
    public function index()
    {

        $author = $this->author->ListAuthor();


        // $this->author->ListAuthor();
        if ($key = request()->key) {
            $author = $this->author->searchAuthor($key);
        }
        // dd($author);
        $viewData = [
            'author' => $author,
        ];
        return view('admin::author', $viewData);
    }
    public function ViewAddAuthor()
    {
        $cate = $this->author->ListCate();
        $viewData = [
            'cate' => $cate,
        ];

        return view('admin::author.add', $viewData);
    }
    /*Remove*/


    /*Remove*/
    /*Add Author*/
    public function addAuthor(Request $request)
    {
        $Author_name = Str::of($request->Author_name)->trim();

        $author = Author::where(['author_name' => $Author_name])->first();
        if ($author) {
            return response()->json(['error' => 'Tác giả đã tồn tại!']);
        } else {

            if ($request->hasFile('authors_avatar')) {

                $slug = Str::slug($Author_name);
                // $random=Str::random(5);
                $file = $request->file('authors_avatar');
                // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
                $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
                $authors_images = $slug . '.' . $extension;
                // $avatar = "$slug.png";
                $this->author->AddAuthor($Author_name, $authors_images, $request->Author_date, $request->Author_desc, $request->Cate);
                $file->move('images/author', $authors_images);

                return response()->json(['success' => 'Thêm tác giả thành công!']);
            } else {
                $this->author->AddAuthor($Author_name, null, $request->Author_date, $request->Author_desc, $request->Cate);
                return response()->json(['success' => 'Thêm tác giả thành công!']);
            }
        }
    }
    /*Add Author*/
    /*Author Details*/
    public function authorDetails($slug)
    {
        $author = $this->author->AuthorDetalis($slug);
        // dd($author);
        $viewData = [
            'author' => $author,
        ];
        return view('admin::author.details', $viewData);
    }
    /*Author Details*/
    /*Remove Author*/
    public function RemoveAuthor($slug)
    {
        $author = Author::where('author_slug', $slug)->first();
        if ($author->avatar) {
            File::delete("images/author/$author->avatar");
            $author->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        } else {
            $author->delete();
            return response()->json(['success' => 'Xóa thành công!']);

            // dd(444);
        }
    }
    /*Remove Author*/


    /*Update author */
    public function getAuthor($slug)
    {
        $author = $this->author->AuthorDetalis($slug);
        $cate = $this->author->ListCate();

        // dd($author);
        $viewData = [
            'author' => $author,
            'cate' => $cate,

        ];
        return view('admin::author.update', $viewData);
    }
    /*Update author */
    public function updateAuthor(Request $request)
    {
        // dd($request->file('authors_avatar'));
        // dd($request->all());
        $author_name=Str::of($request->author_name)->trim();


        if ($request->hasFile('authors_avatar')) {


            //    dd($request->all());

            $slug = Str::slug($author_name);
            // $random=Str::random(5);
            $file = $request->file('authors_avatar');
            // $name = $file->getClientOriginalName(); #TODO: name[.txt,.docx....]
            $extension = $file->getClientOriginalExtension(); #TODO: [.txt,.docx....]
            $authors_images = $slug . '.' . $extension;
            // dd($authors_images);
            $this->author->UpdateAuthor(
                $request->author_slug,
                $author_name,
                $authors_images,
                $request->author_date,
                $request->author_desc,
                $request->Cate,
            );
            $file->move('images/author', $authors_images);
            return response()->json(['success' => 'Cập nhật tác giả  thành công!']);
        } else {
            $update = Author::where('author_slug', $request->author_slug)->first();
            if (empty($update->avatar)) {

                $this->author->UpdateAuthor(
                    $request->author_slug,
                    $author_name,
                    null,
                    $request->author_date,
                    $request->author_desc,
                    $request->Cate,
                );
                // $file->move('images/book', $authors_images);
                return response()->json(['success' => 'Cập nhật tác giả thành công!']);
            } else {

                $extension = Str::after($update->avatar, ".");
                $slug = Str::slug($request->book_name);
                $authors_images = $slug . "." . $extension;
                File::move("images/author/$update->avatar", "images/author/$authors_images");

                $this->author->UpdateAuthor(
                    $request->author_slug,
                    $author_name,
                    $authors_images,
                    $request->author_date,
                    $request->author_desc,
                    $request->Cate,
                );
                // $file->move('images/book', $authors_images);
                return response()->json(['success' => 'Cập nhật tác giả thành công!']);
            }
        }
    }
}
