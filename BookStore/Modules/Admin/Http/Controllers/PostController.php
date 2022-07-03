<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    private $post;
    public function __construct()
    {
        $this->post = new Post();
    }
    public function index()
    {
        $post = $this->post->ListPost();

        $viewData = [
            'post' => $post,
            'count' => 1,
        ];
        return view('admin::post', $viewData);
    }

    //Post Details
    public function PostDetails($slug)
    {
        $post = $this->post->GetPost($slug);
        $viewData = [
            'post' => $post,
        ];
        return view('admin::post.details', $viewData);
    }
    /**Remove Book */
    public function removePost(Request $request)
    {
        $post = Post::where('slug', $request->slug)->first();
        if ($post->avatar) {
            File::delete("images/post/$post->avatar");
            File::delete("description/images/post/$post->avatar");
            $comments=DB::table('comments')->where('post_id',$post->id)->delete();
            $post->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        } else {
            $post->delete();
            return response()->json(['success' => 'Xóa thành công!']);
        }
    }
}
