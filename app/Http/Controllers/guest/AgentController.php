<?php

namespace App\Http\Controllers\guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GetData;
use Auth;

class AgentController extends Controller
{
    
    public function index()
    {
        $data['agents'] = GetData::allAgent();
        return view('guest.agent-list',$data);
    }
}
