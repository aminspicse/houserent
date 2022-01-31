<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'address','area','nm_bedroom',
        'nm_bathroom', 'nm_garage', 'details', 'image', 'video',
        'country_id', 'division_id','district_id','upazila_id','union_id',
        'approved_by','post_status','property_for','property_type','post_type',
        'price'
    ] ;
}
