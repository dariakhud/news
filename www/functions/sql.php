<?php

function Sql_connect() {

    $link = mysqli_connect('localhost', 'root', '');
    mysqli_select_db($link, 'news');

    return $link;
}

function Sql_query($link, $sql) {

    $result = mysqli_query($link, $sql);

    $mas = [];
    if ($result !== false) {
        while (!is_null($row = mysqli_fetch_array($result))) {
            $mas[] = $row;
        }
    }

    return $mas;

}

function Sql_exec($link, $sql) {

    mysqli_query($link, $sql);

}