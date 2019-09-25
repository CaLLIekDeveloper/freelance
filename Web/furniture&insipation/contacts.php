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
    <title>Контакти</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="css/home.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
        function checkout() {
            alert("Please log in to checkout");
            return false;
        }
    </script>
</head>

<body "height: 100%;>
    <div id="container">
        <?php include "header.php" ?>
        <div id="contacts">
            <h2>Контакти</h2>
            <div class="elementor-text-editor elementor-clearfix">
                <p style="text-align: left;">
                <span style="text-decoration: underline;">Контактні телефони:</span></p>
                <p></p>
                <h4 style="text-align: left; padding-left: 0px;">
                <strong>
                    <img class="alignleft size-full wp-image-55160" style="border: 0px none; margin: 0px 10px 0 2px;" title="vodafone" src="css/images/vodafone.png" alt="" width="64" height="64">
                    <br>
                    <a href="tel:+380994384365">+38 (XXX) XXX-XX-XX</a></strong></h4>
                <p></p>
                <br>
                <p style="text-align: left; padding-left: 15px;">
                <img class="alignleft size-full wp-image-328" style="border: 0px none; margin: 0px 10px;" title="e-mail" src="css/images/e-mail.png" alt="" width="20" height="20">E-mail: <strong>XXXXXXXX@gmail.com</strong></p>
                <p style="text-align: left; padding-left: 15px;">
                <img class="alignleft size-full wp-image-326" style="border: 0px none; margin: 0px 10px;" title="skype" src="css/images/skype.png" alt="" width="20" height="20">Skype:<strong> kidsfurniture</strong></p>
                <p style="text-align: left; padding-left: 15px;">
                <strong></strong></p>
                <div id="more-13"></div>
                <p></p>
                <p style="text-align: left;"><span style="text-decoration: underline;">Графік роботи</span>:</p>
                <p style="padding-left: 20px; text-indent: 0px;">
                <strong>Пн–Пт: 9:00 – 18:00</strong><br>
                <strong> Сб: &nbsp;&nbsp;&nbsp;&nbsp; 9:00 – 17:00</strong><br>
                <strong> Нд: &nbsp;&nbsp;&nbsp;&nbsp; 9:00 – 15:00</strong></p>
            </div>
        </div>

        <?php include "footer.php" ?>
    </div>
</body>

</html>