<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\AppsUpazila;
use App\Models\Action;
use DB;

class AppsUpazilaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['upazila'] = GetData::allUpazila();
        return view('mst.upazila.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country']    =   GetData::activatedCountry();
        $data['status']     =   GetData::getStatus();

        return view('mst.upazila.create',$data);
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
            'district_name'             => ['required','numeric'],
            'upazila_name'              => ['required'],
            'local_name'                => ['required'],
            'district_status'           => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_name.numeric'     => 'District Name is Required',
            'district_status.numeric'   => 'Status is  Required',
        ]);
        AppsUpazila::create([
            'district_id'       => $request->district_name,
            'upazila_name'      => $request->upazila_name,
            'local_name'        => $request->local_name,
            'upazila_status'    => $request->upazila_status
        ]);

        return redirect(url('/admin/upazila'))->with('success',$request->upazila_name.' Successfully Updated!');

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
        $data['upazila']    = GetData::getUpazila($id);
        $data['status']     = GetData::getStatus();
        return view('mst.upazila.edit',$data);
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
            'district_name'             => ['required','numeric'],
            'upazila_name'              => ['required'],
            'local_name'                => ['required'],
            'upazila_status'            => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_name.numeric'     => 'District Name is Required',
            'upazila_status.numeric'    => 'Status is  Required',
        ]);

        AppsUpazila::where('upazila_id','=',$id)
            ->update([
                'upazila_name'      => $request->upazila_name,
                'local_name'        => $request->local_name,
                'upazila_status'    => $request->upazila_status,
            ]);
        
        return redirect(url('/admin/upazila'))->with('info',$request->upazila_name.' Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'apps_upazila';
        $data['where']      = 'upazila_id';
        $data['value']      = $id;
        $data['column']     = 'upazila_name';
        $data['status']     = 'upazila_status';

        $result             = Action::changeStatus($data);

        $status             = substr($result,0,1);
        $upazila            = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/upazila'))->with('success',$upazila.' Status Activated');
        }else{
            return redirect(url('/admin/upazila'))->with('error',$upazila.' Status Inactivated');
        }
    }
}
