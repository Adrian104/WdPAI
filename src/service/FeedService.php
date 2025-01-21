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

    public function fetchForumThread($id)
    {
        $ForumThreadRepository = new ForumThreadRepository();
        $ForumThread = $ForumThreadRepository->getForumThread($id);

        return $ForumThread;
    }
}