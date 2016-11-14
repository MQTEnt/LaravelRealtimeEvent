<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Notification;
class NotificationController extends Controller
{
	public function getData(){
		//Get unread notification
		$countUnreadNoti = Notification::select('id')->where('stat', 1)->count();
		$data = ['unread'=> $countUnreadNoti];
		return $data;
	}
}
