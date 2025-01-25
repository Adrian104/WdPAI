<?php

require_once __DIR__.'/../repository/ForumThreadRepository.php';
require_once __DIR__.'/../repository/UserRepository.php';

class FeedService
{
    public function getTitle()
    {
        if (isset($_GET['type']))
        {
            if ($_GET['type'] === 'new')
                $title = "Najnowsze dyskusje";
            else if ($_GET['type'] === 'popular')
                $title = "Najbardziej popularne";
            else if ($_GET['type'] === 'liked')
                $title = "Najbardziej lubiane";
            else if ($_GET['type'] === 'top')
                $title = "Najpopularniejsze";
        }
        else
            $title = "Najnowsze dyskusje";

        return $title;
    }

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

    public function fetchUser($id)
    {
        $userRepo = new UserRepository();
        $user = $userRepo->getUserById($id);

        return $user;
    }

    public function fetchReplies($id)
    {
        $repo = new ForumThreadRepository();
        $replies = $repo->getReplies($id);

        return $replies;
    }
}