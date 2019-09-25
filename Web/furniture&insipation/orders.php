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
    include_once "php/Order.php";

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
        <title>Сторінка замовлень</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="css/prodInfo.css" rel="stylesheet" type="text/css"/>
        <link href="css/addProduct.css" rel="stylesheet" type="text/css"/>
        <link href="css/basket.css" rel="stylesheet" type="text/css" />
    
        
    </head>
    
    <body style="height: 100%;>
        <div id="container">
        <?php include "header.php"?>
<table id="basketTable">
                <tbody>
                    <tr>
                    <th style="width: 100px;">Id</th>
                    <th style="width: 200px;">email Замовника</th>
                    <th style="width: 200px;">Телефон замовника</th>
                    <th style="width: 150px;">Дата замовлення</th>
                    <th>Вартість замовлення без ПДВ</th>
                    <th>Статус замовлення</th>
                    <th>Сторінка замовлення</th>  
                    </tr>
                
                <?php
                $query = "SELECT * FROM orders";   
                $resultSet = $connect->mysqli->query($query);

                $num_rows = mysqli_num_rows($resultSet);

                if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                $fetchedRow = mysqli_fetch_row($resultSet);
                if ($fetchedRow == null)  
                {
                    echo '<div id="prodInfoBoxDiv" style="height: 100%;">
                    <h1 style="margin-left: 39%; margin-right: auto; color:red; ">Заказів немає</h1>';
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
                                $tempOrder = new Order();
                                $tempOrder->setOrderFromFetchRow($fetchedRow);


                                echo '
                                <a href ="order.php?orderId='.$tempOrder->id.'">
                                    <tr id="tr14" style="height: 80px;">
                                    <td>'.$tempOrder->id.'</td>
                                    <td>'.$tempOrder->email.'</td>
                                    <td>'.$tempOrder->phone.'</td>
                                    <td>'.$tempOrder->orderDate.'</td>
                                    <td style="text-align: center;">'.$tempOrder->orderPrice.'</td>
                                    <td style="text-align: center;">В обробці </td>
                                    
                                    <td style="text-align: center;"> <a href="order.php?orderId='.$tempOrder->id.'"><input type="submit" value="Перейти на сторінку замовлення"></a></td>
                                </tr> 
                                </a>';
                                $fetchedRow = mysqli_fetch_row($resultSet);
                            } 
                    }
                    
                }
                ?>  
                        </tbody>
                        </table>


                
				

</div>
<?php include "footer.php"?>
            
   </div>
    </body>
</html>
<?php ob_flush(); ?>