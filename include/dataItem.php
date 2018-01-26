<?php

class dataItem
{

    private $title;
    private $body;
    private $urlImg;
    private $category;


    public function setInfo($title, $body, $url, $cat)
    {
        $this->title = $title;
        $this->body = $body;
        $this->urlImg = $url;
        $this->category = $cat;
        $this->setData();
    }

    private function setData()
    {
        try {
            require_once 'dbConnection.php';
            $dbObj = new database();

            $dbcon = $dbObj->dbConLink();

            $query = "INSERT INTO `posts`(`body`, `title`, `img`, `cat_id`) VALUES ('" . $this->body . "','" . $this->title . "','" . $this->urlImg . "','" . $this->category . "')";
            $dbcon->query($query);
            $dbcon->close();

        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getData($tableName)
    {

        try {
            require_once 'dbConnection.php';
            $dbObj = new database();

            $dbcon = $dbObj->dbConLink();

            $query = "SELECT * FROM `" . $tableName . "`";
            $res = $dbcon->query($query);
            $rows = [];
            while($row = $res->fetch_array(MYSQLI_ASSOC)){
                array_push($rows,$row);
            }
            $dbcon->close();

            return $rows;

        } catch (Exception $e) {
            echo $e->getMessage();
        }

    }

}

