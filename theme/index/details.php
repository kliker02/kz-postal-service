<?php
/**
 * @var array $params
 */
$row = $params['row'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <title>КЗ-Трекинг</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Главная</span></a>
            </li>
    </div>
</nav>
<div class="container mt-5">

    <?php if ($row && !isset($row['error'])) { ?>
        <h3>Трекинг <?=$row['trackid']?></h3>
        <h5>Общая информация</h5>
        <p>Направление: <?=$row['direction']?></p>
        <?php if (strlen($row['storage_period'])) { ?>
            <p>Срок хранения: <?=$row['storage_period']?></p>
        <?php } ?>
        <p>Вид отправления: <?=$row['package_type']?></p>
        <p>Категория посылки: <?=$row['category']?></p>
        <p>Способ пересылки: <?=$row['delivery_method']?></p>
        <?php if (strlen($row['dispute'])) { ?>
            <p>Диспут: <?=$row['dispute']?></p>
        <?php } ?>
        <p>Приблизительное значение веса: <?=$row['weight']?></p>

        <?php if (isset($row['status_code']) && $row['status_code']) { ?>
            <p>Статус: <?=$row['status']?></p>
        <?php } ?>
        <h5>Отправитель</h5>
        <p>
            Страна: [<?= $row['sender']['country'] ?>]<br>
            Имя: <?= $row['sender']['name'] ?><br>
            Адрес: <?= $row['sender']['address'] ?><br>
            <?= $row['sender']['x_postindex']? 'Индекс: '.$row['sender']['x_postindex'] : '' ?></p>
        <h5>Отделение приёма</h5>
        <p>
            Дата: <?= $row['origin']['date'] ?><br>
            Департамент: <?= $row['origin']['dep_name'] ?><?=$row['origin']['x_dep_id'] ? '['.$row['origin']['x_dep_id'].']' : ''?><br>
            <?= $row['origin']['city'] ? 'Город: '.$row['origin']['city']. '<br>' : '' ?>
            <?=$row['origin']['postindex'] ?'Индекс: '.$row['origin']['postindex']: ''?></p>
        <h5>Получатель</h5>
        <p>
            Страна: [<?= $row['receiver']['country'] ?>]<br>
            Имя: <?= $row['receiver']['name'] ?><br>
            <?=$row['receiver']['address'] ? 'Адрес: '.$row['receiver']['address'] . '<br>': ''?><br>
            <?=$row['receiver']['x_postindex'] ? 'Индекс: '.$row['receiver']['x_postindex'] : ''?></p>
        <h5>Данные последнего пункта регистрации посылки</h5>
        <p>
            Дата: <?= $row['last']['date'] ?><br>
            Департамент: <?= $row['last']['dep_name'] ?><?= $row['last']['x_dep_id'] ? '['.$row['last']['x_dep_id'] .']<br>' : '' ?><br>
            <?=$row['last']['address'] ? 'Адрес: '.$row['last']['address'] .'<br>': ''?>
            <?=$row['last']['postindex'] ? 'Индекс: '.$row['last']['postindex'] : ''?></p>
        <h5>Данные по доставке</h5>
        <p>
            <?= strlen($row['delivery']['date']) ? 'Дата: '. $row['delivery']['date'] . ' '. $row['delivery']['time'] .'<br>': '' ?>
            Департамент: <?= $row['delivery']['dep_name'] ?><br>
            <?= $row['delivery']['address'] ? 'Адрес: '.$row['delivery']['address'] .'<br>' : '' ?>
            <?= $row['delivery']['x_period'] ? 'Cрок доставки: '.$row['delivery']['x_period'] .'<br>' : '' ?>
            Телефон: <?=$row['delivery']['phone']?><br>
            <?=$row['delivery']['postindex'] ? 'Индекс: '.$row['delivery']['postindex'] : ''?></p>
    <?php } else { ?>
        <h1 class="text-center">Трекномер в системе не найден. Проверьте корректность и попробуйте позже</h1>
    <?php } ?>
</div>

</body>
</html>