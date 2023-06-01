<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/cd798d0f54.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/home.css') }}" />


<style>
body {
  font-family: "Lato", sans-serif;
  background:#f0f0f0;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
 
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size:1.1em;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  
  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.b{
	border-style:solid;
	height:50px;
}
#first_section{
				display:flex;
				
				box-sizing: border-box;
				padding-top:1em;
				padding-bottom: 1em;
			}
#sec{
    margin-left: auto;
}
@media screen and (min-width: 900px) {
 
  .sidenav {
  
	width:250px !important;
  }
  #mains{
	  margin-left:250px !important;
  }
  #close, #open{
	  display:none !important;
  }
	  
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" id="close" class="closebtn" onclick="closeNav()">&times;</a>
					<ul class="udex-ul">
						<li class="header"><a href="/home"><i class="fa fa-home"></i> MY OFFICE</a></li>
						<li ><a href="/history"> <i class="fa fa-history"></i> User Activity Log</a></li>
						<li ><a href="/deposit"> <i class="fa fa-inbox"></i> Deposit Funds</a></li>
						<li ><a href="/withdraw"> <i class="fa fa-money"></i> Withdraw Funds</a></li>
						<li ><a href="/newinvestment"> <i class="fa fa-database"></i> New Investment</a></li>
						<li><a href="/affliate"> <i class="fa fa-crosshairs"></i> Affiliate Program</a></li>
						<li ><a href="/testimony"> <i class="fa fa-bullhorn"></i> Write Testimony</a></li>
						<li ><a href="/setting"> <i class="fa fa-gears"></i> Account Settings</a></li>
						<li ><a href="/tradeview"> <i class="fa fa-bullseye"></i> Trade View</a></li>
						<li><a href="/logout"> <i class="fa fa-power-off"></i> Logout</a></li>
						<li><a href="#/contact"> <i class="fa fa-exclamation-circle"></i> Help</a></li>
					</ul>
					  
</div>

<div id="mains">
		<div style="background:black" id="first_section">
							
							<div id="first" style="height:150px">
								<img src="demoimage/logo.png">
							</div>
							<div id="sec" class="dropdown">
							  <span class="dropdown-toggle"  id="fourth" data-bs-toggle="dropdown" >
								<i class="fas fa-user" style="color: Mediumslateblue;font-size:2em;margin-top:0.5em"></i>
							  </span>
							  <ul class="dropdown-menu">
								<li class="title" style="text-align:center">Account</li>
								
								<li><a class="dropdown-item" href="/setting"><i class="fas fa-user" style="color: Mediumslateblue;"></i>{{Auth::user()->lname}}</a></li>
								
								<li><a class="dropdown-item" href="/changepassword"><i class="fas fa-lock" style="color: Mediumslateblue;"></i> Change Password</a></li>
								<li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt" style="color: Mediumslateblue;"></i> Log Out</a></li>
								


							 </ul>
							</div>
							
							

		
		
		
		</div>
		<span style="font-size:30px;cursor:pointer" id="open"  onclick="openNav()">&#9776;</span>
	  
		<div class="udex-main" id="main">
		
		@yield('content')
		
		
		</div>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("mains").style.marginLeft = "250px";
   document.getElementById("open").style.display = 'none';
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("mains").style.marginLeft= "0";
  document.getElementById("open").style.display = 'block';
}
</script>
   
</body>
</html> 
