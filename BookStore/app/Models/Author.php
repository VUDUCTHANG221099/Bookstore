<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Author extends Model
{
    use HasFactory;
    protected $table="author";
    protected $guarded = [];

    /**List Category */
    public function ListCate(){
        return Category::all();
    }
    /**Add Author */
    public function AddAuthor($Author_name,$avatar,$Author_date,$Author_desc,$Cate){
        DB::table('author')->insert([
            'author_name' => $Author_name,
            'author_slug' => Str::slug($Author_name),
            'avatar' => $avatar,
            'birth_date' => $Author_date,
            'description' => $Author_desc,
            'category_id' => $Cate,
        ]);
    }
    /**List Author */
    public function ListAuthor(){
        return Author::join('category', 'category.id','author.category_id')->paginate(8)->onEachSide(0);
    }
    /**Author Detalis */
    public function AuthorDetalis($slug){
       $author= DB::table('author')->join('category', 'category.id','author.category_id')
        ->where('author.author_slug',$slug)
        ->select('author.*','category.category_name as cate_name','category.id as category_id')->
        first();
        return $author;
    }
    /**Update Author */
    public function UpdateAuthor($author_slug,$author_name,$avatar,$birth_date,$description,$category_id){
        DB::table('author')->where('author_slug',$author_slug)->update([
            'author_name' =>$author_name,
            'author_slug'=>Str::slug($author_name),
            'avatar'=>$avatar,
            'birth_date'=>$birth_date,
            'description'=>$description,
            'category_id'=>$category_id,
        ]);

    }

    public function searchAuthor($key){
      
        $author= Author::where('author.author_name','like','%'.$key.'%')->
        join('category', 'category.id','author.category_id')->paginate(8)->onEachSide(0);
        return $author;
    }
}
