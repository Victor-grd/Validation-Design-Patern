<?php

namespace App\Table;
use App\App;

class PostsTable extends Table{

    public function getExtract($content){
        if (strlen($content) > 50) {
            return '<p>'. substr($content , 0, 50) .'... </p>';
        } else {
            return $content;
        }

    }
    public function getNavbarItems(){
        return $this->db->query('SELECT articles.id,date,title,content,categorie_name, navbar FROM articles LEFT JOIN categories ON categorie_id = categories.id WHERE navbar = 1 ORDER BY date DESC');
    }

    public function getLast(){
        return $this->db->query('SELECT articles.id,date,title,content,categorie_name FROM articles LEFT JOIN categories ON categorie_id = categories.id ORDER BY date DESC');
    }

    public function getUrl($id) {
        return 'index.php?page=article&id=' . $id;
    }

    public function getPost($id) {
        return $this->db->prepare('SELECT articles.id,date,title,content,categorie_name FROM articles LEFT JOIN categories ON categorie_id = categories.id WHERE articles.id = ?', $id);
    }

    public function addPost($title, $content, $categorie){
        $date = date('Y-m-d H:i:s');
        return $this->db->prepare('INSERT INTO articles (title, content, date, categorie_id) VALUES (?, ?, ?, ?)', [$title, $content, $date, $categorie], true, false);
    }

    public function deletePost($id){
        return $this->db->prepare('DELETE FROM `articles` WHERE `id` = ?', [$id], true, false);
    }

    public function editPost($title, $content, $date, $categorie, $id, $navbar){
        return $this->db->prepare('UPDATE `articles` SET title = ?, content = ?,date = ?, categorie_id = ?, navbar = ? WHERE `id` = ?', [$title, $content, $date, $categorie, $navbar, $id], true, false);
    }
}