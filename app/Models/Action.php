<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class Action extends Model
{
    use HasFactory;

    /*
        AppsDivisionController, AppsDistrictController
    */
    public static function changeStatus($data){
        $table      = $data['table'];
        $where      = $data['where'];
        $value      = $data['value'];
        $column     = $data['column'];
        $status     = $data['status'];

        $st = DB::table($table)->where($where,'=',$value)->first();

        if($st->$status == 1)
        {
            DB::table($table)->where($where,'=', $value)
                    ->limit(1)
                    ->update(array($status => 0));
                    return '0'.$st->$column;
        }else{
            DB::table($table)->where($where,'=', $value)
                    ->limit(1)
                    ->update(array($status => 1));
                    return '1'.$st->$column;
        }
        
    }

    public static function statusChange($data){
        $table      = $data['table'];
        $where      = $data['where'];
        $value      = $data['value'];
        $column     = $data['column'];
        $status     = $data['status'];
        $status_id  = $data['status_id'];
        $st = DB::table($table)->where($where,'=',$value)->first();

            DB::table($table)->where($where,'=', $value)
                ->limit(1)
                ->update(array($status => $status_id));
                return $st->$column;
    }
}
