<?php
$posts = $result["data"]["posts"];
$current = $result["data"]["currentPage"];
$total = $result["data"]["totalPages"];
?>
<h1>Liste des articles</h1>
<p id="pagination">
    <?php
        for($i = 1; $i <= $total; $i++){
            ?>
            <a href="/home/<?= $i ?>">
                <?= $i == $current ? "<strong>".$i."</strong>" : $i ?>
            </a>
            <?php
        }
    ?>
</p>
<section id="posts-list">
    
<?php
foreach($posts as $post){
    ?>
    <article class="post">
        <div class="post-content">
            <h1>
                <?= $post->getTitle() ?>
            </h1>
            <p><?= $post->getBodyExcerpt() ?></p>
        </div>
        
        <p class="post-showmore">
            <a href="/show/<?= $post->getId() ?>">Voir l'article</a>
        </p>
    </article>
    <?php
}
?>
</section>