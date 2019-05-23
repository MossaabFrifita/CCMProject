<?php

use PHPUnit\Framework\TestCase;

class albumLocationTest extends TestCase {

	public function testGetAndAddAlbum(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";
        require "./src/albumLocation.php";
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $albumLocation = new \insset\AlbumLocation($pdo);

        $id =  $albumLocation->addAlbum("1245255*365542",10,1);

        $this->assertNotNull($albumLocation->getAll($id));

		
	}
    public function testDeleteAlbum(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";

        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $albumLocation = new \insset\AlbumLocation($pdo);
        $id =  $albumLocation->addAlbum("1245255*365542",10,1);


        $this->assertNotNull($albumLocation->deleteAlbum($id));


    }

    public function testGetAlbumByLocationAndSize(){



        $dsn = "mysql:host=localhost;dbname=instagram_poster_db;charset=utf8";

        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $pdo = new \PDO($dsn, "root", "", $opt);


        $albumLocation = new \insset\AlbumLocation($pdo);

        $id =  $albumLocation->addAlbum("1245255*365542",10,1);

        $this->assertNotNull($albumLocation->getAlbumbyLocationAndSize("1245255*365542",10,1));


    }



}