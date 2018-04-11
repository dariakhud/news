<?php

require __DIR__ . '\..\functions\sql.php';

function News_getAll() {

    $sql = 'SELECT name, date FROM news ORDER BY date DESC';
    $link = Sql_connect();
    return Sql_query($link, $sql);

}