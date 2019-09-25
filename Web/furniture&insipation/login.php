<?php
    session_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }

    if (isset($_SESSION["customer"])) {
        echo '<script>location.replace("index.php");</script>'; exit;
    }
?>



<!DOCTYPE html>
<html>
    <head>
        <title>Авторизація</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="css/home.css" rel="stylesheet" type="text/css" />
        <link href="css/login.css" rel="stylesheet" type="text/css" />

        <link rel="stylesheet" href="css/style_register.css">
        <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
        
    </head>
    
    <body>
        <div id="container">
<?php include "header.php"?>

<?php
                include_once ("php/connect.php");
                include_once ("php/phpValidation.php");
                $errorMessage = "";
                $firstName = "";
                $lastName = "";
                $pwd = "";
                $gender = 0;
                $email = "";
                $phone = "";
                $address = "";
                $date = "01.01.2000";
                $cardNo = "";
                $isAdmin = 0;
                

                $verifyPwd = "";
                $hasEmail = "";
                $hasPwd = "";

                if (isset($_POST["btnLogin"]))
                {
                    $hasEmail = $_POST["txtEmail"];
                    $hasPwd = $_POST["txtPwd"];

                    $query = "SELECT * FROM account where email='$hasEmail'";   
                    $resultSet = $connect->mysqli->query($query);
                    if (!$resultSet) die("<ПОмилка: Неможливо виконати запит $query>");
                    $fetchedRow = mysqli_fetch_assoc($resultSet);
                    
                    if ($fetchedRow == null)
                    {
                        $errorMessage = "Помилка: Профіля з такими даними немає";
                    }
                    else
                    {
                        $salt = "*@!";
                        $hashedPwd = md5($salt.$hasPwd.$salt);
                        $query = "SELECT * FROM account where email='$hasEmail' and password = '$hashedPwd'";   
                        $resultSet = $connect->mysqli->query($query);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                        $fetchedRow = mysqli_fetch_assoc($resultSet);
                        
                        if ($fetchedRow != null)
                        {
                            $firstName = $fetchedRow["firstName"];
                            if($firstName=='Яна' )
                             $firstName = 'Яна-Хуяна';
                             if($firstName=='Янка' )
                             $firstName = 'Янка-Хуянка';
                             if($firstName=='Яночка' )
                             $firstName = 'Яночка-Хуяночка';
                            $lastName = $fetchedRow["lastName"];
                            $custName = $firstName." ".$lastName;
                            $hasAddress = $fetchedRow["address"];
                            $hasCardNo = $fetchedRow["cardNo"];

                            $gender = $fetchedRow["gender"];
                            $phone = $fetchedRow["phone"];
                            $date = $fetchedRow["date"];
                            $isAdmin = $fetchedRow["isAdmin"];
                            $accountId = $fetchedRow["account_id"];
                            $_SESSION["customer"] = array("accountId" =>$accountId,"gender" => $gender, "phone" => $phone, "date" => $date, "isAdmin" => $isAdmin, "firstName" => $firstName, "lastName" => $lastName, "name" => $custName, "email" => $hasEmail, "password" =>$hasPwd, "address" => "$hasAddress", "cardNo" => "$hasCardNo");
                            echo '<script>location.replace("index.php");</script>'; exit;
                        }
                        else
                        {
                            $errorMessage = "Помилка: Профіля з такими даними немає";
                        }
                    }
                }
                if (isset($_POST["btnRegister"]))
                {
                    $firstName = $_POST["txtFirstName"];
                    $lastName = $_POST["txtLastName"];
                    $email = $_POST["txtEmail"];
                    $pwd = $_POST["txtPwd"];
                    $verifyPwd = $_POST["txtVerifyPwd"];
                    $address = "";
                    $gender = 0;
                    $postCode = "";
                    $cardNo = "";
                    $phone = "";
                    $date = "01.01.2000";
                    $isAdmin = 0;


                    if ($pwd != $verifyPwd)
                    {
                        $errorMessage = "Помилка: Паролі не співпадають!";
                        echo '<script> alert("Помилка: Паролі не співпадають"); </script>'; 
                    }
                    else
                    {
                        $query = "SELECT * FROM account where email='$email'";   
                        $resultSet = $connect->mysqli->query($query);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                        $fetchedRow = mysqli_fetch_assoc($resultSet);

                        if ($fetchedRow != null)
                        {
                            $errorMessage = "Помилка: Неможливо зареєструватися оскільки данний Email вже є у системі";
                            echo '<script> alert("Помилка: Неможливо зареєструватися оскільки данний Email вже є у системі"); </script>';
                        }
                        else
                        {
                          
                          mail($email, "Дякую за реєстрацію furniture&inspiration ", 
                          "<p>Ви успішно зареєструвалися на сайті furniture<b>&</b>inspiration</p> 
                          </br> <b>Ваш логін: $email</b> 
                          </br> <i>Ваш пароль: $pwd</i> </br>"); 
                            $salt = "*@!";
                            $hashedPassword = md5($salt.$pwd.$salt);
                            $orders = "";
                            $isAdmin = 0;
                            $createQuery = "INSERT INTO account(firstName, lastName, password, gender, email, phone, address, date, cardNo, orders, isAdmin) 
                                VALUES ('$firstName', '$lastName', '$hashedPassword', $gender, '$email', '$phone', '$address', '$date', '$cardNo', '$orders', $isAdmin)";
                            $createResult = $connect->mysqli->query($createQuery);
                            if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery>");
                            echo " <script> 
                                    alert('Ви успішно зарєструвалися');</script>";
                                    echo '<script>location.replace("login.php");</script>'; 
                                    
                        }
                    }
                }
            ?>


<div class="form">
      
      <ul class="tab-group">
        
        <li class="tab active"><a href="#login">Зайти</a></li>
		<li class="tab"><a href="#signup">Реєстрація</a></li>
      </ul>
      <h5 id="hasNotH5"></h5>
<p id="hasNotPara"></p>
<?php
                        if ($errorMessage != "")
                        {
                            echo "  <div id='errorDiv'>
                                        $errorMessage 
                                    </div>
                            <script> 
                            $(function() 
                                {
                                    $('#errorDiv').fadeIn('slow');
                                })
                           </script>";
                        }
?>
      
      <div class="tab-content">
	  <div id="login">   
          <h1>З поверненням!</h1>
          
          <form id="frmHas" method="post" autocomplete="on">
          
            <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input name="txtEmail" id="frmEmailA" type="email" required autocomplete="off" />
          </div>
          
          <div class="field-wrap">
            <label>
              Пароль<span class="req">*</span>
            </label>
            <input type="password" name="txtPwd" required autocomplete="off" />
          </div>

          
          <button type="submit" name="btnLogin" class="button button-block"/>Увійти</button>
          
          </form>

        </div>
	  
	  
        <div id="signup">   
          <h1>Реєстрація</h1>
          
          <form id="frmRegister" method="post">
          
          <div class="top-row">
            <div class="field-wrap">
              <label>
                Ім'я<span class="req">*</span>
              </label>
              <input name="txtFirstName" type="text" required autocomplete="off" />
            </div>
        
            <div class="field-wrap">
              <label>
                Прізвище<span class="req">*</span>
              </label>
              <input name="txtLastName" type="text" required autocomplete="off" />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email<span class="req">*</span>
            </label>
            <input name="txtEmail" type="email"required autocomplete="off" />
          </div>
          
          <div class="field-wrap">
            <label>
              Введіть пароль<span class="req">*</span>
            </label>
            <input name="txtPwd" id="pass2" type="password"required autocomplete="off" />
          </div>

          <div class="field-wrap">
            <label>
              Підтвердіть пароль<span class="req">*</span>
            </label>
            <input name="txtVerifyPwd" id="pass22" type="password"required autocomplete="off" />
          </div>

          
          <button name="btnRegister" type="submit" class="button button-block"/>Зареєструватися</button>
          
          </form>
        </div>
        
        
        
      </div>
      
</div>
 <script  src="js/script_register.js"></script>
         
<?php include "footer.php"?>
        </div>
    </body>
</html>

