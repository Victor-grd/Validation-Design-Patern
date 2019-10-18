<?php 
require '../app/Autoloader.php';
App\Autoloader::register();
// //  Initialisation des objets
$db = new App\Database('blog');
$app = App\App::getInstance();
$posts = $app->getTable('Posts');
$categories = $app->getTable('Categories');
$config = App\Config::getInstance();

if(isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 'home';
}

ob_start();



if($p === 'home') {
    require '../pages/home.php';
} elseif ($p === 'article') {
    require '../pages/single.php';    
} elseif ($p === 'addPostAction') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categorie = $_POST['categorie'];
    $posts->addPost($title, $content, $categorie);
} elseif ($p === 'deletePostAction') {
    $id = $_POST['id'];
    $posts->deletePost($id);
} elseif ($p === 'editPost') {
    require '../pages/editPost.php';    
} elseif ($p === 'editPostAction') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = $_POST['date'];
    $categorie = $_POST['categorie'];
    $navbar = $_POST['navbar'];
    $posts->editPost($title, $content, $date, $categorie, $id, $navbar);
} elseif ($p === 'addCatAction') {
    $categorie_name = $_POST['categorie_name'];
    $categories->addCat($categorie_name);
} elseif ($p === 'deleteCatAction') {
    $id = $_POST['id'];
    $categories->deleteCat($id);
}

$content = ob_get_clean();

require '../pages/templates/default.php';
