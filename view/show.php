<?php
$post = $result["data"]["post"];
?>

<a href="/home">Retour à la liste</a>

<article class="post">
    <h1><?= $post->getTitle() ?></h1>
    <p><?= $post->getBody() ?></p>
</article>

<section id="post-comments">
<?php 
    foreach($post->getComments() as $comment){
        ?>
        <div class="comment">
            <div class="comment-author">
                <p><?= $comment->email ?></p>
            </div>
            <blockquote class="comment-content">
                <h4><?= $comment->name ?></h4>
                <p><?= $comment->body ?></p>
            </blockquote>
        </div>
        <?php
    }  
?>
</section>
   