let pageCount = 1;
let url ='https://emmaproject.online/api/sms'
//let url ='http://127.0.0.1:8000/api/sms';
$(document).ready(function() {
	$('#sidebar-toggle').click(function() {
    $('.sidebar').toggleClass('closed');
  });
  // Set page total on page load
  $('#pageTotal').text('160');
  //count input field
  $('#main_msg').on('input keyup', countInput);
 });
  
 function countInput(){
	 //get the total number of characters from the msg box
    let totalCharacters = $(this).val().length;
	//data returns array of pagecount and maximum allowed character e.g 2 pages and 160 character
    let data=checkPageCountAndCharacter(totalCharacters);
    $('#pageCount').text('Page Count: ' + data['pageCount']);
	$('#pageTotal').text(data['currentPageTotal']);
     //get next character left
	$('#character_entered').text(nextPageCount(data['pageCount'], totalCharacters));
 }
function checkPageCountAndCharacter(totalCharacters) {
	//this function returns the current page and number of maximun allowed characters
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
//this function counts the character remaining for other pages
 function nextPageCount(pageNo,characterEnter){
    if(pageNo == 1){
		return 160-characterEnter;
	}else{
		pageNo =pageNo-1;
		//get expected total character for this page
		let expectedPageCount=160 + (pageNo * 154)
		return expectedPageCount-characterEnter;
	}
 }
function processTaskToSubmit(event){
		 event.preventDefault();
		
		let pageC="";
		//get page count
		let pageCount = $("#pageCount").text();
		//check if page count is greater than 0;
		if(pageCount.length>10){
		    let parts = pageCount.split(":");
			pageC=parts[1].trim();
		}
	  
	  let recipientArray = cleanNumber($("#recipients").val());
	  let listOfNumber = recipientArray.split(",");
	  let count = listOfNumber.length;
	  let msgC='  page of message to '
		if(pageC > 1){
			 msgC=' pages of message to '
		}
		alert('you are about sending ' + pageC + msgC  + count + ' users ');
	   

		createTask($("#sender").val(), $("#recipients").val(), $("#main_msg").val(), pageC)
}
function createTask(sender, recipients, msg,pageCount){
	console.log(recipients);
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
		process_success(data)
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
function process_success(data){
		 $('#cost').html('&#8358;' + data['success']['cost'].toFixed(2));
		 $('#number_delivered').text(data['success']['number_delivered']);
		 $('#errCount').text(data['success']['errCount']);
		  $('#not_found').text(data['success']['not_found']);
		 //$("#exampleModal").html(data);
		 $('#exampleModal').modal({'show' : true});
}
//clear it 
$('.form-control').on('input', function() {
  $('#sender_error, #recipients_error, #msg_error').html(''); // Clear all errors
});
function cleanNumber(recipients){
	//remove every character, white space before comma except comma, digit and white space character
	 let recipientArray = recipients.replace(/[^,\d]|(\s,)/g, '');
	
	  //add comma before every number
	 recipientArray = recipientArray.replace(/([^,\s\n])[\s\n]+/g, '$1,');
		
	//remove comma before ending or begining
	   recipientArray= recipientArray.replace(/^[,\s]+|[,\s]+$/g, '');
	  return recipientArray;
}