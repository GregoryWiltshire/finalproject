<?php
include 'login_model.php';

	function validate_person($user,$column){
		return column_value_exist($user,$column);
	}


	function insert_user($user,$pass,$email){
	     create_user($user,$pass,$email);
    }

	
?>