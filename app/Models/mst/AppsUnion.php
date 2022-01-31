<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsUnion extends Model
{
    use HasFactory;

    protected $fillable = ['upazila_id','union_name','local_name',
    'lat','lon','union_status'];

    protected $table = 'apps_union';
    public $timestamps = false;
}
