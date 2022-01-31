<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;
class GetData extends Model
{
    use HasFactory;

   

    public static function allCountry(){
        return DB::table('apps_country')
             ->orderBy('country_status','DESC')
             ->orderBy('country_name','ASC')
             ->get();
    }
     /*
        users of activatedCountry()
        Class Name: AppsDivisionController::create()
    */
    public static function activatedCountry(){
        return DB::table('apps_country')
             ->where('country_status',1)
             ->orderBy('country_name','ASC')
             ->get();
    }

    public static function getCountry($id){
        return DB::table('apps_country as c')
            ->leftJoin('mst_status as s', 'c.country_status', '=','s.status_id')
             ->where('c.country_id',$id)
             ->select('c.*','s.*')
             ->first();
    }

    public static function allDivision(){
        return DB::table('apps_division as d')
        ->leftJoin('apps_country as c', 'd.country_id', '=', 'c.country_id')
        ->select('d.*','c.country_name') 
        ->orderBy('d.division_status','DESC')
        ->orderBy('c.country_name','ASC')
        ->orderBy('d.division_name','ASC')
        ->get();
    }
    public static function getDivision($id){
        return DB::table('apps_division as d')
            ->leftJoin('apps_country as c', 'd.country_id', '=', 'c.country_id')
            ->leftJoin('mst_status as s', 'd.division_status', '=', 's.status_id')
            ->select('d.*','c.*','s.*')
            ->where('division_id','=',$id)
            ->first();
    }

    /*
        AppsDistrictController
    */
    public static function allDistrict(){
        return DB::table('apps_district as dt')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->select('dt.*','dv.*','c.*') 
        ->orderBy('dt.district_status','DESC')
        ->orderBy('c.country_name','ASC')
        ->orderBy('dv.division_name','ASC')
        ->orderBy('dt.district_name','ASC')
        ->get();
    }

    /*
        AppsDistrictController
    */
    public static function getDistrict($id){
        return DB::table('apps_district as dt')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->leftJoin('mst_status as st', 'dt.district_status', '=', 'st.status_id')
        ->select('dt.*','dv.*','c.*','st.*') 
        ->where('district_id','=',$id)
        ->first();
    }

    /*
        AppsUpazilaController
    */
    public static function allUpazila(){
        return DB::table('apps_upazila as up')
        ->leftJoin('apps_district as dt', 'up.district_id', '=', 'dt.district_id')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->select('up.*','dt.district_name','dv.division_name','c.country_name') 
        ->orderBy('dt.district_status','DESC')
        ->orderBy('c.country_name','ASC')
        ->orderBy('dv.division_name','ASC')
        ->orderBy('dt.district_name','ASC')
        ->orderBy('up.upazila_name','ASC')
        ->get();
    }
    /*
        AppsUpazilaController
    */
    public static function getUpazila($id){
        return DB::table('apps_upazila as up')
        ->leftJoin('apps_district as dt', 'up.district_id', '=', 'dt.district_id')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->leftJoin('mst_status as st', 'up.upazila_status', '=', 'st.status_id')
        ->select('up.*','st.*','dt.district_name','dv.division_name','dv.division_id','c.country_name','c.country_id') 
        ->where('up.upazila_id','=',$id)
        ->first();
    }

    /*
        AppsUpazilaController
    */
    public static function allUnion(){
        return DB::table('apps_union as union')
        ->leftJoin('apps_upazila as up', 'union.upazila_id', '=', 'up.upazila_id')
        ->leftJoin('apps_district as dt', 'up.district_id', '=', 'dt.district_id')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->select('union.*','up.upazila_name','dt.district_name','dv.division_name','c.country_name') 
        ->orderBy('dt.district_status','DESC')
        ->orderBy('c.country_name','ASC')
        ->orderBy('dv.division_name','ASC')
        ->orderBy('dt.district_name','ASC')
        ->orderBy('up.upazila_name','ASC')
        ->get();
    }
    /*
        AppsUnionController
    */
    public static function getUnion($id){
        return DB::table('apps_union as union')
        ->leftJoin('apps_upazila as up', 'union.upazila_id', '=', 'up.upazila_id')
        ->leftJoin('apps_district as dt', 'up.district_id', '=', 'dt.district_id')
        ->leftJoin('apps_division as dv', 'dt.division_id', '=', 'dv.division_id')
        ->leftJoin('apps_country as c', 'dv.country_id', '=', 'c.country_id')
        ->leftJoin('mst_status as st', 'up.upazila_status', '=', 'st.status_id')
        ->select('union.*','up.upazila_name','st.*','dt.district_name','dt.district_id','dv.division_name','dv.division_id','c.country_name','c.country_id') 
        ->where('union.union_id','=',$id)
        ->first();
    }
    public static function getStatus(){
        return DB::table('mst_status')->get();
    }

