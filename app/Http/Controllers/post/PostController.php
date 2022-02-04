<?php

namespace App\Http\Controllers\post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\GetData;
use App\Models\Action;
use Redirect,Response;
use Auth;
use DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['post'] = GetData::myPost();
        return view('post.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['country'] = GetData::activatedCountry();
        $data['postType'] = GetData::allPostType();
        $data['propertyType'] = GetData::activePropertyType();
        $data['propertyFor'] = GetData::activePropertyFor();
        return view('post.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'title'         => ['required'],
            'country_id'    => ['required','numeric'],
            'division_id'   => ['required','numeric'],
            'district_id'   => ['required','numeric'],
            'upazila_id'    => ['required','numeric'],
            'union_id'      => ['required','numeric'],
            'property_type' => ['required','numeric'],
            'add_for'       => ['required','numeric'],
            'price'         => ['required'],
            'address'       => ['required'],
            'area'          => ['required'],
            'nm_bedroom'    => ['required'],
            'details'       => ['required'],
            'photo'         => ['required']
        ],
        [
            'country_id.numeric'    => 'Country Name Required',
            'division_id.numeric'   => 'Division/State Name Required',
            'district_id.numeric'   => 'District Name Required',
            'upazila_id.numeric'    => 'Upazila Name Required',
            'union_id.numeric'      => 'Unon Name Required',
            'property_type.numeric' => 'Property/House Type Required ',
            'add_for.numeric'       => 'Add For Type Required '
        ]);

        if(is_numeric($request->price)){
            $price = number_format($request->price);
        }
        else
        {
            $price = $request->$price;
        }

        /* $filename = $request->photo->store('public/image');
        $imagelink = substr($filename, 12); */

        if($image = $request->file('photo')) {

            $destinationPath = 'image/';

            $profileImage = $destinationPath.sha1(Auth::user()->email).date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $imagelink = $profileImage;

        }else{
            $imagelink = null;
        }

        Post::create([
            'user_id'       => Auth::user()->id,
            'title'         => $request->title,
            'address'       => $request->address,
            'area'          => $request->area,
            'nm_bedroom'    => $request->nm_bedroom,
            'nm_bathroom'   => $request->nm_bathroom,
            'nm_garage'     => $request->nm_garage,
            'details'       => $request->details,
            'image'         => $imagelink,
            'video'         => $request->video,
            'country_id'    => $request->country_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'    => $request->upazila_id,
            'union_id'      => $request->union_id,
            'approved_by'   => null,
            'post_type'     => 2,
            'property_type' => $request->property_type,
            'property_for'  => $request->add_for,
            'price'         => $price,
            'post_status'   => 2

        ]);

        return redirect(url('post/'))->with('success','Successfully Created New Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['posts'] = GetData::getmyPost($id,Auth::user()->id);

        if($data['posts']){
            return view('post.view',$data);
        }else{
            $data['url'] = url('post');
            return view('post.not-found',$data);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['country'] = GetData::activatedCountry();
        $data['postType'] = GetData::allPostType();
        $data['propertyType'] = GetData::activePropertyType();
        $data['propertyFor'] = GetData::activePropertyFor();
        $data['post'] = GetData::getmyPost($id,Auth::user()->id);

        if($data['post']){
            return view('post.edit',$data);
        }else{
            $data['url'] = url('post');
            return view('post.not-found',$data);
        }
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
        //return $request->all();
        $request->validate([
            'title'         => ['required'],
            'country_id'    => ['required','numeric'],
            'division_id'   => ['required','numeric'],
            'district_id'   => ['required','numeric'],
            'upazila_id'    => ['required','numeric'],
            'union_id'      => ['required','numeric'],
            'property_type' => ['required','numeric'],
            'add_for'       => ['required','numeric'],
            'price'         => ['required'],
            'address'       => ['required'],
            'area'          => ['required'],
            'nm_bedroom'    => ['required'],
            'details'       => ['required'],
        ],
        [
            'country_id.numeric'    => 'Country Name Required',
            'division_id.numeric'   => 'Division/State Name Required',
            'district_id.numeric'   => 'District Name Required',
            'upazila_id.numeric'    => 'Upazila Name Required',
            'union_id.numeric'      => 'Unon Name Required',
            'property_type.numeric' => 'Property/House Type Required ',
            'add_for.numeric'       => 'Add For Type Required '
        ]);

        if(is_numeric($request->price)){
            $price = number_format($request->price);
        }
        else
        {
            $price = $request->$price;
        }

        //$filename = $request->photo->store('public/image');
        //$imagelink = substr($filename, 12);
        Post::where('post_id','=',$id)
        ->update([
            'title'         => $request->title,
            'address'       => $request->address,
            'area'          => $request->area,
            'nm_bedroom'    => $request->nm_bedroom,
            'nm_bathroom'   => $request->nm_bathroom,
            'nm_garage'     => $request->nm_garage,
            'details'       => $request->details,
            'video'         => $request->video,
            'country_id'    => $request->country_id,
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'upazila_id'    => $request->upazila_id,
            'union_id'      => $request->union_id,
            'approved_by'   => null,
            'post_type'     => 2,
            'property_type' => $request->property_type,
            'property_for'  => $request->add_for,
            'price'         => $price,
            'post_status'   => 0

        ]);

        return redirect(url('post/'))->with('info',$request->title.' Updated Successfully');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function deletePost($post_id)
    {
        $data['table']      = 'posts';
        $data['where']      = 'post_id';
        $data['value']      = $post_id;
        $data['column']     = 'title';
        $data['status']     = 'post_status';
        $data['status_id']  = 3;

        $check['posts'] = GetData::getmyPost($post_id,Auth::user()->id);

        if($check['posts']){
            $result     = Action::statusChange($data);
            return redirect(url('post/'))->with('danger',$result.' Post Deleted');
        }else{
            $data['url'] = url('post');
            return view('error.error404',$data);
        }
    }
}
