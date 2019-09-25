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
    
    if(isset($_POST["hidIdUpdate"]))
    {
        $prodId = $_POST["hidIdUpdate"];
        $query = "SELECT * FROM product where prodId='$prodId'";   
        $resultSet = $connect->mysqli->query($query);
        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
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
            $prodName = $fetchedRow["prodName"];
            $prodImage = $fetchedRow["prodImage"];
            $prodDesc = $fetchedRow["prodDesc"];
            $prodCharacteristic = $fetchedRow["prodCharacteristic"];
            $prodType = $fetchedRow["type"];
			$price = $fetchedRow["price"];
			$prodAge = $fetchedRow["prodAge"];
			$prodProducer = $fetchedRow["prodProducer"];
            $BigImgNames = $fetchedRow["bigImageNames"];
            $bigImgNamesArray = explode(":", $BigImgNames);
            $bigImageArraySize = sizeof($bigImgNamesArray);
            echo '<input id="prodImage" name="prodImage" type="hidden" value="'.$prodImage.'">';
            
        }
    }

	if (isset($_POST["select_age"])) {
		$prodAge = $_POST["select_age"];
	} 

	if (isset($_POST["price"])) {
		$price = $_POST["price"];
	} 
	
	if (isset($_POST["prodCharacteristic"])) {
		$prodCharacteristic = $_POST["prodCharacteristic"];
	} 
	
	if (isset($_POST["prodDesc"])) {
		$prodDesc = $_POST["prodDesc"];
	} 
	
	if (isset($_POST["prodName"])) {
		$prodName = $_POST["prodName"];
    } 
    
    if (isset($_POST["prodImage"])) {
		$prodImage = $_POST["prodImage"];
	} 

	if (isset($_POST["prodType"])) {
		$prodType = $_POST["prodType"];
	}
	
	if (isset($_POST["prodProducer"])) {
		$prodProducer = $_POST["prodProducer"];
	} 
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Оновити продукт</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        
        <link href="css/home.css" rel="stylesheet" type="text/css"/>
        <link href="css/prodInfo.css" rel="stylesheet" type="text/css"/>
        <link href="css/addProduct.css" rel="stylesheet" type="text/css"/>

        
    </head>
    
    <body>
        <div id="container">
        <?php include "header.php"?>
<div id="prodInfoBoxDiv">
                <div id="addNotificaiton">
                    <h3><img src="css/images/rightSign.png" width="20" height="20" alt="rightSign">
                        Товар додано до вашої корзини!</h3>
                </div>
                <form method="post" enctype="multipart/form-data">
                <?php echo '<input type="hidden" name="hidIdUpdate" value="'.$prodId.'"/>';?>
                            <div id="imgDivBg">
                                <div id="imgDiv">
								<div>Тип продукту:
							<select id="soflow" name="prodType">
								<?php
								$query = "SELECT * FROM type";
								$resultSet = $connect->mysqli->query($query);
								$num_rows = mysqli_num_rows($resultSet);
								$fetchedRow = mysqli_fetch_row($resultSet);
								for ($rowNumber = 1; $rowNumber <= $num_rows; $rowNumber++) {
									if ($fetchedRow == null) {
										break;
									} else {
										$id = $fetchedRow[0];
										$name = $fetchedRow[1];
										if ($rowNumber == $prodType)
											echo "<option value=$rowNumber selected>$name</option>";
										else
											echo "<option value=$rowNumber>$name</option>";
										$fetchedRow = mysqli_fetch_row($resultSet);
									}
								}
								?>
							</select>
						</div>
                                    <h2>Назва продукту: </h2>
                                    <input name="prodName" placeholder="Введіть назву продукту" type="text" style="width: 100%; margin-left: 0px; margin-bottom: 10px;" name="txtCardNo" value="<?php echo $prodName ;?>"/>
                                    <div id="prodSlides"><img id="my_image" class="firstProdSlide" src="css/images/products/<?php echo $prodImage ;?>" alt="Big bed image"></div>
                                    <ul id="prodThumbs"></ul>
								</div>
