<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Cate;
use App\Notification;
use App\Events\AdminNotificationEvent;
class ProductsController extends Controller
{
	public function index(){
		return view('admin.product');
	}
    public function getData(){
    	$products = Product::all();
    	$cates = Cate::select(['id', 'name'])->get();
    	$data = ['products' => $products, 'cates' => $cates];
    	return $data;
    }
    public function store(Request $request){
    	Product::create([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'price' => $request->get('price'),
            'cate_id' => $request->get('cate_id')
        ]);
        return "Create Success";
    }
    public function edit($id){
        $product = Product::find($id);
        $data = ['product' => $product];
        return $data;
    }
    public function update($id, Request $request){
        $product = Product::find($id);
        $product->update([
            'name' => $request->get('name'),
            'desc' => $request->get('desc'),
            'price' => $request->get('price'),
            'cate_id' => $request->get('cate_id')
        ]);
        //After update product in Database, make event...
        $adminEvent = new AdminNotificationEvent();
        //Call function updateProductEvent() to set $data (in Event class)...
        $adminEvent->updateProductEvent($product->id, 'Update product with ID');
        //Call event
        event($adminEvent);

        //Create new record Notification in Database
        Notification::create([
            'type' => 'Update',
            'content' => 'Update product with ID '.$product->id,
            'stat' => 1
        ]);
        return "Update Success";
    }
}
