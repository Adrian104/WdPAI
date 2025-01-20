<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ForumThread.php';
class ForumThreadRepository extends Repository
{
    public function getForumThreads(): array
    {
        $result = [];

        $stmt = $this->connect()->prepare('
            SELECT * FROM thread;
        ');
        $stmt->execute();
        $forumThreads = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($forumThreads as $forumThread) {
            $result[] = new ForumThread(
                $forumThread['user_id'],
                $forumThread['title'],
                $forumThread['tags'],
                $forumThread['score'],
                $forumThread['views'],
                $forumThread['content'],
                $forumThread['publish_date']
            );
        }

        return $result;
    }
}