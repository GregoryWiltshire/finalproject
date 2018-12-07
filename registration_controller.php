<?php
include 'user.php';

	function validate_user($username){
		return checkuser($username);
	}


	function insert_user($user,$pass,$email){
	     insert($user,$pass,$email);
    }

	function validate_email($email){
		return checkemail($email);
    }
?>