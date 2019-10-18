<?php
$posts = $app->getTable('Posts');
$post = $posts->getPost([$_GET['id']]);
$categories = $app->getTable('Categories'); 
?>



<section class="page page__single">
<h2> <?= $post->title ?> </h2>

<span class="badge badge-primary"><?= $post->categorie_name ?></span>


<p> <?= $post->content ?> </p>

<footer class="blockquote-footer"><?= date('Y-m-d',strtotime($post->date)) ?></footer>

</section>