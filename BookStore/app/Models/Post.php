<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $guarded = [];
    /**List Post */
    public function ListPost()
    {
        $post = Post::OrderBy('post.create_at','desc')->join('users', 'users.id', 'post.user_id')
        
        ->select('post.*', 'users.full_name as full_name')->get();
        return $post;
    }

    /**Get Post */
    public function GetPost($slug)
    {
        $post = Post::where('post.slug', $slug)->join('users', 'users.id', 'post.user_id')->select('post.*', 'users.full_name as full_name')->first();
        return $post;
    }
    //FE Post Details
    public function FEListPostComments($slug){
        $post=DB::table('comments')
        ->select(DB::raw('count(comments.post_id) as CountComments'),'post.*','users.full_name as full_name')
        ->rightJoin('post','post.id','comments.post_id')->where('post.slug',$slug)->orderByDesc('post.create_at')
        ->join('users', 'users.id', 'post.user_id')
        ->groupBy('post.id')->first();
        return $post;
    }
    public function FEListPostCommentsAll(){
        $post=DB::table('comments')
        ->select(DB::raw('count(comments.post_id) as CountComments'),'post.*','users.full_name as full_name')
        ->rightJoin('post','post.id','comments.post_id')->orderByDesc('post.create_at')
        ->join('users', 'users.id', 'post.user_id')
        ->groupBy('post.id')->paginate(6);
        return $post;
    }
    public function ListPostFE(){
        $post = Post::OrderBy('post.create_at','desc')->join('users', 'users.id', 'post.user_id')
        
        ->select('post.*', 'users.full_name as full_name')->limit(5)->get();
        return $post;
    }

    public function CreatePost($title,$avatar,$description,$user_id){
        DB::table('post')->insert([
            'title'=>$title,
            'slug'=>Str::slug($title),
            'avatar'=>$avatar,
            'avatar'=>$avatar,
            'description'=>$description,
            'create_at'=>Carbon::now(),
            'user_id'=>$user_id,
        ]);
        
    }
    public function UpdatePost($slug,$title,$avatar,$description){
        DB::table('post')->where('slug',$slug)->update([
            'title'=>$title,
            'slug'=>Str::slug($title),
            'avatar'=>$avatar,
            'description'=>$description,
            'create_at'=>Carbon::now(),
        ]);
    }
    
  
}
