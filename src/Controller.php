<?php
namespace App;

use App\Model\PostManager;

class Controller
{
    private function render(string $view, array $data){
        return [
            "view" => $view,
            "data" => $data
        ];
    }

    public function home($page)
    {
        $posts = PostManager::getPosts();

        $page = $page ?? 1;
        $total = count( $posts );  
        $limit = 9;    
        $totalPages = ceil( $total/ $limit ); 
        $page = max($page, 1); 
        $page = min($page, $totalPages); 
        $offset = ($page - 1) * $limit;
        if( $offset < 0 ) $offset = 0;

        $posts = array_slice( $posts, $offset, $limit );

        return $this->render("view/home.php", [
            "posts"       => $posts,
            "currentPage" => $page,
            "totalPages"  => $totalPages
        ]);
    }

    public function show($postId)
    {
        $post = PostManager::getOnePost($postId);

        return $this->render("view/show.php", [
            "post" => $post
        ]);
    }
}