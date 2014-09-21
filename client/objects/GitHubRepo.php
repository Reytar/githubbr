<?php

require_once(__DIR__ . '/GitHubSimpleRepo.php');

	

class GitHubRepo extends GitHubSimpleRepo
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	public function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'clone_url' => 'string',
			'git_url' => 'string',
			'ssh_url' => 'string',
			'svn_url' => 'string',
			'mirror_url' => 'string',
			'homepage' => 'string',
			'language' => 'string',
			'forks' => 'int',
			'forks_count' => 'int',
			'watchers' => 'int',
			'watchers_count' => 'int',
			'size' => 'int',
			'master_branch' => 'string',
			'open_issues' => 'int',
			'open_issues_count' => 'int',
			'pushed_at' => 'string',
			'created_at' => 'string',
			'updated_at' => 'string',
		));
	}
	
	/**
	 * @var string
	 */
	public $clone_url;

	/**
	 * @var string
	 */
	public $git_url;

	/**
	 * @var string
	 */
	public $ssh_url;

	/**
	 * @var string
	 */
	public $svn_url;

	/**
	 * @var string
	 */
	public $mirror_url;

	/**
	 * @var string
	 */
	public $homepage;

	/**
	 * @var string
	 */
	public $language;

	/**
	 * @var int
	 */
	public $forks;

	/**
	 * @var int
	 */
	public $forks_count;

	/**
	 * @var int
	 */
	public $watchers;

	/**
	 * @var int
	 */
	public $watchers_count;

	/**
	 * @var int
	 */
	public $size;

	/**
	 * @var string
	 */
	public $master_branch;

	/**
	 * @var int
	 */
	public $open_issues;

	/**
	 * @var int
	 */
	public $open_issues_count;

	/**
	 * @var string
	 */
	public $pushed_at;

	/**
	 * @var string
	 */
	public $created_at;

	/**
	 * @var string
	 */
	public $updated_at;

	/**
	 * @return string
	 */
	public function getCloneUrl()
	{
		return $this->clone_url;
	}

	/**
	 * @return string
	 */
	public function getGitUrl()
	{
		return $this->git_url;
	}

	/**
	 * @return string
	 */
	public function getSshUrl()
	{
		return $this->ssh_url;
	}

	/**
	 * @return string
	 */
	public function getSvnUrl()
	{
		return $this->svn_url;
	}

	/**
	 * @return string
	 */
	public function getMirrorUrl()
	{
		return $this->mirror_url;
	}

	/**
	 * @return string
	 */
	public function getHomepage()
	{
		return $this->homepage;
	}

	/**
	 * @return string
	 */
	public function getLanguage()
	{
		return $this->language;
	}

	/**
	 * @return int
	 */
	public function getForks()
	{
		return $this->forks;
	}

	/**
	 * @return int
	 */
	public function getForksCount()
	{
		return $this->forks_count;
	}

	/**
	 * @return int
	 */
	public function getWatchers()
	{
		return $this->watchers;
	}

	/**
	 * @return int
	 */
	public function getWatchersCount()
	{
		return $this->watchers_count;
	}

	/**
	 * @return int
	 */
	public function getSize()
	{
		return $this->size;
	}

	/**
	 * @return string
	 */
	public function getMasterBranch()
	{
		return $this->master_branch;
	}

	/**
	 * @return int
	 */
	public function getOpenIssues()
	{
		return $this->open_issues;
	}

	/**
	 * @return int
	 */
	public function getOpenIssuesCount()
	{
		return $this->open_issues_count;
	}

	/**
	 * @return string
	 */
	public function getPushedAt()
	{
		return $this->pushed_at;
	}

	/**
	 * @return string
	 */
	public function getCreatedAt()
	{
		return $this->created_at;
	}

	/**
	 * @return string
	 */
	public function getUpdatedAt()
	{
		return $this->updated_at;
	}

}

