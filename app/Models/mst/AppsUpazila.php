<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsUpazila extends Model
{
    use HasFactory;

    protected $fillable = ['district_id','upazila_name','local_name','upazila_status'];

    protected $table='apps_upazila';

    public $timestamps = false;
}
