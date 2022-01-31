<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\AppsUnion;
use App\Models\Action;
use DB;

class AppsUnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['union']  = GetData::allUnion();

        return view('mst.union.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country']    = GetData::activatedCountry();
        $data['status']     = GetData::getStatus();

        return view('mst.union.create',$data);
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
            'upazila_name'              => ['required','numeric'],
            'union_name'                => ['required'],
            'local_name'                => ['required'],
            'union_status'              => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_name.numeric'     => 'District Name is Required',
            'upazila_name.numeric'      => 'District Name is Required',
            'union_status.numeric'      => 'Status is  Required',
        ]);
        AppsUnion::create([
            'upazila_id'        => $request->upazila_name,
            'union_name'        => $request->union_name,
            'local_name'        => $request->local_name,
            'lat'               => $request->lat,
            'lon'               => $request->lon,
            'union_status'      => $request->union_status
        ]);

        return redirect(url('/admin/union'))->with('success',$request->union_name.' Successfully Created!');

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
        $data['union']      = GetData::getUnion($id);
        $data['status']     = GetData::getStatus();
        return view('mst.union.edit',$data);
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
            'upazila_name'              => ['required','numeric'],
            'union_name'                => ['required'],
            'local_name'                => ['required'],
            'union_status'              => ['required','numeric']
        ],
        [
            'country_name.numeric'      => 'Country Name is Required',
            'division_name.numeric'     => 'Division Name is Required',
            'district_name.numeric'     => 'District Name is Required',
            'upazila_name.numeric'      => 'District Name is Required',
            'union_status.numeric'      => 'Status is  Required',
        ]);
        AppsUnion::where('union_id','=',$id)
            ->update([
                'union_name'        => $request->union_name,
                'local_name'        => $request->local_name,
                'lat'               => $request->lat,
                'lon'               => $request->lon,
                'union_status'      => $request->union_status,
            ]);
        
        return redirect(url('/admin/union'))->with('info',$request->union_name.' Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'apps_union';
        $data['where']      = 'union_id';
        $data['value']      = $id;
        $data['column']     = 'union_name';
        $data['status']     = 'union_status';

        $result             = Action::changeStatus($data);

        $status             = substr($result,0,1);
        $union              = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/union'))->with('success',$union.' Status Activated');
        }else{
            return redirect(url('/admin/union'))->with('error',$union.' Status Inactivated');
        }
    }
}
