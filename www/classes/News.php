<?php

require_once __DIR__ . '/Database.php';

class News
{
    public $id;
    public $title;
    public $text;
    public $date;

    public static function getAll() {
        $db = new Database();
        $sql = 'SELECT * FROM news ORDER BY date DESC';
        return $db->get_query($sql, 'News');
    }

    public static function insert($data) {

        $db = new Database();
        $sql = "INSERT INTO news (title, date, text) 
            VALUES ('" . $data['title'] . "','" . $data['date'] . "','" . $data['text'] . "')";
        return $db->insert($sql);

    }


}