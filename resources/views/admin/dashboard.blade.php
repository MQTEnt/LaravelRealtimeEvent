@extends('admin.master')
@section('body.content')
	<div class="row">
		<div class="col-sm-12">
			<p>Dashboard</p>
			<div id="notification-list">
				@foreach($unreadNoti as $item)
					@if($item->stat==0)
						<div class="alert alert-info">
							<button id-noti="{{$item->id}}" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Seen!</strong> {{$item->content}}
						</div>
					@else
						<div class="alert alert-success">
							<button id-noti="{{$item->id}}" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<strong>Success</strong> {{$item->content}}
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
@stop
@section('script')
	<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
	<script>
		$(document).ready(function(){
			//Reset Badge
			$('#dashboard').remove();
			//Change stat noti
			$.get('/dashboard/update', function(data){
				console.log(data);
			})
			//Delete noti
			$('.close').click(function(){
				var idNoti = $(this).attr('id-noti');
				$.get('/dashboard/'+idNoti, function(data){
					console.log(data);
				});
			});
		});
		//Socket
        var socket = io('http://localhost:3000');
        //var socket = io('http://192.168.10.10:3000');
        socket.on("admin-notification-channel:App\\Events\\AdminNotificationEvent", function(message){
        	//Make alert
        	var alert = '<div class="alert alert-success">';
    			alert += '<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong>';
    			alert +=message.data.msg+' '+message.data.idProduct;
    			alert +='</div>';
    		//Display notification
            $('#notification-list').prepend(alert);
            
            //Update Notification stat in Database...
        });
    </script>
@stop