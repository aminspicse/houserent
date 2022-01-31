<?php

namespace App\Models\guest;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
class Search extends Model
{
    use HasFactory;

    public static function search($keyword)
    {
        return DB::table('post_view')
        ->where([['search','LIKE',"%{$keyword}%"]])
        ->orderBy('post_id','DESC')
        ->paginate(50);
    }
   
}
