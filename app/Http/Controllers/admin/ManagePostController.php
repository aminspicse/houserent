<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\GetData;
use App\Models\Action;
use App\Models\admin\ManagePost;
use Redirect,Response;
use Auth;
use DB;
use URL;
class ManagePostController extends Controller
{
    public function activepost()
    {
        $data['post'] = ManagePost::allPosts(1);
        return view('admin.managepost.active-post',$data);
    }
    public function inactivePost()
    {
        $data['post'] = ManagePost::allPosts(0);
        return view('admin.managepost.inactive-post',$data);
    }
    public function pendingPost()
    {
        $data['post'] = ManagePost::allPosts(2);
        return view('admin.managepost.pending-post',$data);
    }

    public function viewPost($id)
    {
        $data['posts']   = ManagePost::getPost($id);
        return view('admin.managepost.view-post',$data);
    }

    public function PostType($post_id,$post_type){
        $data['table']      = 'posts';
        $data['where']      = 'post_id';
        $data['value']      = $post_id;
        $data['column']     = 'title';
        $data['status']     = 'post_type';
        $data['status_id']  = $post_type;
        
        if($post_type == 1)
        {
            $result     = Action::statusChange($data);
            return redirect(URL::previous())->with('success',$result.' Maked Top Post');
        }
        elseif($post_type == 2)
        {
            $result     = Action::statusChange($data);
            return redirect(URL::previous())->with('success',$result.' Recent Post');
        }
        else
        {
            $data['url'] = url('active-post');
            return view('error.error404',$data);
        }
    }
    public function changeStatus($post_id,$status_id)
    {
        //return URL::previous();
        $data['table']      = 'posts';
        $data['where']      = 'post_id';
        $data['value']      = $post_id;
        $data['column']     = 'title';
        $data['status']     = 'post_status';
        $data['status_id']  = $status_id;
        
        if($status_id == 1)
        {
            $result     = Action::statusChange($data);
            return redirect(URL::previous())->with('success',$result.' Post Activated');
        }
        elseif($status_id == 2)
        {
            $result     = Action::statusChange($data);
            return redirect(URL::previous())->with('info',$result.' Post Pending');
        }
        elseif($status_id == 0)
        {
            $result     = Action::statusChange($data);
            return redirect(URL::previous())->with('danger',$result.' Post Pending');
        }
        else
        {
            $data['url'] = url('post');
            return view('error.error404',$data);
        }
    }
}
