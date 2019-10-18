<?php $posts = $app->getTable('Posts'); //var_dump($posts->all())?>
<?php $categories = $app->getTable('Categories'); //var_dump($posts->all())?>
<section class="page page__home color-change-4x">
    <section class="section section__articles">
        <form class="form form__articles" action="index.php?page=addPostAction" method="post">
            <input type="text" class="form-control" placeholder="title" name="title">
            <textarea class="form-control" name="content" placeholder="Lorem ipsum dolor sit amet ..."> Novo denique perniciosoque exemplo idem Gallus ausus est inire flagitium grave, quod Romae cum ultimo dedecore temptasse aliquando dicitur Gallienus, et adhibitis paucis clam ferro succinctis vesperi per tabernas palabatur et conpita quaeritando Graeco sermone, cuius erat inpendio gnarus, quid de Caesare quisque sentiret. et haec confidenter agebat in urbe ubi pernoctantium luminum claritudo dierum solet imitari fulgorem. postremo agnitus saepe iamque, si prodisset, conspicuum se fore contemplans, non nisi luce palam egrediens ad agenda quae putabat seria cernebatur. et haec quidem medullitus multis gementibus agebantur. </textarea>
            <select class="form-control" name="categorie">

            <?php foreach ($categories->all() as $key => $categorie) : ?>
                <option value="<?= $categorie->id ?>"><?= $categorie->categorie_name ?></option>
            <?php endforeach ?>

            </select>
            <input type="submit" class="btn btn-primary" value="OK">
        </form>
        <div class="posts">
            <?php foreach ($posts->getLast() as $key => $post) : ?>
                <div class="card text-white bg-secondary mb-3 post" style="max-width: 20rem;">
                    <div class="card-body">
                        <div class="card-title">
                            <h4><a href="<?= $posts->getUrl($post->id) ?>"> <?= $post->title ?> </a></h4>
                            <span class="badge badge-primary"><?= $post->categorie_name ?></span>
                        </div>
                        <p class="card-text"><?= $posts->getExtract($post->content) ?></p>
                        <footer class="blockquote-footer"><?= date('Y-m-d',strtotime($post->date)) ?></footer>

                        <p><a href="<?= $posts->getUrl($post->id) ?>">Voir la suite</a></p>

                        <div class="actions">
                            <form action="index.php?page=deletePostAction" method="post">
                                <input type="hidden" name="id" value="<?= $post->id ?>">
                                <input type="submit" class="btn btn-primary action" value="Delete">
                            </form>
    
                            <form action="index.php?page=editPost&id=<?= $post->id ?>" method="post">
                                <input type="submit" class="btn btn-primary action" value="edit">
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </section>
    <section class="section section__categories">
        <form class="form form__categories" action="index.php?page=addCatAction" method="post">
            <input type="text" class="form-control" name="categorie_name" placeholder="Categories name">
            <input type="submit" class="btn btn-primary" value="OK">
        </form>
        <div class="categories">

            <?php foreach ($categories->all() as $key => $categorie) : ?>
                <div class="alert alert-dismissible alert-secondary">
                    <form action="index.php?page=deleteCatAction" method="post">
                        <input type="hidden" name="id" value="<?= $categorie->id ?>">
                        <button type="submit" class="close">&times;</button>
                    </form>
                    <?= $categorie->categorie_name ?>
                </div>
            <?php endforeach ?>
        </div>

    </section>
</section>