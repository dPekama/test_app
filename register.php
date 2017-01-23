<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css"
	href="resources/css/bootstrap.css">

<!-- Website CSS style -->
<link rel="stylesheet" type="text/css" href="resources/css/styles.css">

<!-- Website Font style -->
<link rel="stylesheet"
	href="resources/font-awesome/css/font-awesome.min.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen'
	rel='stylesheet' type='text/css'>

<title>Admin</title>
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
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">App Test</h1>
					<hr />
				</div>
			</div>
			<div class="main-login main-center">
				<form class="form-horizontal" id="registration-form" method="post"
					action="#">

					<div class="form-group area_wrapper" id="name">
						<label for="name" class="cols-sm-2 control-label">Your Name</label>
						<span class="error" id="name_error"></span>
						<div class="cols-sm-10 ">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-user fa"
									aria-hidden="true"></i></span> <input type="text"
									class="form-control" name="name" placeholder="Enter your Name" />
							</div>
						</div>
					</div>

					<div class="form-group area_wrapper" id="email">
						<label for="email" class="cols-sm-2 control-label">Your Email</label>
						<span class="error" id="email_error"></span>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-envelope fa"
									aria-hidden="true"></i></span> <input type="text"
									class="form-control" name="email"
									placeholder="Enter your Email" />
							</div>
						</div>
					</div>

					<div class="form-group area_wrapper" id="phone">
						<label for="username" class="cols-sm-2 control-label">Phone Number</label>
						<span class="error" id="phone_error"></span>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-phone fa"
									aria-hidden="true"></i></span> <input type="text"
									class="form-control" name="phone"
									placeholder="Enter your phone number" />
							</div>
						</div>
					</div>

					<div class="form-group area_wrapper" id="username">
						<label for="username" class="cols-sm-2 control-label">Username</label>
						<span class="error" id="username_error"></span>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa"
									aria-hidden="true"></i></span> <input type="text"
									class="form-control" name="username"
									placeholder="Enter your Username" />
							</div>
						</div>
					</div>

					<div class="form-group area_wrapper" id="password">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<span class="error" id="password_error"></span>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg"
									aria-hidden="true"></i></span> <input type="password"
									class="form-control" name="password"
									placeholder="Enter your Password" />
							</div>
						</div>
					</div>

					<div class="form-group  area_wrapper" id="confirm">
						<label for="confirm" class="cols-sm-2 control-label">Confirm
							Password</label>
							<span class="error" id="confirm_error"></span>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg"
									aria-hidden="true"></i></span> <input type="password"
									class="form-control" name="confirm"
									placeholder="Confirm your Password" />
							</div>
						</div>
					</div>
					<input type="hidden" value="register" name="register" />
					<div class="form-group ">
						<button type="button" id="register-btn"
							class="btn btn-primary btn-lg btn-block login-button">Register</button>
					</div>
					<div class="login-register">
						<a href="login.php">Login</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="resources/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function() {    
	     
	    $("#register-btn").click(function(e) {  
	      e.preventDefault();
	      reg_data = $('#registration-form').serialize();
	      $.ajax({
	          type:"POST",
	          url:"server/registration.php",
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
		              alert("registared");
		              location.href = "login.php";
	              }
	          }

	      }); 

	      return false;
	    });        
	});

	</script>
</body>
</html>