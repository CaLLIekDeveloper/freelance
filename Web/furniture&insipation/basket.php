<?php
    session_start();
    ob_start();
    if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Корзина</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/basket.css" rel="stylesheet" type="text/css" />

        
        <script type="text/javascript">
            function checkout()
            {
                alert("Будь ласка зайдіть до акаунуту");
                return false;
            }
        </script>
    </head>
    
    <body style="height: 100%;>
        <div id="container">
<?php include "header.php"?>

            
            <div id="basketDiv">
                <h3 id="basketHeading"> Корзина </h3>
                <div id='basketErrorDiv'><h6 id="errorMessage">Помилка:&nbsp;</h6></div>
                <table id="basketTable">
                <tr>
                    <th id="thProdName" colspan="2">Найменування товару</th> <th>Ціна за одиницю товару</th> <th>Кількість</th> <th id="thLineTotal">&nbsp;&nbsp;Загальна вартість</th> 
                </tr>
                <tr><td class='tdFirstThinLine' colspan='5'> </td></tr>

                <?php
                 include_once 'php/phpValidation.php';
                $update = false;
                $basket = $_SESSION["basket"];    

                if (isset($_REQUEST["qtyUpdate"]))  
                {
                    $idToUpdate = $_REQUEST["hidIdUpdate"];
                    $qtyToUpdate = $_REQUEST["qtyUpdate"];
                    $update = true;
                }

                foreach ($basket as $key => $item)
                {
                    $id = $item["id"];
                    $remove = false;
                    if ($update && ($id == $idToUpdate))
                    {
                        if (! isInteger($qtyToUpdate))
                        {
                            echo "<script>
                                    $(function() 
                                    {
                                        $('#basketErrorDiv').slideDown();
                                        $('#errorMessage').replaceWith('<h6>Помилка: Кількість повинна бути цілим числом</h6>');
                                    }) 
                                  </script> ";
                            $qtyToUpdate = 1;
                        }
                        else if ($qtyToUpdate == 0)      // IF UPDATE QUANTITY IS 0 THEN PLACE jQUERY TO REMOVE ITEM AND SET $REMOVE TRUE 
                        {
                            echo "<script>
                                $(function() 
                                {
                                    $('#tr$id>.tdProdImg, #tr$id>.tdName, #tr$id>.tdPrice, #tr$id>.tdQty, #tr$id>.tdLineTotal').fadeOut('slow');
                                }) 
                                </script>";
                            $remove = true;
                        }
                        if ($qtyToUpdate < 0)
                        {
                            echo "<script>
                                    $(function() 
                                    {
                                        $('#basketErrorDiv').slideDown();
                                        $('#errorMessage').replaceWith('<h6>Помилка: Кількість товару повинна будти більше за нуль</h6>');
                                    }) 
                                  </script> ";
                            $qtyToUpdate = 1;
                        }
                        if ($qtyToUpdate > 50)
                        {
                            echo "<script>
                                    $(function() 
                                    {
                                        $('#basketErrorDiv').slideDown();
                                        $('#errorMessage').replaceWith('<h6>Будь ласка, зверніться до відділу продажів при замовленні більше 50 таких самих предметів</h6>');
                                    }) 
                                  </script> ";
                            $qtyToUpdate = 1;
                        }
                        $basket[$key]["qty"] = $qtyToUpdate;
                    }
                    $type = $item["type"];
                    $imgName = $item["imageName"]; 
                    $name = $item["name"];
                    $price = $item["price"];
                    $qty = $basket[$key]["qty"];
                    $cost = $qty * $price;
                    echo "<tr id='tr$id'>
                            <td class='tdProdImg'> <figure><img class='center-img' align='center' valign='center' src='css/images/products/$imgName' width='100' height='90' alt='image $imgName'/></figure> </td>
                            <td class='tdName'> <p>$name</p> </td>
                            <td class='tdPrice'> $price  грн. </td>
                            <td class='tdQty'>   <form>  <input type='hidden' name='hidIdUpdate' value='$id'/> <input type='text' name='qtyUpdate' value='$qty'/> <input type='submit' value='Оновити'/> </form> </td>
                            <td class='tdLineTotal' style='text-align: center;'>&nbsp;&nbsp;$cost  грн. </td>
                          </tr>
                          <tr><td class='tdThinLine' colspan='5'> </td></tr>";
                    if ($remove)
                    {
                        unset($basket[$key]);   // REMOVING ITEM FROM THE BASKET
                        $_SESSION["basket"] = array_values($basket);
                        $nItems = sizeof($_SESSION["basket"]);
                        echo "  <script>
                                    $(function() 
                                    {
                                        $('#nItems').slideUp('slow', function() 
                                        {
                                            $('#nItems').replaceWith('<span>$nItems</span>');
                                        });
                                    }); 
                                </script>";
                    }
                    $_SESSION["basket"] = array_values($basket); // UPDATE SESSION BASKET
                    $basketSize = sizeof($_SESSION["basket"]);
                    $setId = "";
                    $setName = "";
                    $setPrice = "";
                    $setQty = "";
                    $setImageName = "";
                    $setType = "";
                    for ($i = 0; $i < $basketSize; $i++)
                    {
                        $setId        .= ":".$_SESSION["basket"][$i]["id"]; 
                        $setName      .= ":".$_SESSION["basket"][$i]["name"]; 
                        $setPrice     .= ":".$_SESSION["basket"][$i]["price"]; 
                        $setQty       .= ":".$_SESSION["basket"][$i]["qty"];
                        $setImageName .= ":".$_SESSION["basket"][$i]["imageName"]; 
                        $setType      .= ":".$_SESSION["basket"][$i]["type"];
                    }
                    $subId = substr($setId, 1);
                    $subName = substr($setName, 1);
                    $subPrice = substr($setPrice, 1);
                    $subQty = substr($setQty, 1);
                    $subImageName = substr($setImageName, 1);
                    $subType = substr($setType, 1);

                    setcookie("basket[id]", $subId, time()+ 3600);
                    setcookie("basket[name]", $subName, time()+ 3600);
                    setcookie("basket[price]", $subPrice, time()+ 3600);
                    setcookie("basket[qty]", $subQty, time()+ 3600);
                    setcookie("basket[imageName]", $subImageName, time()+ 3600);
                    setcookie("basket[type]", $subType, time()+ 3600);
                }

                if($basket == null)
                {
                    echo "<script>
                            $(function() 
                            {
                                $('#basketHeading').append('<strong> порожня</strong>');

                                $('#basketTable').remove();
                                $('#aCheckout').remove();
                            }) 
                          </script>";
                }
                else
                {
                    $total = 0;
                    foreach ($basket as $key => $item)
                    {
                        $price = $item["price"];
                        $qty = $item["qty"];
                        $total = $total + ($price * $qty);
                    }
                    $shippingCost = 50;
                    define("VATRATE", 0.2);
                    $vat = VATRATE * $total;
                    $grandTotal = $total + $shippingCost + $vat;
                    echo "<tr class='trEmptySpace'><td colspan='5'></td></tr> ";
                    echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  Вартість за товари:       </td>  <td class='tdEndData'>&nbsp;&nbsp;$total  грн.         </td>  </tr>";

                    echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  Вартість доставки:  </td>  <td class='tdEndData'>&nbsp;&nbsp;$shippingCost  грн.  </td>  </tr>";

                    echo "<tr>  <td colspan='2'></td>  <td class='tdEnd' colspan='2'>  ПДВ:            </td>  <td class='tdEndData'>&nbsp;&nbsp;$vat  грн.           </td>  </tr>";

                    echo "<tr>  <td colspan='2'></td>  <td class='tdGrandTotal' colspan='2'>  Загальна вартість покупки:    </td>  <td class='tdGrandTotalData'>&nbsp;&nbsp;$grandTotal  грн.    </td>  </tr>";
                }
                ?>
            </table>
            <div id="checkOutDiv">
            <?php
                if(sizeof($_SESSION["basket"])!=0)
                echo 
                '<a id="aContinueShop" href="prodList.php">Продовжити покупки</a>';
                else
                echo '<a id="aContinueShop" style="margin-left: 40%; margin-top: 100px;" href="prodList.php">Продовжити покупки</a>';
                echo '<a id="aCheckout" style="margin-right: 4.1%;" href="checkout.php">Оформити замовлення</a>';
                    
                ?>

            </div>

        </div>
            
<?php include "footer.php"?>
        </div>
    </body>
</html>
<?php ob_flush(); ?>

