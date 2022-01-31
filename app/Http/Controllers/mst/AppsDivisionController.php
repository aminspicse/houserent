<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\AppsDivision;
use App\Models\Action;
use DB;
class AppsDivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['division'] = GetData::allDivision();
        return view('mst.division.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country'] = GetData::activatedCountry();
        $data['status'] = GetData::getStatus();

        return view('mst.division.create',$data);
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
            'country_name'      => ['required', 'numeric'],
            'division_name'     => ['required'],
            'local_name'        => ['required'],
            'division_status'   => ['required','numeric']
        ],
        [
            'country_name.numeric'    => 'Country Name is Required',
            'division_status.numeric' => 'Status is  Required',
        ]);

        AppsDivision::create([
            'country_id'        => $request->country_name,
            'division_name'     => $request->division_name,
            'local_name'        => $request->local_name,
            'division_status'   => $request->division_status
        ]);
        
        return redirect(url('admin/division'))->with('success', $request->division_name.' Created Successfully!');
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
        $data['country']    = GetData::activatedCountry();
        $data['division']   = GetData::getDivision($id);
        $data['status']     = GetData::getStatus();
        return view('mst.division.edit',$data);
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
            'division_name'     => ['required'],
            'local_name'        => ['required'],
            'division_status'   => ['required','numeric']
        ],
        [
            'division_status.numeric' => 'Status is  Required',
        ]);

        AppsDivision::where('division_id','=',$id)
            ->update([
                'division_name'     => $request->division_name,
                'local_name'        => $request->local_name,
                'division_status'   => $request->division_status,
            ]);
        return redirect(url('/admin/division'))->with('success',$request->division_name.' Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'apps_division';
        $data['where']      = 'division_id';
        $data['value']      =  $id;
        $data['column']     =  'division_name';
        $data['status']     =  'division_status';

        $result     = Action::changeStatus($data);

        $status = substr($result,0,1);
        $division = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/division'))->with('success',$division.' Status Activated');
        }else{
            return redirect(url('/admin/division'))->with('error',$division.' Status Inactivated');
        }
    }
}
