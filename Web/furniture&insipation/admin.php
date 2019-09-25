<?php
    session_start();
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
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        $prodType = "1";
        $title = "";
        $image1 = "";
        $image2 = "";
        ?>
        <title>Сторінка адміністрування </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="css/pagination.css" rel="stylesheet" type="text/css"/>

    <link href="css/home.css" rel="stylesheet" type="text/css"/>
    <link href="css/prodList.css" rel="stylesheet" type="text/css"/>

    <link href="css/admin.css" rel="stylesheet" type="text/css"/>
    </head>
    
    <body>
        <div id="container">
		
<?php include "header.php"?>
<div id="prodListDiv">
            <div id="prodListDiv">

                <div id="BG"> <h2> Товари </h2> </div>
                <div id="checkOutDiv">
                        <a id="aContinueShop" href="addProduct.php">Додати продукт</a>
                        <a id="aContinueShop" href="addTypeProduct.php">Додати тип продукту</a>
                        <a id="aContinueShop" href="addProducerProduct.php">Додати виробника продукту</a>
                        <a id="aContinueShop" href="orders.php">Закази</a>
                </div>
                <br>
                <br>
                <div id="paginationBoxDiv">
                    <div id="paginationDiv" ><?php 
                        $page = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
                        $limit = 20;
                        $startpoint = ($page * $limit) - $limit;
                        $statement = "FROM product where prodProd='0'";

                    echo pagination($statement,$limit,$page, "?prodProd='0'&amp;",$connect); ?></div>
                    </div>
                <table id="basketTable">
                <tr>
                 <th>id</th><th id="thProdName" colspan="2">Найменування товару</th> <th>Редагувати товар</th> <th>Видалити товар</th>  
                </tr>
                <?php
                $startpoint = ($page * $limit) - $limit;
                $query = "SELECT * FROM product where prodProd='0' LIMIT {$startpoint} , {$limit}";
                
                $resultSet = $connect->mysqli->query($query);

                $num_rows = mysqli_num_rows($resultSet);

                if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                $fetchedRow = mysqli_fetch_row($resultSet);
                
                if ($fetchedRow == null)  
                {
                }
                else
                {
                    for ($rowNumber = 0; $rowNumber < $num_rows ; $rowNumber++)
                    {
                        
                            if ($fetchedRow == null) 
                            {
                                echo "<td></td>";
                            }
                            else
                            {
                                $id = $fetchedRow[0];
                                $name = $fetchedRow[1];
                                $imgName = $fetchedRow[2];
                                $price = $fetchedRow[6];
                                echo "<tr class='border_bottom' id='tr$id'>
                                <td class='tdId'>$id</td>
                                <td class='tdProdImg'> <figure><img class='center-img' align='center' valign='center' src='css/images/products/$imgName' width='100' height='90' alt='image $imgName'/></figure> </td>
                                <td class='tdName1'> <p>$name</p> </td>
                                <td class='tdButton'> <form method=\"post\" action = 'editProduct.php'>  <input type='hidden' name='hidIdUpdate' value='$id'/> <input type='submit' value='Редагувати'/> </form> </td>
                                <td class='tdButton'> 
                                <form method=\"post\">  
                                <input type='hidden' name='hidIdDelete' value='$id'/> 
                                <input type='submit' name='btnDelete' onclick=\"return confirm('Ви впевнені що хочете видалити товар $name      Котрий має id: $id?')\" value='Видалити'/> 
                                </form> </td>
                                </tr>";

                                $fetchedRow = mysqli_fetch_row($resultSet);
                            } 
                    }
                }
                if(isset($_POST["btnDelete"]))
                {
                    if(isset($_POST["hidIdDelete"]))
                    {
                        $prodId = $_POST["hidIdDelete"];
                        $createQuery = "DELETE FROM product WHERE prodId=$prodId";
                        $createResult = $connect->mysqli->query($createQuery);
                        if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery>");
                        echo '<script> alert("Товар успішно видалено з БД"); </script>';
                        echo '<script>location.replace("admin.php");</script>'; exit;
                    }
                }
                ?>    
                </table>

                
                <div id="paginationBoxDiv">
                    <div id="paginationDiv"><?php echo pagination($statement,$limit,$page, "?prodProd='0'&amp;",$connect); ?></div>
                </div>
            </div>
</div>
<br>
<br>
<?php include "footer.php"?>
        </div>
    </body>
</html>
