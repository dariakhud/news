<?php

require __DIR__ . '/models/news.php';

if (!empty($_POST)) {

    $data = [];

    if (!empty($_POST['name'])) {
        $data['name'] = $_POST['name'];
    }

    if (!empty($_POST['date'])) {
        $data['date'] = $_POST['date'];
    }
    if (!empty($_POST['text'])) {
        $data['text'] = $_POST['text'];
    }

    if (isset($data['name']) && isset($data['date']) && isset($data['text'])) {
        News_insert($data);
        header('Location: /index.php');
    }

}