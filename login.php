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
</head>
<body>
	<div class="container">
		<div class="row main">
			<div class="panel-heading">
				<div class="panel-title text-center">
					<h1 class="title">App Test Login</h1>
					<hr />
				</div>
			</div>
			<div class="main-login main-center">
			<span id="message"></span>
				<form class="form-horizontal" id="login-form" method="post"
					action="#">


					<div class="form-group" id="username">
						<label for="username" class="cols-sm-2 control-label">Username</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-users fa"
									aria-hidden="true"></i></span> <input type="text"
									class="form-control" name="username"
									placeholder="Enter your Username" />
							</div>
						</div>
					</div>

					<div class="form-group" id="password">
						<label for="password" class="cols-sm-2 control-label">Password</label>
						<div class="cols-sm-10">
							<div class="input-group">
								<span class="input-group-addon"><i class="fa fa-lock fa-lg"
									aria-hidden="true"></i></span> <input type="password"
									class="form-control" name="password"
									placeholder="Enter your Password" />
							</div>
						</div>
					</div>

					<input type="hidden" value="login" name="login" />
					<div class="form-group ">
						<button type="button" id="login-btn"
							class="btn btn-primary btn-lg btn-block login-button">Login</button>
					</div>
					<div class="login-register">
						<a href="register.php">Register</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="resources/js/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.js"></script>
	<script type="text/javascript">
	$(function() {    
	     
	    $("#login-btn").click(function(e) {  
	      e.preventDefault();
	      reg_data = $('#login-form').serialize();
	      $.ajax({
	          type:"POST",
	          url:"server/login.php",
	          data: reg_data,
	          beforeSend: function() {
	             //$('#messacge').html("<h2>Registration Form Submitted!</h2>")
	          },
	          cache: false,
	          dataType: "json",
	          success: function(data){
	              $(".form-group").removeClass("has-error");
	              if (data.error === 'error' || data.status === 'error') {
                  	$("#message").html('<div class="alert alert-danger">Username or Password incorrect!	</div>')
                  }

	              if(data.status === 'ok'){
		              alert("logged in");
		              location.href = "index.php";
	              }
	              
	          }

	      }); 

	      return false;
	    });        
	});
	</script>
</body>
</html>