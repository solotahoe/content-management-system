<?php
 class Article{
    public function fetch_all(){
        global $pdo;

       $querry=  $pdo ->prepare("SELECT * FROM articles");
       $querry -> execute();

       return $querry->fetchAll();
    }

    public function  fetch_data($article_id){
        global $pdo;

        $querry =$pdo->prepare('SELECT * FROM articles WHERE articla_id=?');
        $querry->bindValue(1,$article_id);
        $querry->execute();


        return $querry->fetch();
    }

 }




?>