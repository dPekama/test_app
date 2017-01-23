<?php
include_once 'include.php';
require_once('AfricasTalkingGateway.php');

if (login_check ()) {
	if(isset($_POST['send_message'])){
		$name = $_POST["name"];
		$msg = $_POST["message"];
	
		$error = false;
		$ajax = array();
	
		if(empty($name)){
			$error = true;
			$ajax['name'] = 'Cannot be empty! ';
		}
	
		if( empty($msg)  ){
			$error = true;
			$ajax['msg'] = 'Cannot be empty! ';
		}
		
		
		if($error == false){
			$contact =  get_nos($conn,$name);
			
			foreach ($contact as $str) {
				//$contact_to[] = str_replace('/^0/','+254', $str);
				$contact_to[] = preg_replace('/0/', '+254', $str, 1);
			}
			
			$username   = $myusername;
			$apikey     = $myapikey;
			// Specify the numbers that you want to send to in a comma-separated list
			// Please ensure you include the country code (+254 for Kenya in this case)
			
			$recipients = implode("','",$contact_to);
			// And of course we want our recipients to know what we really do
			$message    = $msg;
			
			$from = $short_code;
			
				// Create a new instance of our awesome gateway class
			$gateway    = new AfricasTalkingGateway($username, $apikey,'sandbox');
			// Any gateway error will be captured by our custom Exception class below,
			// so wrap the call in a try-catch block
			
			
			try
			{
				// Thats it, hit send and we'll take care of the rest.
				$results = $gateway->sendMessage($recipients, $message,$from);
				
				foreach($results as $result) {
					// status is either "Success" or "error message"
					//echo " Number: " .$result->number;
					//echo " Status: " .$result->status;
					//echo " MessageId: " .$result->messageId;
					//echo " Cost: "   .$result->cost."\n";
					//$ajax['status'+$i] = 'message sent to '.$result->number;
				    $nos[] = $result->number;
					
				}
				
				$ajax['status'] = 'message sent to '.implode(",",$nos);
				
			}
			catch ( AfricasTalkingGatewayException $e )
			{
				//echo "Encountered an error while sending: ".$e->getMessage();
				$ajax['status'] = 'Encountered an error while sending';
				$ajax['status'] = 'error';
			}
		}else{
			$ajax['error'] = 'error';
		}
	
		echo json_encode($ajax);
	}
}
