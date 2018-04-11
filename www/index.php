<?php

require __DIR__ . '\models\news.php';
$NewsList = News_getAll();
include __DIR__ . '\views\index.php';