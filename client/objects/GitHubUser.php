<?php

require_once(__DIR__ . '/../GitHubObject.php');

	

class GitHubUser extends GitHubObject
{
	/* (non-PHPdoc)
	 * @see GitHubObject::getAttributes()
	 */
	protected function getAttributes()
	{
		return array_merge(parent::getAttributes(), array(
			'login' => 'string',
			'id' => 'int',
			'avatar_url' => 'string',
			'gravatar_id' => 'string',
			'url' => 'string',
		));
	}
	
	/**
	 * @var string
	 */
	public $login;

	/**
	 * @var int
	 */
	public $id;

	/**
	 * @var string
	 */
	public $avatar_url;

	/**
	 * @var string
	 */
	public $gravatar_id;

	/**
	 * @var string
	 */
	public $url;

	/**
	 * @return string
	 */
	public function getLogin()
	{
		return $this->login;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getAvatarUrl()
	{
		return $this->avatar_url;
	}

	/**
	 * @return string
	 */
	public function getGravatarId()
	{
		return $this->gravatar_id;
	}

	/**
	 * @return string
	 */
	public function getUrl()
	{
		return $this->url;
	}

}

