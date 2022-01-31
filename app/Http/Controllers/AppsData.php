<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\GetData;
class AppsData extends Controller
{
    public function getDivision(Request $request)
    {
        $cid = $request->post('cid');
        $state = GetData::dependentDivision($cid); //DB::table('apps_division')->where('country_id',$cid)->get();
        $html = '<option>Select State/Division</option>';
        foreach($state as $list){
            $html .= '<option value="'.$list->division_id.'">'.$list->division_name.' ('.$list->local_name.')</option>';
        }
        echo $html;
    }

    public function getDistrict(Request $request)
    {
        $sid = $request->post('sid');
        $dist = GetData::dependentDistrict($sid); //DB::table('apps_district')->where('division_id',$sid)->get();
        $html = '<option>Select District</option>';
        foreach($dist as $list){
            $html .= '<option value="'.$list->district_id.'">'.$list->district_name.' ('.$list->local_name.')</option>';
        }
        return $html;
    }

    public function getThana(Request $request)
    {
        $dist = $request->post('dist');
        $thana = GetData::dependentUpazila($dist);//DB::table('apps_upazila')->where('district_id',$dist)->get();
        $html = '<option>Select Thana/Upazila</option>';
        foreach($thana as $list){
            $html .= '<option value="'.$list->upazila_id.'">'.$list->upazila_name.' ('.$list->local_name.')</option>';
        }
        return $html;
    }

    public function getUnion(Request $request)
    {
        $tna = $request->post('tna');
        $union = GetData::dependentUnion($tna);//DB::table('apps_union')->where('upazila_id',$tna)->get();
        $html = '<option>Select Union/City</option>';
        foreach($union as $list){
            $html .= '<option value="'.$list->union_id.'">'.$list->union_name.' ('.$list->local_name.')</option>';
        }
        return $html;
    }
}
