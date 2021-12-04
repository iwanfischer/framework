<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="temlates/style.css">
    <title>Create Form</title>
</head>
<body>
<h3>Заполните форму для добавления нового договора</h3>
<form action="/create" method="POST">
    <label for="name">Имя агента</label>
    <br>
    <input type="text" name="contracts[agent]" required>
    <br>

    <label for="complex">Жилой комплекс</label>
    <br>
    <input type="text" name="contracts[complex]" required>
    <br>

    <label for="rewardType">Тип вознаграждения</label>
    <br>
    <select name="contracts[rewardType]">
        <option value="Фикс">Фикс</option>
        <option value="Процент">Процент</option>
    </select>
    <br>

    <label for="rewardSize">Размер вознаграждения</label>
    <br>
    <input type="number" name="contracts[rewardSize]" required>
    <br>

    <label for="validity">Срок действия</label>
    <br>
    <input type="datetime-local" name="contracts[validity]"/>
    <br>

    <label for="contractDate">Дата заключения</label>
    <br>
    <input type="datetime-local" name="contracts[contractDate]" required>
    <br>


    <br>
    <br>
    <input type="submit" value="Добавить договор" required>
</form>

<a href="/">На главную</a>
</body>
</html>