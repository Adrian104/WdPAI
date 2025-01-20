<?php

class ForumThread
{
    private $user_id;
    private $title;
    private $tags;
    private $score;
    private $views;
    private $content;
    private $publish_date;
    public function __construct($user_id, $title, $tags, $score, $views, $content, $publish_date)
    {
        $this->user_id = $user_id;
        $this->title = $title;
        $this->tags = $tags;
        $this->score = $score;
        $this->views = $views;
        $this->content = $content;
        $this->publish_date = $publish_date;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title): void
    {
        $this->title = $title;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    public function getScore()
    {
        return $this->score;
    }

    public function setScore($score): void
    {
        $this->score = $score;
    }

    public function getViews()
    {
        return $this->views;
    }

    public function setViews($views): void
    {
        $this->views = $views;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }

    public function getPublishDate()
    {
        return $this->publish_date;
    }

    public function setPublishDate($publish_date): void
    {
        $this->publish_date = $publish_date;
    }


}