<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php include (resource_path() . "/views/menu.php"); ?>
<h2>Категории новостей</h2>
<?php foreach ($categories as $item): ?>
    <a href="<?= route('Category.one', $item['link'])?>"><?= $item['title']?></a><br><br>
<?php endforeach; ?>
</body>
</html>
