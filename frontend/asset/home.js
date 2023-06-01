let pageCount = 1;
let url ='https://emmaproject.online/api/sms'
//let url ='http://127.0.0.1:8000/api/sms'
$(document).ready(function() {
  // Set page total on page load
  $('#pageTotal').text('160');
  
  //count input field
  $('#main_msg').on('input keyup', function() {
	//get the total number of characters from the msg box
    let totalCharacters = $(this).val().length;
	//data returns array of pagecount and pagetotal e.g 2 pages and 160 character
    let data=checkPageCountAndCharacter(totalCharacters);
    $('#pageCount').text('Page Count: ' + data['pageCount']);
    //
	$('#pageTotal').text(data['currentPageTotal']);
	 let entered=nextPageCount(data['pageCount'], totalCharacters);
     //let characterLeft="";
	 
	$('#character_entered').text(entered);
  });

function checkPageCountAndCharacter(totalCharacters) {
	//this function returns the current page and number of characters
	let pageCount = 0;
	let isFirstIteration = true;
	let currentPageTotal=0;
	do {
	  if (totalCharacters <= 160 && isFirstIteration) {
		totalCharacters -= 160;
		pageCount++;
		isFirstIteration = false;
	  } else if ((totalCharacters > 0)) {
		totalCharacters -= 154;
		pageCount++;
	  }
	} while (totalCharacters > 0);
	if(pageCount == 1){
		currentPageTotal=160;
	}
	else{
		currentPageTotal= 154;
	}
	return {'pageCount':pageCount,'currentPageTotal':currentPageTotal};
	}

});

//this function counts the character remaining for other pages
 function nextPageCount(pageNo,characterEnter){
    if(pageNo == 1){
		return 160-characterEnter;
	}else{
		pageNo =pageNo-1;
		//get expected total character for this page
		let expectedPageCount=160 + (pageNo * 154)
		//alert(expectedPageCount-characterEnter);
		return expectedPageCount-characterEnter;
	}
 }

function processTaskToSubmit(){
	    
		let pageC="";
		//get page count
		let pageCount = $("#pageCount").text();
		//check if page count is greater than 0;
		if(pageCount.length>10){
		    let parts = pageCount.split(":");
			pageC=parts[1].trim();
		}
	  let sender=$("#sender").val();
	  let recipients=$("#recipients").val();
	  //add comma before every number
	  let recipientArray = recipients.replace(/([^,\s])\s+/g, '$1,');
		
		
		
		let pt = recipientArray.split(",");
		
		let count = pt.length;
		let msgC='  page of message to '
		if(pageC > 1){
			 msgC=' pages of message to '
		}
		alert('you are about sending ' + pageC + msgC  + count + ' users ');
	    let msg=$("#main_msg").val();
		//alert(msg);
		createTask(sender, recipients, msg, pageC)
	
}
function createTask(sender, recipients, msg,pageCount){
	console.log(url);
	 $.ajax({
    type: 'POST',
    url: url,
    data: {
        sender: sender,
        recipients: recipients,
        msg: msg,
        page: pageCount,
    },
    success: function (data) {
        console.log(data);
		data['success']['cost'];
		data['success']['number_delivered'];
		data['success']['errCount'];
		data['success']['not_found'];
		
		 $('#cost').text(data['success']['cost'].toFixed(2));
		 $('#number_delivered').text(data['success']['number_delivered']);
		 $('#errCount').text(data['success']['errCount']);
		  $('#not_found').text(data['success']['not_found']);
		 //$("#exampleModal").html(data);
		 $('#exampleModal').modal({'show' : true});
    },
    error: function (xhr) {
        if (xhr.status === 422) {
            var errors = xhr.responseJSON.errors;
            // Handle validation errors here
			process_error(errors);
			
        } else {
            console.log(xhr.statusText);
        }
    },
});
}
function process_error(errors){
	for(key in errors){
		     
			  if(key == 'sender'){
				 $('#sender_error').text(errors[key]);
			  }
			  else if( key == 'recipients'){
				 $('#recipients_error').text(errors[key]);
			  }
			  else if( key == 'msg'){
				 $('#msg_error').text(errors[key]);
			  }
			
		   }
}
//clear it 
$('.form-control').on('input', function() {
  $('#sender_error, #recipients_error, #msg_error').html(''); // Clear all errors
});