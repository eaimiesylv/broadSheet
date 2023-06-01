<?php

namespace App\Mail;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserMail;

class EmailTemplate{
     
	public $value="emma";
    public function __construct($email, $type,$variable=""){
			//return "good";
			//$link="http://localhost:8000";
			$link="http://bitbullcoinage.live";
			 if($type=='register'){
				 
				 $url="$link/verify/$email";
				$head="Hello";
				$title="Verify Email Address";
				$btn_label="Verify Email Address";
				$table="";
				$message1="Please use this code <b>$variable </b> to verify your email address."; 
				$message2=''; 
				$message3="If you're having trouble clicking the Verify Email Address button,
				           copy and paste the URL below into your web browser: $url"; 
             $otherdetail=['url'=>$url, 
							'msg1'=>$message1,
							'msg2'=>$message2,
							'title'=>$title,
							"btn_label"=>$btn_label, 
							"head"=>$head,
							"msg3"=>$message3,             
							"table"=>$table];
							try{
								Mail::to($email)->send(new UserMail($otherdetail));
							  }catch (\Exception $e){
								  return redirect()->intended();
							  }
			 }
			 else if($type=='recovery_email'){
				   //= base64_encode($email);
				 $url="$link/changepassword/$email/$variable";
				$head="Hello";
				$title="Password Reset";
				$btn_label="Reset Password";
				$table="";
				$message1="We receive a password reset notification on your account.<br> However if the action was not trigger by you, then 
				no further action is required.<br> This link will expire in 15 minutes";
				$message2=''; 
				$message3="If you're having trouble clicking the Password reset button,
				           copy and paste the URL below into your web browser: $url"; 
             $otherdetail=['url'=>$url, 
							'msg1'=>$message1,
							'msg2'=>$message2,
							'title'=>$title,
							"btn_label"=>$btn_label, 
							"head"=>$head,
							"msg3"=>$message3,             
							"table"=>$table];
							try{
								Mail::to($email)->send(new UserMail($otherdetail));
							  }catch (\Exception $e){
								  return redirect()->intended();
							  }
			 }
			 else if($type=='pending_deposit'){
				   //= base64_encode($email);
				
				 $url="$link/login";
				$head="Hello";
				$title="Pending Deposit";
				$btn_label="Login";
				$table="";
				$message1="This is to inform you that we received your  $$variable deposit request. We will notify you once your deposit is approve";
				$message2=''; 
				$message3="If you're having trouble clicking the Login button,
				           copy and paste the URL below into your web browser: $url"; 
             $otherdetail=['url'=>$url, 
							'msg1'=>$message1,
							'msg2'=>$message2,
							'title'=>$title,
							"btn_label"=>$btn_label, 
							"head"=>$head,
							"msg3"=>$message3,             
							"table"=>$table];
				try{
			 	 Mail::to($email)->send(new UserMail($otherdetail));
				}catch (\Exception $e){
					return redirect()->intended();
				}
			 }
			 else if($type=='confirm_deposit'){
				   //= base64_encode($email);
				 $url="$link/login";
				$head="Hello";
				$title="Confirm Deposit";
				$btn_label="Login";
				$table="";
				$message1="This is to inform you that your $$variable deposit request has been approved, login to invest it";
				$message2=''; 
				$message3="If you're having trouble clicking the Login button,
				           copy and paste the URL below into your web browser: $url"; 
             $otherdetail=['url'=>$url, 
							'msg1'=>$message1,
							'msg2'=>$message2,
							'title'=>$title,
							"btn_label"=>$btn_label, 
							"head"=>$head,
							"msg3"=>$message3,             
							"table"=>$table];
							try{
								Mail::to($email)->send(new UserMail($otherdetail));
							  }catch (\Exception $e){
								  return redirect()->intended();
							  }
			 }
			 
			 else if ($type='custom_email'){
				 $email_type=$variable[2];
				 
				 $url="$link/login";
				$head="Hello";
				$title=$variable[0];
				$btn_label="Login Now";
				$table="";
				$message1=$variable[1];
				$message2=''; 
				$message3="If you're having trouble clicking the Login button,
				           copy and paste the URL below into your web browser: $url"; 
             $otherdetail=['url'=>$url, 
							'msg1'=>$message1,
							'msg2'=>$message2,
							'title'=>$title,
							"btn_label"=>$btn_label, 
							"head"=>$head,
							"msg3"=>$message3,             
							"table"=>$table];
						if($email_type == 'single'){
							try{
								Mail::to($email)->send(new UserMail($otherdetail));
							  }catch (\Exception $e){
								  return redirect()->intended();
							  }
						}
						else{
							foreach($email as $key=>$value){
						
							
								try{
									Mail::to($value['email'])->send(new UserMail($otherdetail));
								  }catch (\Exception $e){
									  //return redirect()->intended();
								  }
							  }
							  
						}
			 }
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
	}	
	  
	  
}

?>