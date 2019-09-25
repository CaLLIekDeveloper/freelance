<?php
    session_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }
    unset($_SESSION["basket"]);
    
    setcookie("basket[id]", "", time() - 3600);
    setcookie("basket[name]", "", time() - 3600);
    setcookie("basket[price]", "", time() - 3600);
    setcookie("basket[qty]", "", time() - 3600);
    setcookie("basket[imageName]", "", time() - 3600);
    setcookie("basket[type]", "", time() - 3600);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Дякуємо за вашу покупку</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <script src="js/flower.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="thankContainer">
        <?php include "header.php"?>
<div class="thankyouDiv">
<h2 class="center" style="text-align: center;"> Дякуємо за ваше замовлення !!!</h2>
            <img class="center" class='center-img' style="display: block; margin: 0 auto; " width=500px height="50%" src="css/images/nice.jpg">
                
                <h2 class="center"style="text-align: center;"> Ми дамо відповідь на вашу заявку у найближчий час  !!!</h2>
            
</div>
<?php include "footer.php"?>
        </div>
    </body>
</html>

