<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="/templates/style.css">
    <title>Create Form</title>
</head>
<body>
<h3>Заполните форму для добавления нового договора</h3>
<form action="/create" method="POST">
    <label for="agent">ФИО агента</label>
    <?php if (!empty($errors) && isset($errors['agent'])): ?>
        <span style="color:red"><?php echo $errors['agent'] ?></span>
    <?php endif; ?>
    <br>
    <input type="text" name="contracts[agent]">
    <br>

    <label for="complex">Жилой комплекс</label>
    <?php if (!empty($errors) && isset($errors['complex'])): ?>
        <span style="color:red"><?php echo $errors['complex'] ?></span>
    <?php endif; ?>
    <br>
    <input type="text" name="contracts[complex]">
    <br>

    <label for="rewardType">Тип вознаграждения</label>
    <?php if (!empty($errors) && isset($errors['rewardType'])): ?>
        <span style="color:red"><?php echo $errors['rewardType'] ?></span>
    <?php endif; ?>
    <br>
    <select name="contracts[rewardType]">
        <option value=""></option>
        <option value="Фикс">Фикс</option>
        <option value="Процент">Процент</option>

        <option value="Wrong">Wrong Type Test</option>
    </select>
    <br>

    <label for="rewardSize">Размер вознаграждения</label>
    <?php if (!empty($errors) && isset($errors['rewardSize'])): ?>
        <span style="color:red"><?= $errors['rewardSize'] ?></span>
    <?php endif; ?>
    <br>
    <input type="number" name="contracts[rewardSize]">
    <br>

    <label for="validity">Срок действия</label>
    <?php if (!empty($errors) && isset($errors['validity'])): ?>
        <span style="color:red"><?php echo $errors['validity'] ?></span>
    <?php endif; ?>
    <br>
    <input type="datetime-local" name="contracts[validity]"/>
    <br>

    <label for="contractDate">Дата заключения</label>
    <?php if (!empty($errors) && isset($errors['contractDate'])): ?>
        <span style="color:red"><?php echo $errors['contractDate'] ?></span>
    <?php endif; ?>
    <br>
    <input type="datetime-local" name="contracts[contractDate]">
    <br>


    <br>
    <br>
    <input type="submit" value="Добавить договор" required>
</form>
<br>
<br>
<div>
    <a href="/">На главную</a>
</div>
</body>
</html>