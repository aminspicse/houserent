<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class ManagePost extends Model
{
    use HasFactory;

    public static function allPosts($status)
    {
        return DB::table('posts')
        ->where('post_status','=',$status)
        ->orderBy('post_id','desc')
        ->get();
    }

    public static function activePost()
    {
        return DB::table('posts')
        ->where('post_status','=',1)
        ->orderBy('post_id','desc')
        ->get();
    }

    public static function getPost($id)
    {
        return DB::table('post_view')
        ->where('post_id','=',$id)
        ->first();
    }
}
