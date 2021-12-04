<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="templates/style.css">
    <title>Contracts</title>
</head>
<body>
<h1>Контракты</h1>
<a href="/create/form">Добавить новый договор</a>
<br>
<br>

<table>
    <tr>
        <th>Номер Агента</th>
        <th>Имя</th>
        <th>Жилой комплекс</th>
        <th>Тип вознаграждения</th>
        <th>Размер вознаграждения</th>
        <th>Срок действия</th>
        <th>Дата заключения</th>
    </tr>

    <?php foreach ($contracts as $contract) : ?>
        <tr>
            <th><?php echo $contract['id'] ?></th>
            <td><?php echo $contract['agent'] ?></td>
            <td><?php echo $contract['complex'] ?></td>
            <td><?php echo $contract['rewardType'] ?></td>
            <td><?php echo $contract['rewardSize'] ?></td>
            <td><?php echo $contract['validity'] ?></td>
            <td><?php echo $contract['contractDate'] ?></td>
        </tr>
    <?php endforeach; ?>
</table>
<br>
<br>
<a href="/">На главную</a>
</body>
</html>