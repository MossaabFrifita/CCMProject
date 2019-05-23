<?php
/**
 * Created by PhpStorm.
 * User: Mossa
 * Date: 24/03/2019
 * Time: 22:46
 */

namespace insset;



class AlbumLocation {
    /* Properties */
    private $conn;

    /* Get database access */
    public function __construct(\PDO $pdo) {
        $this->conn = $pdo;
    }


    public function getAll($id) {
        return $this->conn->query("SELECT * FROM 	cataloguelocation WHERE user_id=$id ")->fetchAll();
    }

    public function addAlbum($location,$photoNumber,$userid){
        $valeurs = ['location'=>$location, 'photoNumber'=>$photoNumber, 'userid'=>$userid];
        $requete = 'INSERT INTO cataloguelocation(id,locationAdresse,photoNumber,user_id) VALUES(null,:location,:photoNumber,:userid)';
        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute($valeurs);
        $id = $this->conn->lastInsertId();
        return $id;
    }
    public function deleteAlbum($id){
        $requete = "DELETE FROM cataloguelocation WHERE id=$id";
        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute();
        return true;
    }
    public function getAlbumbyLocationAndSize($location,$size,$id) {
        $valeurs = ['location'=>$location, 'photoNumber'=>$size, 'id'=>$id];
        $requete = 'SELECT * FROM cataloguelocation WHERE locationAdresse=:location AND photoNumber=:photoNumber AND user_id=:id';

        $requete_preparee = $this->conn->prepare($requete);
        $requete_preparee->execute($valeurs);
        return $requete_preparee->fetchAll();
    }
}

