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
    <form action="/details" method="GET">
        <h2>Поиск</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">Трек-номер</label>
            <input name="track" type="text" class="form-control" placeholder="RV018216435KZ">
        </div>
        <button type="submit" class="btn btn-primary">Искать</button>
    </form>
</div>

</body>
</html>