<?php
    $categories = $app->getTable('Categories');
    $id = $_GET['id'];
    $post = $posts->getPost([$id]);
?>
<section class="page page__editPost">
    <form class="form_update" action="index.php?page=editPostAction" method="post">
        <div class="card card_update text-white bg-secondary mb-3" style="max-width: 20rem;">
            <div class="card-body">
                <input class="input_update" type="hidden" name="id" value="<?= $post->id ?>">
                <div class="flex-row">
                    <h4 class="card-title card-title-update">
                        <input class="input_update" type="text" name="title" id="" value="<?= $post->title ?>">
                    </h4>

                    <select class="form-control input_update" name="categorie">
                        <?php foreach ($categories->all() as $key => $categorie) : ?>
                            <option value="<?= $categorie->id ?>"><?= $categorie->categorie_name ?></option>
                        <?php endforeach ?>
                    </select>
                    
                    <select class="form-control input_update" name="navbar">
                        <option value="0">not in navbar</option>
                        <option value="1">In navbar</option>
                    </select>
                </div>
                <textarea class="form-control input_update" name="content"><?= $post->content ?></textarea>
                <div class="flex-row">
                    <input class="input_update" type="date" name="date" id="" value="<?=  date('Y-m-d',strtotime($post->date)) ?>">
                    <input type="submit" class="btn btn-primary action" value="Edit">
                </div>
            </div>
        </div>
    </form>
</section>

