<?php
include_once 'server/include.php';
if (! login_check ()) {
	header ( "location:login.php" );
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description"
	content="Bootstrap contact form with PHP example by BootstrapBay.com.">
<meta name="author" content="BootstrapBay.com">
<title>Bootstrap Contact Form With PHP Example</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css"
	href="resources/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="resources/jquery-ui/jquery-ui.min.css" />
<!-- Website CSS style -->
<link rel="stylesheet" type="text/css" href="resources/css/styles.css">
<link rel="stylesheet" type="text/css"
	href="resources/css/jquery.tagsinput.min.css">
<!-- Website Font style -->
<link rel="stylesheet"
	href="resources/font-awesome/css/font-awesome.min.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen'
	rel='stylesheet' type='text/css'>
	<style type="text/css">
	.form-control{
		font-size: 12px !important;
	}
	.area_wrapper{
		position: relative;
	}
	.error{
		position: absolute;
		right: 0px; 
		top: 0px;
		z-index: 999;
		display: none;
		border: #ebccd1 1px solid;
		padding: 2px;
		border-radius: 2px;
		color: #a94442;
    	background-color: #f2dede;
	}
</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<h1 class="page-header text-center">Messanger</h1>
				<form class="form-horizontal" role="form" method="post"
					id="send-form">
					<div class="form-group area_wrapper">
						<label for="name" class="col-sm-2 control-label">To:</label>
						<span class="error" id="name_error"></span>
						<div class="col-sm-10">
							<input type="text" id="tags" class="form-control" name="name"
								placeholder="To:" value="">
						</div>
					</div>
					<div class="form-group area_wrapper">
						<label for="message" class="col-sm-2 control-label">Message</label>
						<span class="error" id="msg_error"></span>
						<div class="col-sm-10">
							<textarea class="form-control" rows="5" name="message"></textarea>
						</div>
					</div>
					<div class="form-group ">
						<label for="send-btn" class="col-sm-2 control-label"></label>
						<div class="col-sm-10">
							<button type="button" id="send-btn"
								class="btn btn-primary btn-lg btn-block login-button">Send</button>
						</div>
					</div>
					<input type="hidden" value="send_message" name="send_message" />
					<div class="login-register">
						<label class="col-sm-2 control-label"></label>
						<div class="col-sm-5">
							<a class="btn btn-link btn-lg btn-block login-butto"
								href="add_contact.php">Add Contact</a>
						</div>
						<div class="col-sm-5">
							<a class="btn btn-link btn-lg btn-block login-butto"
								href="logout.php">Logout</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="resources/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>
	<script type='text/javascript' src='resources/jquery-ui/jquery-ui.min.js'></script>
	<script type="text/javascript"
		src="resources/js/jquery.tagsinput.min.js"></script>
		
	
	<script type="text/javascript">
	$("#tags").tagsInput({
	    autocomplete_url: "server/contacts.php",
	    'width':'auto'
	 });

	$(function() {    
	     
	    $("#send-btn").click(function(e) {  
	      e.preventDefault();
	      reg_data = $('#send-form').serialize();
	      $.ajax({
	          type:"POST",
	          url:"server/send.php",
	          data: reg_data,
	          beforeSend: function() {
	             //$('#messacge').html("<h2>Registration Form Submitted!</h2>")
	          },
	          cache: false,
	          dataType: "json",
	          success: function(data){
	              $(".form-group").removeClass("has-error");
	              $(".error").css({ 'display': "none" });
	              if (data.error === 'error') {
                  	$.each(data, function (index, value) {
                    	$('#' + index).addClass("has-error");
                    	$('#'+index+"_error").css({ 'display': "block" }).html(value);
                  	});
                  }

	              if(data.status === 'ok'){
		              alert("Message sent");
		              $('#send-form').reset();
	              }
	              if(data.status === 'error'){
		              alert("Error Encountered sending msg! ");
		              
	              }

	              
	          }

	      }); 

	      return false;
	    });        
	});
	</script>
</body>
</html>