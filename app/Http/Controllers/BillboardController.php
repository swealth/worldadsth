<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\BillboardType;

use App\BillboardFlip;

use App\Billboard;

use App\BillboardPic;

//use File;

use Validator;

class BillboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function billboardform()
    {
    	$billboardtypes = BillboardType::all();
    	$billboardflips = BillboardFlip::all();
    	return view('createbillboardspace', compact('billboardtypes', 'billboardflips'));
    }

    public function createbillboard(Request $request)
    {
    	$image_rules = [];
	    $image_file_count = count($request->billboardpics) - 1;
	    foreach(range(0, $image_file_count) as $index) {
	        $image_rules['billboardpics.' . $index] = 'mimes:png,jpeg,jpg|max:2000';
	    }

	    $image_validator = Validator::make($request->all() , $image_rules);

    	$information_rules = [
	        'title' => 'required|max:50',
            'billboardsize' => 'required|max:50',
            'vat' => 'required',
            'tax' => 'required',
            'light' => 'required',
            'contact' => 'required',
            'lat' => 'required',
            'lng' => 'required',
		];

    	$information_validator = Validator::make($request->all(), $information_rules);

        if ($image_validator->fails() || $information_validator->fails()) {
        	$errors = $image_validator->messages()->merge($information_validator->messages());
            return redirect('home/billboardform')
                        ->withErrors($errors)
                        ->withInput();
        } else {
	        // check whether user upload image or not
	        $images = $request->billboardpics;
	        if($images != null){
	        	// insert infomation to db
		        $id = new Billboard($request->all());
		        $id['user_id'] = Auth::user()->id;
		        $id['default_pic'] = $images[0]->getClientOriginalName();
		        $id->save();
	        	// move img and redirect
	        	foreach ($images as $image) {
		    		$image->move(public_path() . '/billboards/'.$id->id.'/', $image->getClientOriginalName());
		    		$billboard_pic = new BillboardPic();
		    		$billboard_pic['billboard_id'] = $id->id;
		    		$billboard_pic['pic_name'] = $image->getClientOriginalName();
		    		$billboard_pic->save();
			    }
			    return redirect('/home/upload/all')->with('status', 'ลงประกาศเสร็จสมบูรณ์แล้วครับ');
	        }else{
	        	// no image and redirect here
	        	// insert infomation to db
	        	$id = new Billboard($request->all());
		        $id['user_id'] = Auth::user()->id;
		        $id['default_pic'] = "/img/uploadimage.jpg";
		        $id->save();
	        	return redirect('/home/upload/all')->with('status', 'ลงประกาศเสร็จสมบูรณ์แล้วครับ');
	        }
        }
    }

    public function getAll()
    {
    	$billboards = Billboard::where('user_id', Auth::user()->id)->paginate(6);
    	return view('all', compact('billboards'));
    }

    public function edit($id)
    {
    	$billboard = Billboard::find($id);
    	$billboardtypes = BillboardType::all();
    	$billboardflips = BillboardFlip::all();
    	$billboard_pics = BillboardPic::where('billboard_id', $id)->get();
    	return view('editbillboardspace', compact('billboard','billboardtypes','billboardflips','billboard_pics'));
    }

    public function removePic(Request $request)
    {
    	$billboardpic = BillboardPic::find($request->id);
    	unlink(public_path() . '/billboards/'.$billboardpic->billboard_id.'/'. $billboardpic->pic_name);
    	$billboardpic->delete();
    	return response()->json([
		    'data' => '0'
		]);
    }

    public function update(Request $request, $id)
    {
    	$image_rules = [];
	    $image_file_count = count($request->billboardpics) - 1;
	    foreach(range(0, $image_file_count) as $index) {
	        $image_rules['billboardpics.' . $index] = 'mimes:png,jpeg,jpg|max:2000';
	    }

	    $image_validator = Validator::make($request->all() , $image_rules);

    	$information_rules = [
	        'title' => 'required|max:50',
            'billboardsize' => 'required|max:50',
            'vat' => 'required',
            'tax' => 'required',
            'light' => 'required',
            'contact' => 'required',
            'lat' => 'required',
            'lng' => 'required',
		];

    	$information_validator = Validator::make($request->all(), $information_rules);

        if ($image_validator->fails() || $information_validator->fails()) {
        	$errors = $image_validator->messages()->merge($information_validator->messages());
            return redirect('home/billboardform')
                        ->withErrors($errors)
                        ->withInput();
        } else {
	        // check whether user upload image or not
	        $images = $request->billboardpics;
	        if($images != null){
	        	// insert infomation to db
		        $bb = Billboard::find($id);
		        $bb['title'] = $request->title;
		        $bb['billboardtype'] = $request->billboardtype;
		        $bb['billboardroad'] = $request->billboardroad;
		        $bb['billboardsize'] = $request->billboardsize;
		        $bb['billboardlight'] = $request->billboardlight;
		        $bb['billboardflip'] = $request->billboardflip;
		        $bb['billboardcost'] = $request->billboardcost;
		        $bb['vat'] = $request->vat;
		        $bb['tax'] = $request->tax;
		        $bb['light'] = $request->light;
		        $bb['contact'] = $request->contact;
		        $bb['moreinfo'] = $request->moreinfo;
		        $bb['lat'] = $request->lat;
		        $bb['lng'] = $request->lng;
		        $bb->save();
	        	// move img and redirect
	        	foreach ($images as $image) {
		    		$image->move(public_path() . '/billboards/'.$bb->id.'/', $image->getClientOriginalName());
		    		$billboard_pic = new BillboardPic();
		    		$billboard_pic['billboard_id'] = $bb->id;
		    		$billboard_pic['pic_name'] = $image->getClientOriginalName();
		    		$billboard_pic->save();
			    }
			    return redirect('/home/upload/all')->with('status', 'แก้ไขข้อมูลเสร็จสมบูรณ์แล้วครับ');
	        }else{
	        	// no image and redirect here
	        	// insert infomation to db
	        	$bb = Billboard::find($id);
	        	$bb['title'] = $request->title;
		        $bb['billboardtype'] = $request->billboardtype;
		        $bb['billboardroad'] = $request->billboardroad;
		        $bb['billboardsize'] = $request->billboardsize;
		        $bb['billboardlight'] = $request->billboardlight;
		        $bb['billboardflip'] = $request->billboardflip;
		        $bb['billboardcost'] = $request->billboardcost;
		        $bb['vat'] = $request->vat;
		        $bb['tax'] = $request->tax;
		        $bb['light'] = $request->light;
		        $bb['contact'] = $request->contact;
		        $bb['moreinfo'] = $request->moreinfo;
		        $bb['lat'] = $request->lat;
		        $bb['lng'] = $request->lng;
		        $bb['default_pic'] = '/img/uploadimage.jpg';
		        $bb->save();
	        	return redirect('/home/upload/all')->with('status', 'แก้ไขข้อมูลเสร็จสมบูรณ์แล้วครับ');
	        }
        }
    }
}
