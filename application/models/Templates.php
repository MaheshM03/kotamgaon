<?php
class Templates extends CI_Model
{	
    function __construct() 
    {
        parent::__construct();
		$this->load->database();
  	}

	function forgot_password($name,$password)
	{
		return "<html><body>
		<p><b>Hello ".$name."</b></p>
		<p>You recently requested to reset your password for your Randhe Holidays account.</p>
		<p>Your password has beeen reset successfully,
		New password : ".$password."</p>
		<p>Thanks,<br>Team Randhe Holidays</p>
		</body></html>";
	}
	
	
	function sms_change_password($name,$password)
	{
		return "Hello ".$name." You have successfully changed your password for your NEC account New password ".$password." Thanks, Team Randhe Holidays";
	}
	
	function change_password_success($name,$password)
	{
		return "<html><body>
		<p><b>Hello ".$name."</b></p>
		<p>You have successfully changed your password for your Randhe Holidays account.</p>
		<p>Your password is,
		New password : ".$password."</p>
		<p>Thanks,<br>Team Randhe Holidays</p>
		</body></html>";
	}
	
	
}
?>