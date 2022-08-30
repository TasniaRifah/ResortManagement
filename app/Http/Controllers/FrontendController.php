<?php

namespace App\Http\Controllers;

use App\Models\Resort;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $resorts = Resort::latest()->with('resourt_images')->where('is_active',true)->get();

        return view('frontend.index',compact('resorts'));
    }
    public function resortDetails(Resort $resort)
    {
  
    return view('frontend.resortdetail',compact('resort'));
    }
  

}
