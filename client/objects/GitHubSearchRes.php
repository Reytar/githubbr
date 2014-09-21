<?php

require_once(__DIR__ . '/../GitHubObject.php');
//require_once(__DIR__ . '/../GitHubRepo.php');
	

class GitHubSearchRes extends GitHubObject
{

	protected function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'total_count' => 'int',
			'items' => 'array<GitHubRepo>',
		));
	}
	
	public $total_count;
	public $items;

	
}

