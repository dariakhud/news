<?php

class Database {

    private $link;

    public function __construct() {

        $link = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'news');

        $this->link = $link;

    }
    
    public function queryAll($sql, $class = 'stdClass') {
        
        $result = mysqli_query($this->link, $sql);

        $mas = [];
        if ($result !== false) {
            while (!is_null($row = mysqli_fetch_object($result, $class))) {
                $mas[] = $row;
            }
        }

        return $mas;
    }
    
    public function queryOne($sql, $class = 'stdClass') {
        
        return $this->queryAll($sql, $class)[0];
        
    }
    
    public function Sql_execute($sql) {

        mysqli_query($this->link, $sql);

    }   

    public function insert($sql) {
        
        $this->Sql_execute($sql);
        
    }

}