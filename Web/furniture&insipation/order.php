<?php 
    session_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
	}
	
	include_once ("php/connect.php");

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

    require_once "php/Order.php";
    $order = new Order();
    if (isset($_GET["orderId"]))     
    {
        $order->id = $_GET["orderId"];
        $query = "SELECT * FROM orders WHERE orderId=$order->id";   
                $resultSet = $connect->mysqli->query($query);
                if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                $fetchedRow = mysqli_fetch_row($resultSet);
                if ($fetchedRow == null)  
                {
                    echo '<div id="prodInfoBoxDiv" style="height: 100%;">
                    <h1 style="margin-left: 39%; margin-right: auto; color:red; ">Заказів немає</h1>';
                }
                else
                {
                    $order->setOrderFromFetchRow($fetchedRow);
                }
    }
    else
    {
        exit();
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Інформація о замовленні</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="css/prodInfo.css" rel="stylesheet" type="text/css"/>
        <link href="css/addProduct.css" rel="stylesheet" type="text/css"/>
        <link href="css/basket.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="css/style-table.css" type="text/css"  />
        <link href="css/checkout.css" rel="stylesheet" type="text/css" />
        
    </head>
    
    <body style="height: 100%;>
        <div id="container">
        <?php include "header.php"?>
<div id="basketDiv">
            <form action="#" method="POST">
                <h3 id="basketHeading"> Перегляд замовлення </h3>
                <div id="custDetailsDiv">
                            <table class="simple-little-table" cellspacing="0">
                                <caption>Дані замовлення:</caption>
                                
                                <tbody><tr>
                                    <td>Ваше Ім'я</td>
                                    <td><?php echo "$order->firstName"; ?></td>
                                    <td>Номер картки</td>
                                    <td style="width: 400px;"><?php echo "$order->cardNo"; ?></td>
                                </tr>
                                
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo "$order->email"; ?></td>
                                    <td>Введіть данні картки</td>
                                    <td>Термін дії картки: <?php echo "$order->cardMonth"; ?>/<?php echo "$order->cardYear"; ?> </td>
                                </tr>
                            
                                <tr>
                                    <td>Місто</td>
                                    <td><?php echo "$order->address"; ?></td>
                                    <td colspan="2">Коментар замовлення:</td>
                                </tr>

                                <tr>
                                <td>Номер телефону</td>
                                <td><?php echo "$order->phone"; ?></td>
                                <td colspan="2"><textarea name="orderComment" placeholder="" readonly><?php echo "$order->orderComment"; ?></textarea></td>
                                </tr>
                                
                                
                            </tbody></table>
                                                </div>
                    </form>

                <table id="basketTable" style="margin-top: 120px;">
                        <tbody><tr>
                            <th id="thProdName" colspan="2">Товар</th> 
                            <th>Ціна за одиницю товару</th> 
                            <th>Кількість</th> 
                            <th id="thLineTotal">&nbsp;&nbsp;Загальна вартість</th> 
                        </tr>
                        <tr><td class="tdFirstThinLine" colspan="5"> </td></tr>
                        <?php 

                    for ($rowNumber = 0; $rowNumber < count($order->arrProducts)-1; $rowNumber++)
                    {
                        
                            if ($fetchedRow == null) 
                            {
                                echo "<td></td>";
                            }
                            else
                            {
                                $product = explode("/___/", $order->arrProducts[$rowNumber]);
                                $tempPrice = $product[1] * $product[2];
                                
                                $query = "SELECT prodName,prodImage FROM product WHERE prodId=$product[0]";
                                $resultSet = $connect->mysqli->query($query);
                                $fetchedRow = mysqli_fetch_row($resultSet);
                                
                                $name = $fetchedRow[0];
                                $image = $fetchedRow[1];
                                echo '                                   
                                 
                                <tr id="tr14">
                                    <td class="tdProdImg"> <img class="center-img" align="center" valign="center" src="css/images/products/'.$image.'" width="100" height="90" alt="image product14.jpg"> </td>
                                    <td class="tdName"> <p>'.$name.'</p> </td>
                                    <td class="tdPrice">'.$product[1].' грн.</td>
                                    <td class="tdQty">'.$product[2].'</td>
                                    <td style="text-align: center;" class="tdLineTotal">'.$tempPrice.' грн.</td>
                                </tr>
                                ';
                            } 
                    }
                ?>



                                      <tr><td class="tdThinLine" colspan="5"> </td></tr><tr class="trEmptySpace"><td colspan="5"></td></tr> 
                                      <tr>  <td colspan="2"></td>  
                                      <td class="tdEnd" colspan="2">  Вартість за товари:       </td>  
                                      <td class="tdEndData">&nbsp;&nbsp;<?php echo "$order->orderPrice грн."; ?></td></tr><tr>  
                                          <td colspan="2"></td>  
                                      <td class="tdEnd" colspan="2">  Вартість доставки:  </td>  <td class="tdEndData">&nbsp;&nbsp;50 грн.  </td>  
                                    </tr><tr>  
                                        <td colspan="2"></td>  
                                        <td class="tdEnd" colspan="2">  ПДВ:</td>  <td class="tdEndData">&nbsp;&nbsp;<?php $pdv = $order->orderPrice*0.2 ;echo "$pdv грн."; ?>          

                                        </td>  </tr><tr>  <td colspan="2"></td>  
                                        <td class="tdGrandTotal" colspan="2">  Загальна вартість:    </td>  <td class="tdGrandTotalData">&nbsp;&nbsp;<?php $allPrice = $order->orderPrice+$order->orderPrice*0.2+50; echo "$allPrice"; ?>грн.  </td>
                                      </tr>                        
                                    </tbody>
                                </table>
            </div>
				

</div>
<?php include "footer.php"?>
            
   </div>
    </body>
</html>