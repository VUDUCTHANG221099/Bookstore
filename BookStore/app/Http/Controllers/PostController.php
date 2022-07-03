<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    private $post;
    public function __construct(){
        $this->post = new Post();
    }
    public function index(){
        // $post=$this->post->ListPost();
        $post=$this->post->FEListPostCommentsAll();
        // dd($post);
        $viewData=[
            'post'=>$post,
            
            
        ];
        return view('post',$viewData);
    }
    public function details($slug){
        $post=$this->post->FEListPostComments($slug);
        $postList=$this->post->FEListPostCommentsAll();
        $comments=DB::table('comments')->where('post_id',$post->id)->paginate(5);
        // dd($comments);
       

        $viewData=[
            'postDetails'=>$post,
            'comments'=>$comments,
            'post'=>$postList,
        ];
        return view('postDetails',$viewData);
    }
    public function AddComment(Request $request){
        $rand=rand(1,9);
        DB::table('comments')->insert([
            'fullname'=>$request->fullname,
            'email'=>$request->email,
            'avatar'=>"avatar_$rand.jpg",
            'description'=>$request->description,
            'create_at'=>Carbon::now(),
            'post_id'=>$request->post_id,
        ]);
        return response()->json(['success'=>"Bạn đã đăng bình luận thành công. Xin cảm ơn!"]);
    }
}
