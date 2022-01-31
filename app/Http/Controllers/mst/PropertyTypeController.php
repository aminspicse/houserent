<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\PropertyType;
use App\Models\Action;
use DB;
use Auth;
class PropertyTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['property']  = GetData::PropertyType();
        return view('mst.property-type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status'] = GetData::getStatus();
        
        return view('mst.property-type/create',$data);
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
            'property_type_name'              => ['required'],
            'property_type_status'           => ['required','numeric']
        ],
        [
            'property_type_status.numeric'   => 'Please Select Status',
        ]);
        PropertyType::create([
            'created_by'    => Auth::user()->id,
            'property_type_name'              => $request->property_type_name,
            'property_type_status'           => $request->property_type_status
        ]);

        return redirect(url('admin/property-type'))->with('success',$request->property_type_name.' Created Successfully');
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
        $data['property'] = GetData::getPropertyType($id);
        $data['status']    = GetData::getStatus();
        return view('mst.property-type.edit',$data);
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
            'property_type_name'              => ['required'],
            'property_type_status'           => ['required','numeric']
        ],
        [
            'property_type_status.numeric'   => 'Please Select Status',
        ]);

        PropertyType::where('property_type_id','=',$id)
            ->update([
                'property_type_name'          => $request->property_type_name,
                'property_type_status'        => $request->property_type_status,
            ]);
        
        return redirect(url('/admin/property-type'))->with('info',$request->property_type_name.' Successfully Updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data['table']      = 'mst_property_type';
        $data['where']      = 'property_type_id';
        $data['value']      = $id;
        $data['column']     = 'property_type_name';
        $data['status']     = 'property_type_status';

        $result             = Action::changeStatus($data);

        $status             = substr($result,0,1);
        $property           = substr($result,1,100);
        if($status == 1)
        {
            return redirect(url('/admin/property-type'))->with('success',$property.' Status Activated');
        }else{
            return redirect(url('/admin/property-type'))->with('error',$property.' Status Inactivated');
        }
    }
}
