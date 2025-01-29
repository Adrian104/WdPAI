<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/ForumThread.php';
require_once __DIR__.'/../models/Reply.php';

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
                $forumThread['thread_id'],
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

    public function getForumThread($id): ForumThread
    {
        $stmt = $this->connect()->prepare('
            SELECT * FROM thread WHERE thread_id = :id;
        ');
        $stmt->execute(['id' => $id]);
        $forumThread = $stmt->fetch(PDO::FETCH_ASSOC);
        $result = new ForumThread(
            $forumThread['thread_id'],
            $forumThread['user_id'],
            $forumThread['title'],
            $forumThread['tags'],
            $forumThread['score'],
            $forumThread['views'],
            $forumThread['content'],
            $forumThread['publish_date']
        );

        return $result;
    }

    public function getReplies($id)
    {
        $result = [];

        $stmt = $this->connect()->prepare('
            SELECT * FROM reply WHERE thread_id = :id;
        ');
        $stmt->execute(['id' => $id]);
        $replies = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($replies as $reply) {
            $stmt = $this->connect()->prepare('
                SELECT * FROM user WHERE user_id = :id;
            ');

            $stmt->execute(['id' => $reply['user_id']]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            $result[] = new Reply(
                $reply['reply_id'],
                $reply['user_id'],
                $user['nick'],
                $reply['thread_id'],
                $reply['content']
            );
        }

        return $result;
    }

    public function addReply($threadId, $content)
    {
        $stmt = $this->connect()->prepare('
            INSERT INTO reply (user_id, thread_id, content) VALUES
            (:u, :t, :c)
        ');

        session_start();
        $stmt->execute(['u' => $_SESSION['uid'], 't' => $threadId, 'c' => $content]);
    }
}