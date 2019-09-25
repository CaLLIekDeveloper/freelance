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
        <title>Інформація про продукт</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="css/prodInfo.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript">
            function checkQty()
            {
                var frmAddToBasket = document.getElementById("frmAddToBasket");
                var qty = frmAddToBasket.txtQty.value;

                if (isEmpty(qty) || qty == 0)
                {
                    alert("Будь ласка введіть кількість!");
                    return false;
                }

                if (!isInteger(qty))
                {
                    alert("Будь ласка введіть ціле число!");
                    return false;
                }

                if (qty < 0)
                {
                    alert("Будь ласка введіть число більше нуля!")
                    return false;
                }
                
                if (qty > 10)
                {
                    alert("Будь ласка зверніться до відділу продажу при замовленні кількості товару більше  10!")
                    return false;
                }
                
            }
        </script>
    </head>
    
    <body>
        <div id="container">
        <?php include "header.php"?>
            <div id="prodInfoBoxDiv" >
                <div id="addNotificaiton" style="margin-left: 20px;">
                    <h3><img src="css/images/rightSign.png" width="20" height="20" alt="rightSign"/>
                        Товар додано до вашої корзини!</h3>
                </div>
                <?php
                include_once ("php/connect.php");
                $prodId = null;
                if (isset($_GET["prodId"]))
                {
                    $prodId = $_GET["prodId"];
                }
                if (isset($_GET["itemAdded"]))
                {
                    echo " <script> 
                        $(function() 
                            {
                                $('#addNotificaiton').slideDown();
                            })
                       </script>";
                }
                $query = "SELECT * FROM product where prodId='$prodId'";   
                $resultSet = $connect->mysqli->query($query);
                if (!$resultSet) die("<ERROR: Cannot execute $query>");
                $fetchedRow = mysqli_fetch_assoc($resultSet);
                if ($fetchedRow == null)    
                {
                    echo "  <div id='infoNotFoundThickLine'></div>
                            <div id='prodNotFoundDiv'> 
                                <h3>Пробачте ми не знайшли продукт котрий ви шукали...</h3> 
                                <h5>Can't find what you are looking for? Contact our sales assisstants.</h5>
                                <a id='aContinueShop' href='index.php'>Продовжити покупки</a>
                            </div>";
                }
                else
                {
                    $id = $fetchedRow["prodId"];
                    $name = $fetchedRow["prodName"];
                    $imgName = $fetchedRow["prodImage"];
                    $prodDesc = $fetchedRow["prodDesc"];
                    $type = $fetchedRow["type"];
                    $price = $fetchedRow["price"];
                    $BigImgNames = $fetchedRow["bigImageNames"];
                    $bigImgNamesArray = explode(":", $BigImgNames);
                    $bigImageArraySize = sizeof($bigImgNamesArray);
                    $prodCharacteristic = $fetchedRow["prodCharacteristic"];
                    echo "  
                            <div id='imgDivBg'>
                                <div id='imgDiv'>
                                    <h2>$name</h2>
                                    <div id='prodSlides'>";
                    for ($i = 0; $i < $bigImageArraySize; $i++)
                    {
                        if ($i == 0) {
                            $className = "firstProdSlide";
                        }
                        else {
                            $className = "otherProdSlides";
                        }
                        echo "<img class='$className' src='css/images/products/$bigImgNamesArray[$i]' alt='Big $type image'/>";
                    }
                    echo "</div>";
                    
                    echo "<ul id='prodThumbs'></ul>";
                    
                    echo "</div>";
                    
                    echo "</div>";
                    $descArray = explode("!!stop!!", $prodDesc);
                    echo "<div id='prodDescDiv'>
                        <div id='descDiv1'>
                        <h4>Опис</h4>
                            $descArray[0]
                        <hr class='thinLine'/>
                        
                        ";
                    echo "<form id='frmAddToBasket' method='post'> 
                    <p style='font-size: 13px; color:red;'>
                                  Ціна $price грн.
                                  <input type='text' name='txtQty' value='1'/> 
                                  <input type='submit' name='btnAddToBasket' value='Додати до корзини' onclick='return checkQty();'/> 
                              </p>
                          </form>";
                    echo "
                    <hr class='thinLine'/>
                    <h4>Характеристика товару</h4>
                    <p>
                    ".$prodCharacteristic."
                    </p>
                    <hr/>
                    
                </div>
            </div> 
                    ";

                    if (isset($_POST["btnAddToBasket"]))
                    {
                        $basket = $_SESSION["basket"];
                        $qty = $_POST["txtQty"];
                        $item = array("id" => $id, "name" => $name, "price" => $price, "qty" => $qty, "imageName" => $imgName, "type" => $type);

                        $itemFound = false;
                        $size = sizeof($basket);
                        $i = 0;
                        while ($i < $size && !$itemFound)
                        {
                            $oldId = $basket[$i]["id"];
                            if ($id == $oldId)
                            {
                                $oldQty = $basket[$i]["qty"];
                                $basket[$i]["qty"] = $oldQty + $qty;
                                $itemFound = true;
                            }
                            $i++;
                        }
                        if (!$itemFound)
                        {
                            $basket[] = $item;
                        }

                        $_SESSION["basket"] = $basket;
                        
                        $setId = "";
                        $setName = "";
                        $setPrice = "";
                        $setQty = "";
                        $setImageName = "";
                        $setType = "";

                        $sessionSize = sizeof($_SESSION["basket"]);

                        for ($i = 0; $i < $sessionSize; $i++)
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
                        
                        header("Location: prodInfo.php?prodId=" . $id . "&itemAdded=added");
                    }
                }
                ?>
            </div>
<?php include "footer.php"?>
            
        </div>
    </body>
</html>
<?php ob_flush(); ?>