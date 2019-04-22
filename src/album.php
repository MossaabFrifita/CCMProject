<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 24/03/2019
 * Time: 22:46
 */

namespace insset;



class Album {
    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }


    public function getAll($id) {
        return $this->conn->query("SELECT * FROM 	cataloguetag WHERE user_id=$id ")->fetchAll();
    }

    public function addAlbum($tag,$nbtag,$userid){
        $valeurs = ['tag'=>$tag, 'nbtag'=>$nbtag, 'userid'=>$userid];
        $requete = 'INSERT INTO cataloguetag(id,tag,nb_tag,user_id) VALUES(null,:tag,:nbtag,:userid)';
        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute($valeurs);
        $id = $this->conn->lastInsertId();
        return $id;
    }
    public function deleteAlbum($id){
        $requete = "DELETE FROM cataloguetag WHERE id=$id";
        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute();
        return true;
    }
    public function getAlbumbyTagAndSize($tag,$size) {
        $valeurs = ['tag'=>$tag, 'nbtag'=>$size];
        $requete = 'SELECT * FROM cataloguetag WHERE tag=:tag AND nb_tag=:nbtag';

        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute($valeurs);
        return $requete_preparee->fetchAll();
    }
}

