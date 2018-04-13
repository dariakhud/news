<?php

require_once __DIR__ . '/../functions/sql.php';

class Database {

    private $link;

    public function __construct() {

        $link = mysqli_connect('localhost', 'root', '');
        mysqli_select_db($link, 'news');

        $this->link = $link;

    }

    public function get_query($sql, $class) {
        $link = Sql_connect();
        return Sql_query($link, $sql, $class);
    }

    public function insert($sql) {
        $link = Sql_connect();
        Sql_execute($link, $sql);
    }

}