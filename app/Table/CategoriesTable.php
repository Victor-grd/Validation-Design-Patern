<?php

namespace App\Table;

class CategoriesTable extends Table{

    public function all(){
        return $this->db->query('SELECT * FROM categories');
    }

    public function getCat($id) {
        return $this->db->prepare('SELECT * FROM categories WHERE id = ?', $id);
    }

    public function addCat($categorie_name){
        return $this->db->prepare('INSERT INTO categories (categorie_name) VALUES (?)', [$categorie_name], true, false);
    }

    public function deleteCat($id){
        return $this->db->prepare('DELETE FROM `categories` WHERE `id` = ?', [$id], true, false);
    }

    // public function update(){
    //     return $this->db->prepare('', [], true, false);
    // }
}