<?php

require_once('like.php'); //скрипт обработки лайков
require_once(__DIR__ . '/client/GitHubClient.php'); // библиотека GitHub API

$client = new GitHubClient();
$client->setCredentials($ghuser, $ghpas); // аутентифкация



if((isset($_GET['repo']) and $_GET['repo']!='' and isset($_GET['owner']) and $_GET['owner']!='') or $_SERVER['REQUEST_URI']=='/'){ // Cтраницы описания репозитория

	if($_SERVER['REQUEST_URI']=='/'){
		$owner = 'yiisoft';
		$repo='yii'; 
		$page_title='main';
	}else{
		$owner = $_GET['owner'];
		$repo = $_GET['repo']; 
		$page_title='Repository';
	}
	
	$rep = $client->repos->get($owner, $repo); 

	$content= '<div class="left-cont"><h1>'.$rep->full_name.'</h1>Description : '.$rep->description.'<br/>watchers: '.$rep->watchers_count.'
				<br/>forks: '.$rep->forks_count.'<br/>open issues: '.$rep->open_issues_count.'<br/>Watchers: '.$rep->watchers_count.'
				<br/>homepage: <a href="'.$rep->homepage.'">'.$rep->homepage.'</a><br/>GitHub repo: <a href="'.$rep->html_url.'">'.$rep->html_url.'
				</a><br/>created at: '.$rep->created_at.'<br/></div>';
	
	$client->setPage();
	$client->setPageSize(7); //выводим только 7 первых разработчиков
	$contrs = $client->repos->listContributors($owner, $repo);
	
	$content .= '<div class="right-cont"><h1>Contributors:</h1>';
	foreach ($contrs as $contr)	{
		$like_button=crt_like_button('user/'.$contr->login);
		$content .= '<div class="contributor"><a href="/user/'.$contr->login.'">'.$contr->login.'</a> '.$like_button.'</div>';
	}

	
}if(isset($_GET['user']) and $_GET['user']!=''){ // Страницы описания пользователя

	$user=$_GET['user'];
	$page_title='User';
	$like_button=crt_like_button('user/'.$user);
	
	$one = $client->users->getSingleUser($user);
	
	$content= '<div class="ava"><img src="'.$one->avatar_url.'">'.$like_button.'</div><div class="user"><h1>'.$one->name.'</h1>'.$one->login.'<br/>
				Company: '.$one->company.'<br/>Blog: <a href="'.$one->blog.'">'.$one->blog.'</a><br/>Followers: '.$one->followers.'</div>';

}if(isset($_GET['q']) and $_GET['q']!=''){ // Страницы поиска

	$search_str=$_GET['q'];
	$page_title='Search';
	$client->setPage();
	$client->setPageSize(15); //15 первых результатов поиска

	$search_res=$client->search->getSearch($search_str);

	$content= '<b>For search term "'.$search_str.'" found</b>';
	foreach ($search_res->items as $item)	{
		
		$owner=$item->owner;
		$like_button=crt_like_button('repo/'.$item->full_name);
		
		$content .= '<div class="found-item">
		<div class="found-owner">Owner: <a href="/user/'.$owner->login.'">'.$owner->login.'</a></div>
		<div class="found-name"><a href="/repo/'.$item->full_name.'" >'.$item->name.'</a></div>';
		if($item->homepage!='') $content .= ' (<a href="'.$item->homepage.'">'.$item->homepage.'</a>)';
		$content .= '<br/>'.$item->description.'<br/>
		<span>watchers: '.$item->watchers_count.'</span>
		<span>forks: '.$item->forks_count.'</span>
		<span>'.$like_button.'</span>
		</div>';
	}
}


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html charset=utf-8">
<title>GitHub projects browser (for MobiDev)</title>
<link rel="stylesheet" href="/css/main.css" type="text/css" charset="utf-8">

</head>
<body>

<script type="text/javascript">
function like(url,button) {

	var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  button.innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","/like.php?url="+url,true);
  xmlhttp.send();
  return false;
  
}
</script>

<div class="top">
	<div class="layout">
		<span><a href="/">GitHub projects browser</a> >> <?php echo $page_title; ?></span>
		
		<form method="get" action="/search" accept-charset="UTF-8">
		<input class="search" type="text" placeholder="Search" name="q">
		</form>
	</div>
</div>
<div class="layout">
	<?php echo $content; ?>
</div>
</body>
</html>