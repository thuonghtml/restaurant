<?php

namespace App\Http\Controllers;
use App\Food;
use App\Section;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Input;

class AdminFoodController extends Controller
{
    public function getAdminIndexFood()
    {
    	$foods= Food::orderBy('section_id','asc')->select('foods.id','foods.name as namefood','description','price','section_id','image_url')->join('sections','foods.section_id','=','sections.id')->get();
    	return view('adminfood.index',['foods'=>$foods]);
    	//return view('adminfood.index');
    }
    public function getAdminCreateFood()
    {
    	$sections=Section::orderBy('id','asc')->get();
    	return view('adminfood.create',['sections'=>$sections]);
    }
    public function postAdminCreateFood(Request $request)
    {
    	$this->validate($request,[
    		'sectionfood'=>'required|not_in:0',
    		'namefood'=>'required|min:6',
    		'description'=>'required|min:10',
    		'price'=>'required|min:7',
    		'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
    	if($request->hasFile('image')){
    		$request->file('image');
    		$filename= $request->image->getClientOriginalName();
    		$request->image->move('img',$filename);
    		$Food= new Food([
			'name'=>$request->input('namefood'),
			'description'=>$request->input('description'),
			'price'=>$request->input('price'),
			'section_id'=>$request->input('sectionfood'),
			'image_url'=> $filename
    		]);
      		$Food->save();
    	}
    	
    	return redirect()->route('adminfood.index')->with('info', 'Food created, name is: ' . $request->input('namefood'));
    }
    public function getAdminEditFood($id)
    {
    	$food=Food::find($id);
    	$sections=Section::orderBy('id','asc')->get();
    	return view('adminfood.edit',['food'=>$food,'foodId'=>$id,'sections'=>$sections]);
    }
    public function postAdminUpdateFood(Request $request)
    {
    	$this->validate($request,[
    		'sectionfood'=>'required|not_in:0',
    		'namefood'=>'required|min:6',
    		'description'=>'required|min:10',
    		'price'=>'required|min:7',
    		'image'=>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
    	]);
    	$food = Food::find($request->input('id'));
    	$food->name = $request->input('namefood');
    	$food->description = $request->input('description');
    	$food->price = $request->input('price');
    	$food->section_id= $request->input('sectionfood');
    	if($request->hasFile('image')){
    		$request->file('image');
    		$filename= $request->image->getClientOriginalName();
    		$request->image->move('img',$filename);
    		$food->image_url = $filename;

    	}
    	$food->save();
    	return redirect()->route('adminfood.index')->with('info', 'Food edited, name is: ' . $request->input('namefood'));
    }
}
