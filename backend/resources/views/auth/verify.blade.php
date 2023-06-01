@include("auth.header")

<div class="banner-area center">
<div class="area">
	<div class="bodycontainer">
		<h1 class="tlt text-white" style="margin: 20px 0;">VERIFY <span class="text-default">EMAIL</span></h1>
		<div class="banner-title">
           <span class="decor-equal"></span>
		</div>
		<div  style="margin: 20px 0;">
			<a href="/">HOME</a> / VERIFY EMAIL
		</div>
	</div>
	<div id="particles-js"></div>
	
</div>
</div>
    <div class="smallcontainer padding">
    
	

<form action="/verify" id="verify" method="POST">
		@csrf
		@if (session('error'))
							<div class="alert alert-danger" style="color:red">
								{{ session('error') }}
							</div>
							@elseif (session('success'))
							<div class="alert alert-danger" style="color:green">
								{{ session('success') }}
							</div>
						    @endif
    	<div class="title_container">
			  <h4>Email Verification Code:</h4>
			  <span class="decor_default"></span>
		</div>
        <div class="alertdanger">An activation code was sent to your email when you registered. input the code below!</div>
		<input type="hidden" name="email" value="{{$email}}" />
        
			<input type="text" placeholder="Verification Code" required name="code" style="width:100%" class="margintb round">
        	<input type="submit" name="activate" value="Verify Now" class="btn round green" style="width: 100%"><br>
			@if(!Route::is('email_verification'))
           		<a href="resend_verify_code/{{$email}}" class="btn round red margintb" style="width: 100%">Resend Verification Code</a>
		   @endif
           <br><br><br>
	</form>
	 
    
    </div>
<a href="#" id="back-to-top" class="back-to-top fa fa-arrow-up show-back-to-top"></a>
<script>
<script>
/*--window Scroll functions--*/
$(window).on('scroll', function () {
	/*--show and hide scroll to top --*/
	var ScrollTop = $('#back-to-top');
	if ($(window).scrollTop() > 500) {
		ScrollTop.fadeIn(1000);
	} else {
		ScrollTop.fadeOut(1000);
	}
});
</script>

<?php 
						  require_once("footer.html");
	?>