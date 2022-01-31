<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;

class PropertyFor extends Model
{
    use HasFactory;

    protected $fillable = ['for_id', 'for_name',
                'for_status','created_by'];

    protected $table = 'mst_property_for';

    public $timestamps = false;
}
