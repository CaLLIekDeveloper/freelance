<?php 
    session_start();
    ob_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
	}
	
	include_once ("php/connect.php");
	include_once ("php/function.php");

	if (isset($_SESSION["customer"])) {
        $isAdmin = $_SESSION["customer"]["isAdmin"];
                                    
    if($isAdmin!=1)
        {
            echo '<script>location.replace("index.php");</script>'; exit;
            die();
        }
    }
    else {
        echo '<script>location.replace("index.php");</script>'; exit;
        die();
    }
    
    $name = "";
    if(isset($_POST["name"]))
    {
        $name = $_POST["name"];
    }

    if (isset($_POST["btnAddProduct"]))
    {
        if($name =="")
        {
            echo '<script> alert("Заповніть назву типу продукту"); </script>';
        }
        else
        {
            $query = "SELECT * FROM type where name='$name'";   
            $resultSet = $connect->mysqli->query($query);
            if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
            $fetchedRow = mysqli_fetch_assoc($resultSet);
            if ($fetchedRow != null)
            {
                echo '<script> alert("Помилка: Неможливо додати тип товар оскільки тип товар з таким іменем вже є у БД"); </script>';
            }
            else
            {
                $createQuery = "INSERT INTO type(name) 
                VALUES ('$name')";
                $createResult = $connect->mysqli->query($createQuery);
                if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery>");
                echo '<script> alert("Тип товару успішно додано до БД"); </script>';
                echo '<script>location.replace("admin.php");</script>'; exit;
            }
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Додати тип продукту</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="css/prodInfo.css" rel="stylesheet" type="text/css"/>
        <link href="css/addProduct.css" rel="stylesheet" type="text/css"/>

        
    </head>
    
    <body style="height: 100%;>
        <div id="container" >
        <?php include "header.php"?>
<div id="prodInfoBoxDiv">

                <form method="post" enctype="multipart/form-data">
                <h1 style="margin-left: 33%; margin-right: auto;">Додати тип продукту</h1>
                <br>
                <br>
<div>  
                <p style="margin-left: 30%; margin-right: auto;">Тип продукту: 
                <input name="name" placeholder="Введіть тип продукту" type="text" style="width: 50%; margin-left: 0px;  margin-bottom: 10px;" name="txtCardNo" value=""/>
                </p>
                
</div>
<br>
                <input name="btnAddProduct" type="submit" style="margin-left: 43%; margin-right: auto;" value="Додати тип товару до БД">
                <br>
                <br>
                <br>
				</form>
</div>
<?php include "footer.php"?>
            
   </div>
    </body>
</html>
<?php ob_flush(); ?>