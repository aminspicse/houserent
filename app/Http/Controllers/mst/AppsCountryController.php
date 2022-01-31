<?php

namespace App\Http\Controllers\mst;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use App\Models\mst\AppsCountry;
use DB;

class AppsCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['country']    =   GetData::allCountry();
        return view('mst.country.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status'] = GetData::getStatus();
        return view('mst.country.create',$data);

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
            'country_name' => ['required', 'unique:apps_country'],
            'country_code' => ['required'],
            'dial_code'    => ['required'],
            'currency_name' => ['required'],
            'currency_code' => ['required'],
            'currency_symbol'   => ['required'],
            'country_status'    => ['required','numeric']
        ],
        [
            'country_status.numeric' => 'Status is  Required',
        ]);

        AppsCountry::create([
            'country_name'      => $request->country_name, 
            'country_code'      => $request->country_code, 
            'dial_code'         => $request->dial_code,
            'currency_name'     => $request->currency_name,
            'currency_symbol'   => $request->currency_symbol,
            'currency_code'     => $request->currency_code,
            'country_status'    => $request->country_status
        ]);
        return redirect(url('admin/country'))->with('success',$request->country_name.' Successfully Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['country'] = GetData::getCountry($id);
        $data['status'] = GetData::getStatus();
        return view('mst.country.edit',$data);
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
            'country_name' => ['required'],
            'country_code' => ['required'],
            'dial_code'    => ['required'],
            'currency_name' => ['required'],
            'currency_code' => ['required'],
            'currency_symbol'   => ['required'],
            'country_status'    => ['required','numeric']
        ],
        [
            'country_status.numeric' => 'Status is  Required',
        ]);

        AppsCountry::where('country_id', '=',$id)
        ->update([
            'country_name'      => $request->country_name, 
            'country_code'      => $request->country_code, 
            'dial_code'         => $request->dial_code,
            'currency_name'     => $request->currency_name,
            'currency_symbol'   => $request->currency_symbol,
            'currency_code'     => $request->currency_code,
            'country_status'    => $request->country_status
        ]);
        return redirect(url('admin/country'))->with('info',$request->country_name.' Successfully Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = AppsCountry::where('country_id',$id)->first();
        if($status->country_status == 1){
            $newstatus = 0;
            $country = AppsCountry::where('country_id','=',$id)
                    ->limit(1)
                    ->update(array('country_status' => $newstatus));
            return redirect(url('admin/country'))->with('warning',$status->country_name.' Inactivated!');
        }else{
            $newstatus = 1;
            $country = AppsCountry::where('country_id','=',$id)
                    ->limit(1)
                    ->update(array('country_status' => $newstatus));
            return redirect(url('admin/country'))->with('success',$status->country_name.' Activated!');
        }
    }
}
