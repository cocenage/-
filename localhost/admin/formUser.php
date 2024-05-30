<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить юзера</title>
</head>
<body>
    <form action="createUser.php" method="POST">
        <p>название юзера:
        <input type="text" name="UserName" /></p>
        <p>эмаил:
        <input type="email" name="Email" /></p>
        
        <input type="submit" value="Добавить">
    </form>
</body>
</html>