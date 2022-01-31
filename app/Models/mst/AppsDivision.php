<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AppsDivision extends Model
{
    use HasFactory;

    public $timestamps = false; 
    
    protected $fillable = [
        'country_id', 'division_name', 'local_name','division_status'
    ] ;

    
    
    //public function get
    protected $table = 'apps_division';
}
