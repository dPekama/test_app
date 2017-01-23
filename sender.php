<?php
include_once 'server/include.php';
if (!login_check ()) {
	header ( "location:login.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="ISO-8859-1">
<title>Messanger</title>
<link rel="stylesheet" type="text/css"
	href="resources/css/bootstrap.css">

<!-- Website CSS style -->
<link rel="stylesheet" type="text/css" href="resources/css/chat.css">

<!-- Website Font style -->
<link rel="stylesheet"
	href="resources/font-awesome/css/font-awesome.min.css">

<!-- Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Passion+One'
	rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Oxygen'
	rel='stylesheet' type='text/css'>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-xs-12 col-md-offset-3">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<span class="glyphicon glyphicon-comment"></span> Chat
						<div class="btn-group pull-right">
							<button type="button"
								class="btn btn-default btn-xs dropdown-toggle"
								data-toggle="dropdown">
								<span class="glyphicon glyphicon-chevron-down"></span>
							</button>
							<ul class="dropdown-menu slidedown">
								<li><a href="#"><span
										class="glyphicon glyphicon-refresh"> </span>Refresh</a></li>
								<li><a href="#"><span
										class="glyphicon glyphicon-ok-sign"> </span>Available</a></li>
								<li><a href="#"><span
										class="glyphicon glyphicon-remove"> </span>Busy</a></li>
								<li><a href="#"><span
										class="glyphicon glyphicon-time"></span> Away</a></li>
								<li class="divider"></li>
								<li><a href="#"><span
										class="glyphicon glyphicon-off"></span> Sign Out</a></li>
							</ul>
						</div>
					</div>
					<div class="panel-body">
						<ul class="chat">
							<li class="left clearfix"><span class="chat-img pull-left"> <img
									src="resources/img/text.png"
									alt="User Avatar" class="img-circle" />
							</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">Jack Sparrow</strong> <small
											class="pull-right text-muted"> <span
											class="glyphicon glyphicon-time"></span>12 mins ago
										</small>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Curabitur bibendum ornare dolor, quis ullamcorper ligula
										sodales.</p>
								</div></li>
							<li class="right clearfix"><span class="chat-img pull-right"> <img
									src="resources/img/text_me.png"
									alt="User Avatar" class="img-circle" />
							</span>
								<div class="chat-body clearfix">
									<div class="header">
										<small class=" text-muted"><span
											class="glyphicon glyphicon-time"></span>13 mins ago</small> <strong
											class="pull-right primary-font">Bhaumik Patel</strong>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Curabitur bibendum ornare dolor, quis ullamcorper ligula
										sodales.</p>
								</div></li>
							<li class="left clearfix"><span class="chat-img pull-left"> <img
									src="resources/img/text.png"
									alt="User Avatar" class="img-circle" />
							</span>
								<div class="chat-body clearfix">
									<div class="header">
										<strong class="primary-font">Jack Sparrow</strong> <small
											class="pull-right text-muted"> <span
											class="glyphicon glyphicon-time"></span>14 mins ago
										</small>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
										Curabitur bibendum ornare dolor, quis ullamcorper ligula
										sodales.</p>
								</div></li>
						</ul>
					</div>
					<div class="panel-footer">
						<div class="input-group">
							<input id="btn-input" type="text" class="form-control input-sm"
								placeholder="Type your message here..." /> <span
								class="input-group-btn">
								<button class="btn btn-warning btn-sm" id="btn-chat">Send</button>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>