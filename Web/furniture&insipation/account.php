<?php
    session_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }
    if (isset($_SESSION["customer"])) {
        $custName = $_SESSION["customer"]["name"];
    }
    else {
        echo '<script>location.replace("index.php");</script>'; exit;
    }

    $gender = $_SESSION["customer"]["gender"];
?>
            <?php
                include_once ("php/connect.php");
                include_once "php/phpValidation.php";
                $errorMessage = "";
                
                if ((isset($_POST["btnLogout"])))
                {
                    unset($_SESSION["customer"]);
                    header("Location: index.php");
                }
                
                if (!isset($_SESSION["customer"]))
                {
                    header("Location: index.php");
                }
                else if (isset($_POST["btnUpdate"]))           
                {
                    
                    $firstName = $_POST["txtFirstName"];
                    $lastName = $_POST["txtLastName"];
                    $postEmail = $_POST["txtEmail"];
                    $pwd = $_POST["txtPwd"];
                    $address = $_POST["txtAddress"];
                    $cardNo = $_POST["txtCardNo"];

                    $phone = $_POST["txtPhone"];
                    $gender = $_POST["gender"];
                    $date = $_POST["txtDate"];
                    $isAdmin = 0;
                    

                    $rdyAddress = preg_replace('/\s+/', '', $address);
                    if(true)
                    {
                        $currentEmail = $_SESSION["customer"]["email"];
                        
                        $query = "SELECT * FROM account where email = '$postEmail' and email != '$currentEmail'";   
                        $resultSet = $connect->mysqli->query($query);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                        $fetchedRow = mysqli_fetch_assoc($resultSet);
                        if ($fetchedRow != null)
                        {
                            $errorMessage = "ERROR: Email you want to change is already registered with another account.";
                        }
                        else
                        {
                            //('$firstName', '$lastName', '$hashedPassword', $gender, '$email', '$phone', '$address', '$date', '$cardNo', '$orders', $isAdmin)
                            $salt= "*@!";
                            $hashedPwd = md5($salt.$pwd.$salt);
                            $createQuery = "UPDATE account
                                             SET firstName = '$firstName', 
                                                 lastName = '$lastName',
                                                 email = '$postEmail', 
                                                 password = '$hashedPwd', 
                                                 address = '$address', 
                                                 cardNo = '$cardNo',
                                                 gender = '$gender',
                                                 date = '$date',
                                                 orders = '$orders',
                                                 phone = '$phone'
                                                 where email = '$currentEmail'";
                            $createResult = mysqli_query($connection, $createQuery);
                            if (!$createResult) die("<ERROR: Cannot execute $createQuery>");
                            $tempName = $firstName." ".$lastName;
                            $_SESSION["customer"]["name"] = $tempName;
                            $_SESSION["customer"]["firstName"] = $firstName;
                            $_SESSION["customer"]["lastName"] = $lastName;
                            $_SESSION["customer"]["email"] = $postEmail;
                            $_SESSION["customer"]["password"] = $pwd;
                            $_SESSION["customer"]["address"] = $address;
                            $_SESSION["customer"]["cardNo"] = $cardNo;

                            $_SESSION["customer"]["gender"] = $gender;
                            $_SESSION["customer"]["phone"] = $phone;
                            $_SESSION["customer"]["date"] = $date;
                            header("Location: account.php?congrat=yes");
                        }
                    }
                }
                if (isset($_REQUEST["congrat"]))
                {
                    echo "  <script> 
                                    $(function() 
                                        {
                                            $('#frmHasNot').fadeOut('slow');
                                            $('#h3Id').replaceWith('<h3>Вітаю</h3>');
                                            $('#paraId').replaceWith('<p>Ваш аккаунт був оновлен.</p>');
                                        })
                            </script>
                            ";
                }
                $firstName = $_SESSION["customer"]["firstName"];
                $lastName = $_SESSION["customer"]["lastName"];
                $email = $_SESSION["customer"]["email"];
                $pwd = $_SESSION["customer"]["password"];
                $address = $_SESSION["customer"]["address"];
                $cardNo = $_SESSION["customer"]["cardNo"];

                $phone = $_SESSION["customer"]["phone"];
                $gender = $_SESSION["customer"]["gender"];
                $date = $_SESSION["customer"]["date"];
                $isAdmin = $_SESSION["customer"]["isAdmin"];
            ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Сторінка користувача</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        



        <link rel="stylesheet" href="http://bootstraptema.ru/plugins/2015/bootstrap3/bootstrap.min.css" />
<link rel="stylesheet" href="http://bootstraptema.ru/plugins/font-awesome/4-4-0/font-awesome.min.css" />
        
    </head>
    
    <body>
        <div id="container">
            <div id="headerDiv">

<?php include "header.php"?>


<br><br><br>

