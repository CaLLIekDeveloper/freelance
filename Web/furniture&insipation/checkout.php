<?php
    session_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }
    include_once ("php/connect.php");
	include_once ("php/function.php");

    require_once "php/Order.php";
    $order = new Order();

    if(isset($_SESSION["customer"]))
    {
        $order->accountId = $_SESSION["customer"]["accountId"];
        $order->firstName = $_SESSION["customer"]["firstName"];
        $order->email = $_SESSION["customer"]["email"]; 
        $order->address =  $_SESSION["customer"]["address"]; 
        $order->cardNo =  $_SESSION["customer"]["cardNo"];
        $order->phone =  $_SESSION["customer"]["phone"];
    }
    $order->cardMonth = "";
    $order->cardYear = "";
    $order->orderComment = "";

    if(isset($_POST["firstName"]))$order->firstName = $_POST["firstName"];
    if(isset($_POST["email"]))$order->email = $_POST["email"];
    if(isset($_POST["address"]))$order->address = $_POST["address"];
    if(isset($_POST["cardNo"]))$order->cardNo = $_POST["cardNo"];
    if(isset($_POST["phone"]))$order->phone = $_POST["phone"];
    
    if(isset($_POST["cardMonth"]))$order->cardMonth = $_POST["cardMonth"];
    if(isset($_POST["cardYear"]))$order->cardYear = $_POST["cardYear"];
    if(isset($_POST["orderComment"]))$order->orderComment = $_POST["orderComment"];


    if(isset($_POST["btnAddOrder"]))
    {
        if($order->firstName == "" || $order->email == "" || $order->address == "" 
           || $order->cardNo== "" || $order->phone == "" || $order->cardMonth == "" || $order->cardYear == "")
        echo '<script> alert("Заповніть всі данні"); </script>';
        else
        {
            $order->setOrderCustomer();
            $basket1 = $_SESSION["basket"];
            $order->setOrderBasket($_SESSION["basket"]);

            $createResult = $connect->mysqli->query($order->getInsertQuery());
            if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery >");


            echo '<script>location.replace("thankyou.php");</script>'; 
            exit;
        }
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Оформлення товару</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <link href="css/home.css" rel="stylesheet" type="text/css" />
        <link href="css/basket.css" rel="stylesheet" type="text/css" />
        
        <link rel="stylesheet" href="css/style-table.css" type="text/css"  />
        <link href="css/checkout.css" rel="stylesheet" type="text/css" />
        
        <script type="text/javascript">

            function btnUpdate()
            {
                var frmUpdate = document.getElementById("frmUpdate");
                var qty = frmUpdate.qtyUpdate.value;

                if (isEmpty(qty))
                {
                    alert("Please enter quantity!");
                    return false;
                }

                if (!isInteger(qty))
                {
                    alert("Please enter whole number!");
                    return false;
                }

                if (qty < 0)
                {
                    alert("Please enter positive number!")
                    return false;
                }
            }
        </script>
    </head>
    
    <body>
        <div id="container">
<?php include "header.php"?>
            
            <div id="basketDiv">
            <form action="#" method="POST">
                <h3 id="basketHeading"> Перегляд замовлення </h3>
                <div id="custDetailsDiv">
                            <?php
                                echo '<table class="simple-little-table" cellspacing="0">
                                <caption>Ваше замовлення буде надіслано:</caption>
                                
                                <tr>
                                    <td>Ваше Ім\'я</td>
                                    <td><input type="text" name="firstName" value="'.$order->firstName.'"/></td>
                                    <td>Номер картки</td>
                                    <td style="width: 400px;"><input type="text" name="cardNo" value="'.$order->cardNo.'"/></td>
                                </tr><!-- Table Row -->
                                
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="email" value="'.$order->email.'"/></td>
                                    <td>Введіть данні картки</td>
                                    <td>Термін дії картки: <input type="text" name="cardMonth" style="width: 15%;" value="'.$order->cardMonth.'"/> <input type="text" style="width: 20%;" name="cardYear" value="'.$order->cardYear.'"/></td>
                                </tr>
                            
                                <tr>
                                    <td>Місто</td>
                                    <td><input type="text" name="address" value="'.$order->address.'"/></td>
                                    <td colspan="2">Ви можете додати коментар до свого замовлення:</td>
                                </tr>

                                <tr>
                                <td>Номер телефону</td>
                                <td><input type="text" name="phone" value="'.$order->phone.'"/></td>
                                <td colspan="2" ><textarea name="orderComment" placeholder="Ведіть коментар">'.$order->orderComment.'</textarea></td>
                                </tr>
                                
                                
                            </table>
                            ';
                        ?>
                    </div>
                    <div id="checkOutDiv">
                        <a id="aContinueShop" href="basket.php">Повернутися до корзини</a>
                        
                        <input name="btnAddOrder" type="submit" style="margin-left: 50px;" value="Оплатити заказ">
                        
                    </div>
                    </form>
                <table id="basketTable" style="margin-top: 120px;">
                        <tr>
                            <th id="thProdName" colspan="2">Товар</th> <th>Ціна за одиницю товару</th> <th>Кількість</th> <th id="thLineTotal">&nbsp;&nbsp;Загальна вартість</th> 
                        </tr>
                        <tr><td class='tdFirstThinLine' colspan='5'> </td></tr>
                        <?php
                        if (!isset($_SESSION["basket"]))
                        {
                            echo '<script>location.replace("index.php");</script>'; exit;
                        }
                        else
                        {
                            $basket = $_SESSION["basket"]; 
                            $total = 0;
                            foreach ($basket as $key => $item)      
                            {
                                $id = $item["id"];
                                $type = $item["type"];
                                $imgName = $item["imageName"]; 
                                $name = $item["name"];
                                $price = $item["price"];
                                $qty = $basket[$key]["qty"];
                                $cost = $qty * $price;
                                $total = $total + ($price * $qty);
                                echo "<tr id='tr$id'>
                                        <td class='tdProdImg'> <img class='center-img' align='center' valign='center' src='css/images/products/$imgName' width='100' height='90' alt='image $imgName'/> </td>
                                        <td class='tdName'> <p>$name</p> </td>
                                        <td class='tdPrice'> $price грн.</td>
                                        <td class='tdQty'> $qty </td>
                                        <td style='text-align: center;' class='tdLineTotal'>&nbsp;&nbsp;$cost грн. </td>
                                      </tr>
                                      <tr><td class='tdThinLine' colspan='5'> </td></tr>";
                            }

                                $shippingCost = 50;
                                define("VATRATE", 0.2);
                                $vat = VATRATE * $total;
                                $grandTotal = $total + $shippingCost + $vat;
                                echo "<tr class='trEmptySpace'><td colspan='5'></td></tr> ";
                                echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  Вартість за товари:       </td>  <td class='tdEndData'>&nbsp;&nbsp;$total грн.        </td>  </tr>";

                                echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  Вартість доставки:  </td>  <td class='tdEndData'>&nbsp;&nbsp;$shippingCost грн.  </td>  </tr>";

                                echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  ПДВ:            </td>  <td class='tdEndData'>&nbsp;&nbsp;$vat грн.          </td>  </tr>";

                                echo "<tr>  <td colspan='2'></td>  <td class='tdGrandTotal' colspan='2'>  Загальна вартість:    </td>  <td class='tdGrandTotalData'>&nbsp;&nbsp;$grandTotal грн.    </td>  </tr>";
                        }?>
                        </table>
            </div>
            
<?php include "footer.php"?>
        </div>
    </body>
</html>


