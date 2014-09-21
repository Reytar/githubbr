<?php

require_once(__DIR__ . '/../GitHubClient.php');
require_once(__DIR__ . '/../GitHubService.php');
require_once(__DIR__ . '/../objects/GitHubSearchRes.php');

class GitHubSearch extends GitHubService
{

	public function getSearch($str)
	{
		$data = array();
		$data['q'] = $str;
			
		//return $this->client->request("/search/repositories", 'GET', $data, 200, 'GitHubRepo', true);
		return $this->client->request("/search/repositories", 'GET', $data, 200, 'GitHubSearchRes');
	}




}

