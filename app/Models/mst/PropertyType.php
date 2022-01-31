<?php

namespace App\Models\mst;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyType extends Model
{
    use HasFactory;

    protected $fillable = ['property_type_id', 'property_type_name',
                'property_type_status','created_by'];
    protected $table = "mst_property_type";


    
    public $timestamps = false;

}