<?php
if (isset($_POST["btnAddImage"]))
{
$path = 'css/images/products/';
$tmp_path = 'tmp/';
$types = array('image/png', 'image/jpeg');
$size = 8024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	if (!in_array($_FILES['picture']['type'], $types))
		die('<p>Забороненний тип файла. <a href="?">Спробувати інший файл?</a></p>');

	// Проверяем размер файла
	if ($_FILES['picture']['size'] > $size)
		die('<p>Занадто великий розмір файлу. <a href="?">Спробувати інший файл?</a></p>');

	// Функция изменения размера
	// Изменяет размер изображения в зависимости от type:
	//	type = 1 - эскиз
	// 	type = 2 - большое изображение
	//	rotate - поворот на количество градусов (желательно использовать значение 90, 180, 270)
	//	quality - качество изображения (по умолчанию 75%)
	function resize($file, $type = 1, $rotate = null, $quality = null)
	{
		global $tmp_path;

		// Ограничение по ширине в пикселях
		$max_thumb_size = 200;
		$max_size = 600;
	
		// Качество изображения по умолчанию
		if ($quality == null)
			$quality = 100;

		// Cоздаём исходное изображение на основе исходного файла
		if ($file['type'] == 'image/jpeg')
			$source = imagecreatefromjpeg($file['tmp_name']);
		elseif ($file['type'] == 'image/png')
			$source = imagecreatefrompng($file['tmp_name']);
		elseif ($file['type'] == 'image/gif')
			$source = imagecreatefromgif($file['tmp_name']);
		else
			return false;
			
		// Поворачиваем изображение
		if ($rotate != null)
			$src = imagerotate($source, $rotate, 0);
		else
			$src = $source;

		// Определяем ширину и высоту изображения
		$w_src = imagesx($src); 
		$h_src = imagesy($src);

		// В зависимости от типа (эскиз или большое изображение) устанавливаем ограничение по ширине.
		if ($type == 1)
			$w = $max_thumb_size;
		elseif ($type == 2)
			$w = $max_size;

		// Если ширина больше заданной
		if ($w_src > $w)
		{
			// Вычисление пропорций
			$ratio = $w_src/$w;
			$w_dest = round($w_src/$ratio);
			$h_dest = round($h_src/$ratio);

			// Создаём пустую картинку
			$dest = imagecreatetruecolor($w_dest, $h_dest);
			
			// Копируем старое изображение в новое с изменением параметров
			imagecopyresampled($dest, $src, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);

			// Вывод картинки и очистка памяти
			imagejpeg($dest, $tmp_path . $file['name'], $quality);
			imagedestroy($dest);
			imagedestroy($src);

			return $file['name'];
		}
		else
		{
			// Вывод картинки и очистка памяти
			imagejpeg($src, $tmp_path . $file['name'], $quality);
			imagedestroy($src);

			return $file['name'];
		}
	}

	$name = resize($_FILES['picture'], $_POST['file_type'], $_POST['file_rotate']);

    // Загрузка файла и вывод сообщения
    
	$new_Name = 'product'.($prodId).'.jpg';
	if (!@copy($tmp_path . $name, $path . $new_Name))
		echo '<p>Что-то пошло не так.</p>';
	else
	{
		$_POST['img'] = $path.$new_Name;
		echo '<input id="prodImage" name="prodImage" type="hidden" value="'.$new_Name.'">';
		echo "<script>
		$(function() 
                                    {
                                        $('#my_image').attr('src','$path$new_Name.')
                                    }) 
		</script>"
		;
	}
		

	// Удаляем временный файл
	unlink($tmp_path . $name);
}}
if (isset($_POST["btnAddProduct"]))
{
	if(isset($_POST["prodImage"]))
	$prodImage = $_POST["prodImage"];
	if($prodName=="" || $prodDesc=="" || $prodCharacteristic=="" || $price=="")
	{
		echo '<script> alert("Заповніть данні"); </script>';	
    }
    else if($prodImage=='none.png'){echo '<script> alert("Завантажте фото продукту"); </script>';}
	else
	{
	$query = "SELECT * FROM product where prodName='$prodName'";   
                        $resultSet = $connect->mysqli->query($query);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                        $fetchedRow = mysqli_fetch_assoc($resultSet);


							$bigImageNames = $prodImage;
							$prodAge = $_POST['select_age'];

							$prodName = mysqli_real_escape_string($connection,trim($prodName));
							$prodDesc = mysqli_real_escape_string($connection,trim($prodDesc));
							$prodCharacteristic = mysqli_real_escape_string($connection,trim($prodCharacteristic));

                            $createQuery = "UPDATE product
                                             SET prodName = '$prodName', 
                                                 prodImage = '$prodImage',
                                                 prodDesc = \"".$prodDesc."\", 
                                                 prodCharacteristic = '$prodCharacteristic', 
                                                 type = '$prodType', 
                                                 price = '$price',
												 prodAge = '$prodAge', 
												 prodProducer = '$prodProducer',
                                                 bigImageNames = '$bigImageNames'
                                                 where prodId = '$prodId'";
                            $createResult = $connect->mysqli->query($createQuery);
                            if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery>");
                            echo '<script> alert("Товар успішно оновлено у БД"); </script>';
						
					}
					
}

