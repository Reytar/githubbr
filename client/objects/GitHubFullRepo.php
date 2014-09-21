<?php

require_once(__DIR__ . '/../GitHubObject.php');

	

class GitHubFullRepo extends GitHubObject
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	protected function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'name' => 'string',
			'description' => 'string',
			'full_name' => 'string',
			'watchers_count' => 'string',
			'forks_count' => 'string',
			'open_issues_count' => 'string',
			'homepage' => 'string',
			'html_url' => 'string',
			'created_at' => 'string',
		));
	}
	
	public $name;
	public $description;
	public $full_name;
	public $watchers_count;
	public $forks_count;
	public $open_issues_count;
	public $homepage;
	public $html_url;
	public $created_at;


	
}

