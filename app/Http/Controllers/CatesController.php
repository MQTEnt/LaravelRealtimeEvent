<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Cate;
use App\Http\Requests\CateFormRequest;
use Session;
class CatesController extends Controller
{
	public function index(){
		$cates = Cate::all();
		return view('admin.cate', compact('cates'));
	}
	public function store(CateFormRequest $request){
		Cate::create([
			'name' => $request->get('name'),
			'desc' => $request->get('desc')
		]);
		return redirect()->route('cate.index')->with(['message' => 'A new category has been created']);
	}
	public function edit($id){
		$cate = Cate::find($id);
		return $cate;
	}
	public function update($id, CateFormRequest $request){
		$cate = Cate::find($id);
		$cate->update([
			'name' => $request->get('name'),
			'desc' => $request->get('desc')
		]);
		return redirect()->route('cate.index')->with(['message' => 'Category with id '.$id.' has been updated']);
	}
	public function destroy($id){
		$cate = Cate::find($id);
		$cate->delete();
		return 1;
	}
}
