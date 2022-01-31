<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsDistrict extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'division_id', 'district_name', 'lat','lon', 'local_name','district_status'
    ];
    protected $table = 'apps_district';


}
