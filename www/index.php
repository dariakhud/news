<?php

require __DIR__ . '/models/news.php';
$NewsList = News::getAll();
include __DIR__ . '/views/index.php';