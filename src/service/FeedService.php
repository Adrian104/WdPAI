<?php

require_once __DIR__.'/../repository/ForumThreadRepository.php';
class FeedService
{
    public function fetchForumThreads(): array
    {
        $ForumThreadRepository = new ForumThreadRepository();
        $ForumThreads = $ForumThreadRepository->getForumThreads();

        return $ForumThreads;
    }
}