<?php
    session_start();
    if (isset($_COOKIE["basket"]))
    {
        foreach ($_COOKIE["basket"] as $name => $value)
        {
            if ($name == "id"){ $ids = explode(":", $value);}
            if ($name == "name"){ $names = explode(":", $value);}
            if ($name == "price"){ $prices = explode(":", $value);}
            if ($name == "qty"){ $qtys = explode(":", $value);}
            if ($name == "imageName"){ $imageNames = explode(":", $value);}
            if ($name == "type"){ $type = explode(":", $value);}
        }
        $sizeIds = sizeof($ids);
        for ($i = 0; $i <  $sizeIds; $i++)
        {
            $basket[] = array("id" => $ids[$i], "name" => $names[$i], "price" => $prices[$i], "qty" => $qtys[$i], "imageName" => $imageNames[$i], "type" => $type[$i]);
        }
        $_SESSION["basket"] = $basket;
        
    }
    else if (!isset($_SESSION["basket"]))
    {
        $basket = array();
        $_SESSION["basket"] = $basket;
    }
    include_once ("php/connect.php");
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Головна сторінка</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/home.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-slider1.css">
    <link rel="stylesheet" href="css/img.css">
    </head>
<body>
        <div id="containerDiv">
<?php include "header.php"?>

<div class="slider">
  	<div class="item">
        <img src="css/images/slide1.jpg" alt="Первый слайд">
        <div class="slideText">Дитячі меблі для новонародженних</div>
    </div>

    <div class="item">
        <img src="css/images/slide2.jpg" alt="Второй слайд">
        <div class="slideText">Дитячі меблі для дівчат</div>
    </div>

    <div class="item">
        <img src="css/images/slide3.jpg" alt="Третий слайд">
        <div class="slideText">Дитячі меблі для хлопців</div>
    </div>

  	<a class="prev" onclick="minusSlide()">&#10094;</a>
  	<a class="next" onclick="plusSlide()">&#10095;</a>
</div>
<br>

<div class="slider-dots">
	<span class="slider-dots_item" onclick="currentSlide(1)"></span> 
  	<span class="slider-dots_item" onclick="currentSlide(2)"></span> 
  	<span class="slider-dots_item" onclick="currentSlide(3)"></span> 
</div>
	
<script src="js/script.js"></script>	

         

<?php 
                $query = "SELECT * FROM product";              
                $resultSet = $connect->mysqli->query($query);
                $num_rows = mysqli_num_rows($resultSet);
                if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                $fetchedRow = mysqli_fetch_row($resultSet);
                $i = 0;
                
                if($num_rows<3)
                {
                    $id = $fetchedRow[0];
                    $name = $fetchedRow[1];
                    $imgName = $fetchedRow[2];
                    $price = $fetchedRow[6]; 
                }
                
                while($i != $num_rows-2)
                {

                if ($fetchedRow == null)  
                {
                    break;
                }

                $id = $fetchedRow[0];
                $name = $fetchedRow[1];
                $imgName = $fetchedRow[2];
                $price = $fetchedRow[6];
                $fetchedRow = mysqli_fetch_row($resultSet);
                $i++;
            }
?>

<section class="new-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="titie-section wow fadeInDown animated  animated" style="visibility: visible;">
                            <h1>Нові товари</h1>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-left: 0px; width: 100%;  margin-right: 0px;">
                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s; width=200px; margin-left: 0px;">
                    <?php echo "
                            <a href=\"prodInfo.php?prodId=$id\">
                            ";?>     
                    <div class="product-item" style="width: 350px; height: 300px; margin-left: 0px; margin-right: 150px;">
                        <?php echo "
                            <img src=\"css/images/products/$imgName\" style=\"width: 100%; height: 100%;\" alt=\"\">
                            ";?>
                            <div class="product-title" style=" height: 50px;">
                                    <h3 style="width: 200px; height: 250px;"><?php echo $name ?></h3>
                                    <span style=" height: 50px;"><?php echo $price ?></span>
                            </div>
                        </div>
        </a>
                    </div>
                    <?php   
                            
                            if ($fetchedRow != null) {
                            $id = $fetchedRow[0];
                            $name = $fetchedRow[1];
                            $imgName = $fetchedRow[2];
                            $price = $fetchedRow[6];
                            $fetchedRow = mysqli_fetch_row($resultSet);
                            }
                ?>
                    <div class="row" style="margin-left: 0px; width: 100%;  margin-right: 0px;">
                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s; width=200px; margin-left: 0px;">
                    <?php echo "
                            <a href=\"prodInfo.php?prodId=$id\">
                            ";?>     
                    <div class="product-item" style="width: 350px; height: 300px;  margin-left: 0px; margin-right: 150px;">
                        <?php echo '
                            <img src="css/images/products/'.$imgName.'"  alt="" style="width: 100%; height: 100%;">
                            ';?>
                            <div class="product-title" style=" height: 50px;">
                                    <h3 style="width: 200px; height: 250px;"><?php echo $name ?></h3>
                                    <span style=" height: 50px;"><?php echo $price ?></span>
                                
                            </div>
                           
                        </div>
                        </a>
                    </div>
                    <?php                               
                    if ($fetchedRow != null) {
                            $id = $fetchedRow[0];
                            $name = $fetchedRow[1];
                            $imgName = $fetchedRow[2];
                            $price = $fetchedRow[6];
                            $fetchedRow = mysqli_fetch_row($resultSet);
                            }
                ?>
                    <div class="row" style="margin-left: 0px; width: 100%;  margin-right: 0px;">
                    <div class="col-md-4 col-sm-6 wow fadeInLeft animated animated" data-wow-delay="0.2s" style="visibility: visible;-webkit-animation-delay: 0.2s; -moz-animation-delay: 0.2s; animation-delay: 0.2s; width=200px; margin-left: 0px;">
                    <?php echo "
                            <a href=\"prodInfo.php?prodId=$id\">
                            ";?>    
                    <div class="product-item" style="width: 350px; height: 300px; margin-left: 0px; margin-right: 150px;">
                        <?php echo "
                            <img src=\"css/images/products/$imgName\" class=\"img-index\" style=\"width: 100%; height: 100%;\" alt=\"\">
                            ";?>
                            
                            <div class="product-title" style=" height: 50px;">
                                    <h3 style="width: 200px; height: 250px;"><?php echo $name ?></h3>
                                    <span style=" height: 50px;"><div style="margin-top:1px;"><?php echo $price ?></div></span>
                            </div>
                            
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

		<?php include "footer.php"?>
    </div>
</body>
</html>
