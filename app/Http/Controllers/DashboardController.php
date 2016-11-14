<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;
class DashboardController extends Controller
{
    public function index(){
    	$unreadNoti = Notification::select(['id', 'type', 'content', 'stat'])->orderBy('id', 'desc')->get();
    	return view('admin.dashboard', compact('unreadNoti'));
    }
    public function update(){
    	//Change Notification stat from 1 (unread) to 0 (seen)
    	Notification::where('stat', 1)->update(['stat' => 0]);
    	return 'Update Success';
    }
    public function destroy($id){
    	$noti = Notification::find($id);
    	$noti->delete();
    	return 'Delete Success';
    }
}
