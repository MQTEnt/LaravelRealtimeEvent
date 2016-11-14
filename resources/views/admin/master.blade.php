
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="#">Dashboard</a></li>
        <li><a href="#">Categories</a></li>
        <li><a href="#">Products</a></li>
      </ul>
    </div>
  </div>
</nav> <!-- Navbar for moblie -->
<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Logo</h2>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="/dashboard"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard <span id="dashboard" class="badge"></span></a></li>
        <li><a href="{{route('cate.index')}}"><span class="glyphicon glyphicon-th" aria-hidden="true"></span> Categories</a></li>
        <li><a href="{{route('product.index')}}"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Products</a></li>
      </ul>
    </div> <!-- End Navvar -->
    <div id="menu-content" class="col-sm-9">
      <div id="message" class="row">
        <div class="col-sm-12">
          @if(Session::has('message'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Success! </strong><span>{{Session::get('message')}}</span>
            </div>
          @endif
        </div> <!-- End Message display -->
        <div class="col-sm-12">
          @if (count($errors) > 0)
          <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <p><strong>Warning!</strong><span> Have some error</span></p>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif
        </div> <!-- End Error display -->
      </div>
    	@yield('body.content')
    </div> <!-- End .menu-content -->
  </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="https://cdn.socket.io/socket.io-1.4.5.js"></script>
<script>
  var socket = io('http://localhost:3000');
  var unreadNoti = 0;
  $.get('noti/data', function(data){
    unreadNoti = data.unread;
    $('#dashboard').text(unreadNoti);
  });
  socket.on("admin-notification-channel:App\\Events\\AdminNotificationEvent", function(message){
    $('#dashboard').text(++unreadNoti);
  });
</script>
@yield('script')
</body>
</html>

