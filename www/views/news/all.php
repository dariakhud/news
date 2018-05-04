<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>News</title>
</head>
<body>

<ul>
    <?php
    foreach ($this->data['NewsList'] as $news) {
        ?>
        <li><a href="detailed_news.php?news=<?php echo $news->text; ?>" target="_blank">
                <?php echo $news->title . ' (' . $news->date . ')'; ?>
            </a></li>
        <?php
    }
    ?>
</ul>

<form action="/controllers/action.php" method="post" enctype="multipart/form-data">
    <label for="title">Название новости</label>
    <input type="text" id="title" name="title">

    <label for="date">дата</label>
    <input type="date" id="date" name="date">

    <p>
    <label for="text">Описание новости</label>
    <textarea id="text" name="text"></textarea>
    </p>

    <input type="submit" value="Добавить новость">
</form>

</body>
</html>

