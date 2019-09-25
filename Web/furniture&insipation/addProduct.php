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
	$type ="bed";
	
	$prodImage = 'none.png';
	$bigImageNames = 'none.png';
	
	if (isset($_POST["price"])) {
		$price = $_POST["price"];
	} else {
		$price = 0;
	}
	
	if (isset($_POST["prodCharacteristic"])) {
		$prodCharacteristic = $_POST["prodCharacteristic"];
	} else {
		$prodCharacteristic = "";
	}
	
	if (isset($_POST["prodDesc"])) {
		$prodDesc = $_POST["prodDesc"];
	} else {
		$prodDesc = "";
	}
	
	if (isset($_POST["prodName"])) {
		$prodName = $_POST["prodName"];
	} else {
		$prodName = "";
	}
	if (isset($_POST["prodType"])) {
		$prodType = $_POST["prodType"];
	} else {
		$prodType = "";
	}
	
	if (isset($_POST["prodProducer"])) {
		$prodProducer = $_POST["prodProducer"];
	} else {
		$prodProducer = "";
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Додати продукт</title>
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
// Пути загрузки файлов
$path = 'css/images/products/';
$tmp_path = 'tmp/';
// Массив допустимых значений типа файла
$types = array('image/png', 'image/jpeg');
// Максимальный размер файла
$size = 8024000;

// Обработка запроса
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
	// Проверяем тип файла
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
			$quality = 75;

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

	$statement = "SELECT * FROM product ORDER BY prodId ASC";
	$resultSet = $connect->mysqli->query($statement);
	$num_rows = mysqli_num_rows($resultSet);
	$fetchedRow = mysqli_fetch_row($resultSet);
	$id = $fetchedRow[0];
	for($i = 0; $i<$num_rows; $i++)
	{
		$fetchedRow = mysqli_fetch_row($resultSet);
		if($fetchedRow==nuLL)break;
		$id = $fetchedRow[0];
	}
	$id++;
	$new_Name = 'product'.($id).'.jpg';
	if (!@copy($tmp_path . $name, $path . $new_Name))
		echo '<p>Щось пішло не так.</p>';
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
	else
	$prodImage = 'none.png';
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
                        /////////////////// END OF UERY EMAIL EXISTS ///////////

                        if ($fetchedRow != null)
                        {
                            echo '<script> alert("Помилка: Неможливо додати товар оскільки товар з таким іменем вже є у БД"); </script>';
                        }
                        else
                        {
							$bigImageNames = $prodImage;
							$prodAge = $_POST['select_age'];
							$createQuery = "INSERT INTO product(prodName, prodImage, prodDesc, prodCharacteristic, type, price, bigImageNames,prodAge, prodProducer) 
							VALUES ('$prodName', '$prodImage', '$prodDesc', '$prodCharacteristic', '$prodType', '$price', '$bigImageNames','$prodAge','$prodProducer')";
                            $createResult = $connect->mysqli->query($createQuery);
                            if (!$createResult) die("<Помилка: Неможливо виконати запит $createQuery>");
							echo '<script> alert("Товар успішно додано до БД"); </script>';
							echo '<script>location.replace("addProduct.php");</script>'; exit;
						}
					}
					
}

?>
		
		<label for="files" class="btn"  >Обрати зображення</label> <input style="margin-top: 140px;" name="btnAddImage" type="submit" value="Завантажити">
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
								<option value="1" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "2") echo 'selected'; ?>>0 - 3р.</option>
								<option value="2" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "3") echo 'selected'; ?>>3 - 6р.</option>
								<option value="3" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "4") echo 'selected'; ?>>6 - 9р.</option>
								<option value="4" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "5") echo 'selected'; ?>>9 - 14р.</option>
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
					<input name="btnAddProduct" type="submit" style="margin-left: 50px;" value="Додати товар до БД">
				</div>
				
			</div> 
			</form>
                                </div>
<?php include "footer.php"?>
            
        </div>
    </body>
</html>
<?php ob_flush(); ?>