?>
		
		<label for="files" class="btn"  >Обрати зображення</label> <input style="margin-top: 130px;"  name="btnAddImage" type="submit" value="Завантажити">
			<input id="files" style="display: none;" type="file" name="picture">
			<br>
			<select name="file_type" style="display: none;">
				<option value="1">Большое изображение</option>
			</select>
			<input type="text" name="file_rotate" style="display: none;" value="0">
                            </div>
                            <div id="prodDescDiv">      
                        <div id="descDiv1">
						<div>Вікова категорія:
						<select id="soflow" name="select_age" style="margin-left: 10px;">
                                    <option value="1" <?php if($prodAge=="1") echo 'selected' ;?>>0 - 3р.</option>
                                    <option value="2" <?php if($prodAge=="2") echo 'selected' ;?>>3 - 6р.</option>
                                    <option value="3" <?php if($prodAge=="3") echo 'selected' ;?>>6 - 9р.</option>
                                    <option value="4" <?php if($prodAge=="4") echo 'selected' ;?>>9 - 14р.</option>
                                </select>
									</div>

									<div>Виробник:
						<select id="soflow" name="prodProducer" style="margin-left: 55px;>
							<option value="0">Виробник</option>
							<?php
							$query = "SELECT * FROM producer";
							$resultSet = $connect->mysqli->query($query);
							$num_rows = mysqli_num_rows($resultSet);
							$fetchedRow = mysqli_fetch_row($resultSet);
							for ($rowNumber = 1; $rowNumber <= $num_rows; $rowNumber++) {

								if ($fetchedRow == null) {
									break;
									echo "<td></td>";
								} else {
									$id = $fetchedRow[0];
									$name = $fetchedRow[1];
									if ($rowNumber == $prodProducer)
										echo "<option value=$rowNumber selected>$name</option>";
									else
										echo "<option value=$rowNumber>$name</option>";
									$fetchedRow = mysqli_fetch_row($resultSet);
								}
							}
							?>
						</select>
						</div>
                        <h4>Опис</h4>
                        <textarea name="prodDesc" placeholder="Значення опису за замовчуванням"><?php echo $prodDesc ;?></textarea>
                        <hr class="thinLine">
                        Ціна:<input  name="price" type="text" style="width: 60px; margin-left: 10px;" name="txtCardNo" value="<?php echo $price ;?>"/>
                    <hr class="thinLine">
                    <h4>Введіть характеристику товару</h4>
                    <textarea name="prodCharacteristic" placeholder="Значення характеристики за замовчуванням"><?php echo $prodCharacteristic ;?></textarea>
					<hr>
					<input name="btnAddProduct" type="submit" style="margin-left: 50px;" value="Оновити інформацію про товар у БД">
				</div>
				
			</div> 
			</form>
                                </div>
<?php include "footer.php"?>
            
        </div>
    </body>
</html>
<?php ob_flush(); ?>