<style>
body{background:url(http://bootstraptema.ru/images/bg/bg-1.png)}
input{width: 100%;}
input[type=submit] {
    padding:5px 15px; 
    background:#1ab188; 
    border:0 none;
    cursor:pointer;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
    width: 100%;
}

#main {
 background-color: #f2f2f2;
 padding: 20px;
-webkit-border-radius: 4px;
 -moz-border-radius: 4px;
 -ms-border-radius: 4px;
 -o-border-radius: 4px;
 border-radius: 4px;
 border-bottom: 4px solid #ddd;

}
#real-estates-detail #author img {
 -webkit-border-radius: 100%;
 -moz-border-radius: 100%;
 -ms-border-radius: 100%;
 -o-border-radius: 100%;
 border-radius: 100%;
 border: 5px solid #ecf0f1;
 margin-bottom: 10px;
}
#real-estates-detail .sosmed-author i.fa {
 width: 30px;
 height: 30px;
 border: 2px solid #bdc3c7;
 color: #bdc3c7;
 padding-top: 6px;
 margin-top: 10px;
}
.panel-default .panel-heading {
 background-color: #fff;
}
#real-estates-detail .slides li img {
 height: 450px;
}
select#soflow, select#soflow-color {
    -webkit-appearance: button;
    -webkit-border-radius: 2px;
    -webkit-box-shadow: 0px 1px 3px #1ab188;
    -webkit-padding-end: 20px;
    -webkit-padding-start: 2px;
    -webkit-user-select: none;
    background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#53d1b0, #53d1b0 40%, #1ab188);
    background-position: 95% center;
    background-repeat: no-repeat;
    border: 0px solid #1ab188;
    color: #555;
    font-size: inherit;

    overflow: hidden;
    padding: 5px 10px;
    text-overflow: ellipsis;
    white-space: nowrap;
    width: 100%;
 }
 
 select#soflow-color {
    color: #fff;
    background-image: url(http://i62.tinypic.com/15xvbd5.png), -webkit-linear-gradient(#53d1b0, #53d1b0 40%, #53d1b0);
    background-color: #53d1b0;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    padding-left: 15px;
 }

 input[type=text]{    
	font-size: 14px;
	padding:5px 15px; 
	background-color: #53d1b0;
    border:0 none;
    -webkit-border-radius: 5px;
    border-radius: 5px; 
	width: 100%;
}
</style>

<div class="container">
<div id="main">
 <div class="row" id="real-estates-detail">
 <div class="col-lg-4 col-md-4 col-xs-12">
 <div class="panel panel-default">
 <div class="panel-heading">
 <header class="panel-title">
 <div class="text-center">
 <strong>Користувач сайту</strong>
 </div>
 </header>
 </div>
 <div class="panel-body">
 <div class="text-center" id="author">
 <img width="300px" height="300px" src="css/images/avatar.jpg">
 <h3><?php echo  $custName ?></h3>
 </div>
 </div>
 </div>
 </div>
 <div class="col-lg-8 col-md-8 col-xs-12">
 <div class="panel">
 <div class="panel-body">
 <div id="myTabContent" class="tab-content">
 <div class="tab-pane fade active in" id="detail">
 <h4>Дані користувача</h4>
 <table class="table table-th-block">
 <tbody>

 <form id="frmAccount" method="post">
 <tr><td class="active">Ім'я:</td><td><input type="text" name="txtFirstName" value="<?php echo $firstName ?>"/></td></tr>
 <tr><td class="active">Прізвище:</td><td><input type="text" name="txtLastName" value="<?php echo $lastName ?>"/></td></tr>
 <tr><td class="active">Email:</td><td><input type="text" name="txtEmail" value="<?php echo $email?>"/></td></tr>
 <tr><td class="active">Пароль:</td><td><input type="text" name="txtPwd" value="<?php echo $pwd ?>"/></td></tr>
 <tr><td class="active">Номер телефону:</td><td><input type="text" name="txtPhone" value="<?php echo $phone ?>"/></td></tr>
 <tr><td class="active">Місто:</td><td><input type="text" name="txtAddress" value="<?php echo $address ?>"/></td></tr>
 <tr><td class="active">Стать:</td><td> 							
     <select id="soflow" name="gender" >
								<option value="0" <?php if ($gender  == "0") echo 'selected'; ?>>Стать</option>
								<option value="1" <?php if ($gender  == "1") echo 'selected'; ?>>Хлопець</option>
								<option value="2" <?php if ($gender  == "2") echo 'selected'; ?>>Дівчина</option>
    </select>
 <tr><td class="active">Дата народження:</td><td><input type="text" name="txtDate" value="<?php echo $date ?>"/></td></tr>
 <tr><td class="active">Номер картки:</td><td><input type="text" name="txtCardNo" value="<?php echo $cardNo ?>"/></td></tr>
 <tr><td></td><td><input id="btnUpdate" type="submit" name="btnUpdate" value="Зберегти нові дані"/></td></tr>
 </form>

</tbody>
 </table>
 </div>
 <div class="tab-pane fade" id="contact">
 <p></p>
 </div>
 </div>
 </div>
 </div>
 </div>
 </div>
</div>

</div>
</div>


            <div id="accountBoxDiv">
                <div id="accountThickLine"></div>
                <div id="accountDiv">
                    <?php
                        if ($errorMessage != "")
                        {
                            echo "  <div id='accountErrorDiv'>
                                        $errorMessage 
                                    </div>
                            <script> 
                            $(function() 
                                {
                                    $('#accountErrorDiv').fadeIn('slow');
                                })
                           </script>";
                        }
                    ?>

                </div>

                    
                </div>    
            </div>
            
<?php include "footer.php"?>
        </div>
    </body>
</html>

