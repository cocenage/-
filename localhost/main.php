<?php session_start();        
$username = isset($_SESSION["name"])? $_SESSION["name"] : (isset($_SESSION["username"])? $_SESSION["username"] : null);

if ($username) {
    echo "Привет, $username! Добро пожаловать на наш сайт.";
} else {
    echo "Пожалуйста, войдите в систему.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/style.css">
    <title>Главная</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="display: flex">
  <h1 style='padding: 100px'>главная страница</h1>


      

    <div class="container">

    <a href="http://localhost/search.php" class="button button--piyo">
        <div class="button__wrapper">
            <span class="button__text">продукты</span>
        </div>
        <div class="characterBox">
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character">
                <div class="character__face"></div>
            </div>
        </div>
    </a>

    <a href="orderproducts.php" class="button button--hoo">
        <div class="button__wrapper">
            <span class="button__text">история покупок</span>
        </div>
        <div class="characterBox">
            <div class="character wakeup">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
                <div class="charactor__body"></div>
            </div>
            <div class="character wakeup">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
                <div class="charactor__body"></div>
            </div>
            <div class="character">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
                <div class="charactor__body"></div>
            </div>
        </div>
    </a>

    <a href="http://localhost/categoryproducts.php" class="button button--pen">
        <div class="button__wrapper">
            <span class="button__text">категории продуктов</span>
        </div>
        <div class="characterBox">
            <div class="character wakeup">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
            </div>
            <div class="character wakeup">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
            </div>
            <div class="character">
                <div class="character__face"></div>
                <div class="charactor__face2"></div>
            </div>
        </div>
    </a>

    <a href="http://localhost/basket.php" class="button button--piyo">
        <div class="button__wrapper">
            <span class="button__text">корзина</span>
        </div>
        <div class="characterBox">
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character wakeup">
                <div class="character__face"></div>
            </div>
            <div class="character">
                <div class="character__face"></div>
            </div>
        </div>
    </a>
    </div>
</div>


<form action="logout.php" method="post" class="login" style="display:flex; flex-direction: column;">
            <button style=' 
               '>
                Выйти
            </button>
        </form>

</body>
</html>
