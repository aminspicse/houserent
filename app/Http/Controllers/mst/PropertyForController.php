<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\PropertyFor;
use App\Models\Action;
use DB;
use Auth;

class PropertyForController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['propertyFor']    = GetData::allPropertyFor();
        return view('mst.property-for.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status'] = GetData::getStatus();
        return view('mst.property-for.create',$data);
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
            'for_name'             => ['required'],
            'for_status'           => ['required','numeric']
        ],
        [
            'for_status.numeric'   => 'Please Select Status',
        ]);
        PropertyFor::create([
            'created_by'    => Auth::user()->id,
            'for_name'              => $request->for_name,
            'for_status'           => $request->for_status
        ]);

        return redirect(url('admin/property-for'))->with('success',$request->for_name.' Created Successfully');
   
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
        $data['status'] = GetData::getStatus();
        $data['property'] = GetData::getPropertyFor($id);
        return view('mst.property-for.edit',$data);
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
            'for_name'             => ['required'],
            'for_status'           => ['required','numeric']
        ],
        [
            'for_status.numeric'   => 'Please Select Status',
        ]);
        PropertyFor::where('for_id','=',$id)
        ->update([
            'created_by'    => Auth::user()->id,
            'for_name'      => $request->for_name,
            'for_status'    => $request->for_status
        ]);

        return redirect(url('admin/property-for'))->with('success',$request->for_name.' Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'mst_property_for';
        $data['where']      = 'for_id';
        $data['value']      = $id;
        $data['column']     = 'for_name';
        $data['status']     = 'for_status';

        $result             = Action::changeStatus($data);

        $status             = substr($result,0,1);
        $property           = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/property-for'))->with('success',$property.' Status Activated');
        }else{
            return redirect(url('/admin/property-for'))->with('error',$property.' Status Inactivated');
        }
    }
}