    public static function PropertyType(){
        return DB::table('property_type_view')
        ->get();
    }
    
    public static function activePropertyType(){
        return DB::table('mst_property_type')
        ->where('property_type_status','=',1)
        ->get();
    }
    public static function getPropertyType($id){
        return DB::table('mst_property_type as mpt')
            ->leftJoin('mst_status as st', 'mpt.property_type_status','=','st.status_id')
            ->where('mpt.property_type_id',$id)
            ->select('mpt.*', 'st.status_name')
            ->first();
    }

    public static function allPropertyFor(){
        return DB::table('mst_property_for')->get();
    }
    public static function activePropertyFor(){
        return DB::table('mst_property_for')
        ->where('for_status','=',1)
        ->get();
    }

    public static function getPropertyFor($id){
        return DB::table('mst_property_for as mpf')
            ->leftJoin('mst_status as st', 'mpf.for_status','=','st.status_id')
            ->where('mpf.for_id',$id)
            ->select('mpf.*', 'st.status_name')
            ->first();
    }

    public static function allPostType(){
        return DB::table('mst_post_type')->get();
    }

    public static function myPost(){
        return DB::table('post_view')
        ->where([['user_id','=',Auth::user()->id],['post_status','!=',3]])
        ->orderBy('post_id','DESC')
        ->get();
    }
    public static function getmyPost($post_id,$auth_id)
    {
        return DB::table('post_view')
        ->where([['post_id','=',$post_id],['user_id','=',$auth_id]])
        ->first();
    }
    public static function getPost($post_id,$status)
    {
        return DB::table('post_view')
        ->where([['post_id','=',$post_id],['post_status','=',$status]])
        ->first();
    }

    public static function allPost($status)
    {
        return DB::table('post_view')
        ->where('post_status','=',$status)
        ->paginate(50);
    }
    
    public static function UserRoleCount($roleId)
    {
        return DB::table('users')
        ->where('role_id','=',$roleId)
        ->count();
    }
   
    public static function TotalUser()
    {
        return DB::table('users')
        ->count();
    }
    public static function TotalActiveUser()
    {
        return DB::table('sessions')
        ->where('user_id','!=',null)
        ->count();
    }
    public static function TotalActivePost($status)
    {
        return DB::table('posts')
        ->where('post_status','=',$status)
        ->count();
    }
    public static function ActiveSession($id)
    {
        return DB::table('sessions')
        ->where('user_id','=',$id)
        ->get();
    }
    public static function fetchById($table,$column,$id){
        return DB::table($table)
            ->where($column,'=',$id)
            ->first();
    }

    public static function allAgent(){
        return DB::table('users')
            ->where('role_id','=',2)
            ->orderBy('id','DESC')
            ->paginate(50);
    }
        /*
    users of division_dependent($country)
    Class Name: AppsData
    */
    public static function dependentDivision($country){
        return DB::table('apps_division as d')
        ->where([['d.division_status', '=',1],['country_id','=',$country]])
        ->get();
    }
    public static function dependentDistrict($division){
        return DB::table('apps_district as d')
        ->where([['d.district_status', '=',1],['division_id','=',$division]])
        ->get();
    }
    public static function dependentUpazila($did){
        return DB::table('apps_upazila as u')
        ->where([['u.upazila_status', '=',1],['district_id','=',$did]])
        ->get();
    }
    public static function dependentUnion($uid){
        return DB::table('apps_union as u')
        ->where([['u.union_status', '=',1],['upazila_id','=',$uid]])
        ->get();
    }

}
