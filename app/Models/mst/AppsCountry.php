<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppsCountry extends Model
{
    use HasFactory;

    public $timestamps = false;
    
    protected $fillable = [
        'country_name', 'country_code', 'dial_code','currency_name','currency_symbol',
        'currency_code', 'country_status'
    ] ;

    protected $table = 'apps_country';
}
