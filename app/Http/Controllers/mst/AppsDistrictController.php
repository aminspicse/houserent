<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\AppsDistrict;
use App\Models\Action;
use DB;
class AppsDistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['district'] = GetData::allDistrict();

        return view('mst.district.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country']        = GetData::activatedCountry();
        $data['status']         = GetData::getStatus();
        return view('mst.district.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'country_name'              => ['required', 'numeric'],
            'division_name'             => ['required','numeric'],
            'district_name'             => ['required'],
            'local_name'                => ['required'],
            'district_status'           => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_status.numeric'   => 'Status is  Required',
        ]);

        AppsDistrict::create([
            'division_id'               => $request->division_name,
            'district_name'             => $request->district_name,
            'local_name'                => $request->local_name,
            'lat'                       => $request->lat,
            'lon'                       => $request->lon,
            'division_status'           => $request->division_status
        ]);
        
        return redirect(url('admin/district'))->with('success', $request->district_name.' Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['district']   = GetData::getDistrict($id);
        $data['status']     = GetData::getStatus();
        return view('mst.district.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'country_name'              => ['required', 'numeric'],
            'division_name'             => ['required','numeric'],
            'district_name'             => ['required'],
            'local_name'                => ['required'],
            'district_status'           => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_status.numeric'   => 'Status is  Required',
        ]);

        AppsDistrict::where('district_id','=',$id)
            ->update([
                'district_name'     => $request->district_name,
                'local_name'        => $request->local_name,
                'district_status'   => $request->district_status,
                'lat'               => $request->lat,
                'lon'               => $request->lon
            ]);
        return redirect(url('/admin/district'))->with('success',$request->district_name.' Successfully Updated!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'apps_district';
        $data['where']      = 'district_id';
        $data['value']      = $id;
        $data['column']     = 'district_name';
        $data['status']     = 'district_status';

        $result     = Action::changeStatus($data);

        $status     = substr($result,0,1);
        $district   = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/district'))->with('success',$district.' Status Activated');
        }else{
            return redirect(url('/admin/district'))->with('error',$district.' Status Inactivated');
        }
    }
}
