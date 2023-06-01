<html>
<body style="background-color:#EDF2F7;">
	<div style="text-align:center;display:flex;width:250px;margin:0 auto;padding-top:2em;padding-bottom:1em;">
		  <h2 style="margin-top:3px"><img src="https://backend.excapture.com/images/log.png" width="35px"  height="35px" alt="Excapture"></h2>
         <h2 style="text-align:center;color:black;font-size:2.2em;">Excapture</h2>
	</div>
	<div style="background-color:#fff;width:70%;margin:0 auto;padding:2em;color:black;">
			
			<div style="color:black !important;font-weight:normal;">{{$other_message['head']}}</div>


			<div style="color:black !important;font-weight:normal;padding-top:1em;"> {!! $other_message['msg1']  !!}</div>

			<div style="color:black !important;font-weight:normal;padding-top:1em;"> {!! $other_message['table'] !!}</div>
		
			
			<button style="text-align:center;padding:1em;background-color:blue;color:white;margin:2em auto;display:block;border:none;border-radius:0.2em">
			<a href="{!! $other_message['url'] !!}" style="text-decoration:none;color:white">{{$other_message['btn_label']}}</a> 
			</button>
			{{$other_message['msg2']}}<br>

            {{$other_message['msg3']}}
			
	</div>
	<!--
   <h4 style="text-align:center;font-weight:normal">
			
			If you do not wish to be getting emails from us, click here to <a href="{!! $other_message['url'] !!}">unsubscribe</a>
   </h4>-->
 
				
				<p style="text-align:center;margin-top:1em;padding-bottom:2em;font-size:12px !important">© {{ date('Y') }} {{ config('app.name') }} 444 Alaska Avenue Suite #BNT573
				 Torrance, CA 90503 USA.<br>
				 +1 (408) 774 4560<br>
				
				cs@excapture.com
				</p>
				
		
		
		


</body>
</html>