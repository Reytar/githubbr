<?php

require_once(__DIR__ . '/../GitHubObject.php');
require_once(__DIR__ . '/GitHubUser.php');
	

class GitHubSimpleRepo extends GitHubObject
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	public function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'id' => 'int',
			'owner' => 'GitHubUser',
			'name' => 'string',
			'full_name' => 'string',
			'description' => 'string',
			'private' => 'boolean',
			'fork' => 'boolean',
			'url' => 'string',
			'html_url' => 'string',
		));
	}
	
	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var GitHubUser
	 */
	public $owner;

	/**
	 * @var string
	 */
	public $name;

	/**
	 * @var string
	 */
	public $full_name;

	/**
	 * @var string
	 */
	public $description;

	/**
	 * @var boolean
	 */
	public $private;

	/**
	 * @var boolean
	 */
	public $fork;

	/**
	 * @var string
	 */
	public $url;

	/**
	 * @var string
	 */
	public $html_url;

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return GitHubUser
	 */
	public function getOwner()
	{
		return $this->owner;
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getFullName()
	{
		return $this->full_name;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @return boolean
	 */
	public function getPrivate()
	{
		return $this->private;
	}

	/**
	 * @return boolean
	 */
	public function getFork()
	{
		return $this->fork;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

	/**
	 * @return string
	 */
	public function getHtmlUrl()
	{
		return $this->html_url;
	}

}

