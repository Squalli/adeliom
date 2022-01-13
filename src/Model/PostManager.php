<?php
namespace App\Model;

use App\Service\HttpClient;

abstract class PostManager 
{
    public static function getPosts(): array
    {
        $posts = [];
        $data = HttpClient::get("posts/");
        foreach($data as $postData){
            $posts[] = new Post($postData);
        }
        return $posts;
    }

    public static function getOnePost(int $id): Post
    {
        $data = HttpClient::get("posts/".$id);
       
        $post = new Post($data);
        $comments = HttpClient::get("posts/".$id."/comments");
        $post->setComments($comments);
        return $post;
    }
}