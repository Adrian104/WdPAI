<?php

class Reply
{
	private $replyId;
	private $userId;
	private $user;
	private $threadId;
	private $content;

	public function __construct($replyId, $userId, $user, $threadId, $content)
	{
		$this->replyId = $replyId;
		$this->userId = $userId;
		$this->user = $user;
		$this->threadId = $threadId;
		$this->content = $content;
	}

	public function getReplyId()
	{
		return $this->replyId;
	}

	public function getUserId()
	{
		return $this->userId;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function getThreadId()
	{
		return $this->threadId;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function setReplyId($replyId)
	{
		$this->$replyId = $replyId;
	}

	public function setUserId($userId)
	{
		$this->$userId = $userId;
	}

	public function setUser($user)
	{
		$this->$user = $user;
	}

	public function setThreadId($threadId)
	{
		$this->$threadId = $threadId;
	}

	public function setContent($content)
	{
		$this->$content = $content;
	}
};