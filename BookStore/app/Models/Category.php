<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class Category extends Model
{
    use HasFactory;
    protected $table="category";
    protected $fillable = [
        'category_name'
    ];
    /*All Category*/
    public function AllCategory(){
        return Category::all();
    }
    /**Get Category */
    public function GetCategory($slug){
        $cate= Category::where('category_slug',$slug);
        return $cate->first();
    }
    /**Add Category */
    public function AddCategory($category_name){
        DB::table('category')->insert(['category_name'=>$category_name,'category_slug'=>Str::slug($category_name)]);
        // $cate=new Category();
        // $cate->category_name=$category_name;
        // $cate->save();
    }
    /**Tìm kiếm Category check Category  */
    public function GetCategoryCheck($category_name){
        return Category::where('category_name',$category_name)->first();
    }
    /**Update Category */
    public function UpdateCategory($slug,$category_name){
        DB::table('category')->where('category_slug', $slug)
        ->update(['category_name' => $category_name,'category_slug'=>Str::slug($category_name)]);

        // DB::table('category')->where('id',$id)->update(['category_name'=>$category_name]);
        // $cate=new Category();
        // $cate->category_name=$category_name;
        // $cate->save();
    }
    public function RemoveCategory($slug){
        $cate = Category::where('category_slug',$slug);
        $cate->delete();
    }
}
