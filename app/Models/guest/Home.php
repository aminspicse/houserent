<?php

namespace App\Models\guest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Home extends Model
{
    use HasFactory;

    public static function TopPost()
    {
        return DB::table('post_view')
        ->where([['post_type','=',1],['post_status','=',1]])
        ->orderBy('post_id','desc')
        ->take(5)
        ->get();
    }
    public static function RecentPost()
    {
        return DB::table('post_view')
        ->where([['post_type','=',2],['post_status','=',1]])
        ->orderBy('post_id','desc')
        ->take(20)
        ->get();
    }

    public static function RecommendedPost()
    {
        return DB::table('post_view')
        ->where('post_status','=',1)
        ->orderBy('post_id','desc')
        ->take(4)
        ->get();
    }
}
