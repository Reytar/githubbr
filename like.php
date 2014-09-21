<?php

require_once('config.php'); 

$link = mysql_connect($dbhost, $dblogin, $dbpas) or die("Не могу соединиться с бозой данных");
mysql_select_db('githubbr', $link) or die("Не могу выбрать базу");

function crt_like_button($url){  //создаем кнопку (при загрузке страницы)

	$query = 'SELECT * FROM likes WHERE `url`="'.$url.'"';
	$result = mysql_query ($query) or die(mysql_error());

	if(mysql_fetch_array($result)){
		return '<div class="like" onclick=like("'.$url.'",this);>unlike</div>';
	}else{
		return '<div class="like" onclick=like("'.$url.'",this);>like</div>';
	}
	
}

if(isset($_GET['url']) and $_GET['url']!=''){ //изменяем значение (при  AJAX запросе)
	
	$query = 'SELECT * FROM likes WHERE `url`="'.$_GET['url'].'"';
	$result = mysql_query ($query) or die(mysql_error());
	if(mysql_fetch_array($result)){
		mysql_query ('DELETE FROM likes WHERE `url`="'.$_GET['url'].'"') or die(mysql_error());
		echo 'like';
	}else{
		$query = "INSERT INTO likes(id,url) VALUES('','".$_GET['url']."')"; 
		mysql_query($query) or die(mysql_error());
		echo 'unlike';
	}
	
}


?>