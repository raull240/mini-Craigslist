<?php

function register_user($register_data){
	array_walk($register_data,'array_sanitize');
	$register_data['Password']=md5($register_data['Password']);
	$feilds='`'.implode('`,`',array_keys($register_data)).'`';
	$data='\''.implode('\',\'',$register_data).'\'';
	
	mysql_query("INSERT INTO `users` ($feilds) VALUES ($data)");

}



function user_data($user_id){
	$data=array();
	$user_data=(int)$user_id;
	$func_num_args=func_num_args();
	$func_get_args=func_get_args();
		
	if($func_num_args>1)
	{
		unset($func_get_args[0]);
		$feilds='`'.implode('`,`',$func_get_args).'`';
		$data=mysql_fetch_assoc(mysql_query("SELECT $feilds FROM `users` WHERE `UID`=$user_id"));
		
		return $data;
	}
		
	}

function logged_in(){
return(isset($_SESSION['user_id'])) ? true : false; 

}

function users_exists($username){
$username=sanitize($username);
	$query= mysql_query("SELECT COUNT(`UID`) FROM `users` WHERE `Email`='$username'");
	return(mysql_result($query,0)==1)? true : false;
}




function user_id_from_username($username){
	$username=sanitize($username);
	return mysql_result(mysql_query("SELECT `UID` FROM `users` WHERE `Email`='$username'"),0,'UID');
}

function login($username,$password){
	$user_id=user_id_from_username($username);
	$username=sanitize($username);
	$password=md5($password);
	return(mysql_result(mysql_query("SELECT COUNT(`UID`) FROM `users` WHERE `Email`='$username' AND `Password`='$password'"),0))?$user_id:false;;
	
}
?>