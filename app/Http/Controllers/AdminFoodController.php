<?php

namespace App\Http\Controllers;
use App\Food;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;

class AdminFoodController extends Controller
{
    public function getAdminIndexFood()
    {
    	$foods= Food::orderBy('section_id','asc')->select('foods.id','foods.name as namefood','description','price','section_id','image_url')->join('sections','foods.section_id','=','sections.id')->get();
    	return view('adminfood.index',['foods'=>$foods]);
    	//return view('adminfood.index');
    }
}
