<?php
session_start();
if (!isset($_SESSION["basket"])) {
    $basket = array();
    $_SESSION["basket"] = $basket;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Про нас</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="css/home.css" rel="stylesheet" type="text/css"/>
</head>

<body style="height: 100%;>
    <div id=" container
" style="height: 100%;">
<?php include "header.php" ?>
<div id="contacts" style="height: 100%;">
    <h1>Про нас</h1>
    <p style="text-align: left; font-size: 14px;">
        Наш інтернет магазин допоможе підібрати для Ваших найдорожчих діточок ліжечка у вигляді автомобілів,
        ліжечка з тематичними малюнками та двоповерхові, щоб Ваші сонечка відпочиваючи бачили солодкі та кольорові сни.
        Асортимент продукції передбачений як для хлопчиків, так і для дівчаток.
        <br><br>
        У нашому каталозі Ви можете знайти моделі для маленьких гонщиків, поліцейських, таксистів, маквінів, принцес, та
        багато інших цікавинок.
        Модельний ряд весь час розширюється та оновлюється.
        Також Ви можете придбати різні комплектуючі дитячої кімнатки це і шафи з тематичними малюнками, полиці, комоди,
        столи.
        <br>Ми будемо раді працювати для Вас та Ваших діток!!!
    </p>
</div>

<?php include "footer.php" ?>
</div>
</body>

</html>