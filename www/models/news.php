<?php

require __DIR__ . '\..\functions\sql.php';

function News_getAll() {

    $sql = 'SELECT name, date, text FROM news ORDER BY date DESC';
    $link = Sql_connect();
    return Sql_query($link, $sql);

}

function News_insert($data) {

    $sql = "INSERT INTO news (name, date, text) 
            VALUES ('" . $data['name'] . "','" . $data['date'] . "','" . $data['text'] . "')";
    $link = Sql_connect();
    Sql_exec($link, $sql);

}