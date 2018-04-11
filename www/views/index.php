<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>News</title>
</head>
<body>

<ul>
    <?php
    foreach ($NewsList as $news) {
        ?>
        <li><a href="detailed_news.php?name=<?php echo $news['name']; ?>" target="_blank">
                <?php echo $news['name'] . ' (' . $news['date'] . ')'; ?>
            </a></li>
        <?php
    }
    ?>
</ul>

</body>
</html>

