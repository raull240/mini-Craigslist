<?php
function array_sanitize($item){
	$item=mysql_real_escape_string($item);
}
function sanitize($data){
	return mysql_real_escape_string($data);
}

function output_errors($errors){
	$output=array();
	foreach($errors as $error){
		$output[]='<li list-style-type=none>'.$error.'</li>';
		}
		return '<ul list-style-type=none>'.implode('',$output).'</ul>';
	}
?>