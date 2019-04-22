<?php

use PHPUnit\Framework\TestCase;

class albumTest extends TestCase {

	public function testGetAndAddAlbum(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";
        require "./src/album.php";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $album = new \insset\Album($pdo);

        $id =  $album->addAlbum("tag",10,1);

        $this->assertNotNull($album->getAll($id));

		
	}
    public function testDeleteAlbum(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";

        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $album = new \insset\Album($pdo);
        $id =  $album->addAlbum("tag",10,1);


        $this->assertNotNull($album->deleteAlbum($id));


    }

    public function testGetAlbumByTagAndSize(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";

        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $album = new \insset\Album($pdo);

        $id =  $album->addAlbum("tag",10,1);

        $this->assertNotNull($album->getAlbumbyTagAndSize("tag",10,1));


    }



}