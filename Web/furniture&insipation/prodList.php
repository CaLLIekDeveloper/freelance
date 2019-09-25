<?php
session_start();
if (!isset($_SESSION["basket"])) {
    $basket = array();
    $_SESSION["basket"] = $basket;
}
require_once("php/connect.php");
require_once("php/function.php");


?>
<!DOCTYPE html>
<html>
<head>
    <?php
    $prodType = "0";
    if(isset($_POST['prodType']))
    {
        $prodType = $_POST['prodType'];
    }
    $prodProducer = "0";
    if(isset($_POST['prodProducer']))
    {
        $prodProducer = $_POST['prodProducer'];
    }
    $title = "";
    $image1 = "";
    $image2 = "";

    ?>
    <title>Список продуктів</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="css/pagination.css" rel="stylesheet" type="text/css" />
    <link href="css/grey.css" rel="stylesheet" type="text/css" />

    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <link href="css/prodList.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div id="container">

        <?php include "header.php" ?>

        <div id="prodListDiv">
            <div id="BG">
                <h2> Товари </h2>
            </div>




            <div class="selection">
                <form class="form-inline col-md-12 wow fadeInDown animated" action="prodList.php" method="post">
                    <div class="table-responsive cart_info">
                        <table class="table table-condensed" style="height:10px; text-align: center;">
                            <thead>
                                <tr class="cart_menu" style="margin-left: 20px;">
                                    <td class="price"></td>
                                    <td class="image" style="margin-left: 20px;">Тип товару</td>
                                    <td class="image">Виробник</td>
                                    <td class="description">Вікова категорія</td>
                                    <td class="price">Сортування</td>
                                    <td class="price"></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cart_product1">
                                        <input id="btnUpdate" type="submit" style="visibility: hidden;" value="Пошук" />
                                    </td>

                                    <td class="cart_product1">
                                        <select id="soflow" name="prodType">
                                            <option value="0">Тип товару</option>
                                            <?php
                                            $query = "SELECT * FROM type";
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
                                                    if($rowNumber==$prodType)
                                                    echo "<option value=$rowNumber selected>$name</option>";
                                                    else
                                                    echo "<option value=$rowNumber>$name</option>";
                                                    $fetchedRow = mysqli_fetch_row($resultSet);
                                                }
                                            }
                                            ?>
                                            </select>
                                        </td>

                                        <td class="cart_product1">
                                            <select id="soflow" name="prodProducer">
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
                                                    if($rowNumber==$prodProducer)
                                                    echo "<option value=$rowNumber selected>$name</option>";
                                                    else
                                                    echo "<option value=$rowNumber>$name</option>";
                                                    $fetchedRow = mysqli_fetch_row($resultSet);
                                                }
                                            }
                                            ?>
                                            </select>
                                        </td>
                                        <td class="cart_product1">
                                            <select id="soflow" name="select_age">
                                                <option value="0">Вік</option>
                                                <option value="1" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "1") echo 'selected'; ?>>0 - 3р.</option>
                                                <option value="2" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "2") echo 'selected'; ?>>3 - 6р.</option>
                                                <option value="3" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "3") echo 'selected'; ?>>6 - 9р.</option>
                                                <option value="4" <?php if (isset($_POST["select_age"])) if ($_POST["select_age"] == "4") echo 'selected'; ?>>9 - 14р.</option>
                                            </select>
                                        </td>

                                        <td class="cart_price">
                                            <select id="soflow" name="select_sort">
                                                <option value="1">Сортування</option>
                                                <option value="2" <?php if (isset($_POST["select_sort"])) if ($_POST["select_sort"] == "2") echo 'selected'; ?>>Від дешевих до дорогих</option>
                                                <option value="3" <?php if (isset($_POST["select_sort"])) if ($_POST["select_sort"] == "3") echo 'selected'; ?>>Від дорогих до дешевих</option>
                                                <option value="4" <?php if (isset($_POST["select_sort"])) if ($_POST["select_sort"] == "4") echo 'selected'; ?>>Новинки</option>
                                                <option value="5" <?php if (isset($_POST["select_sort"])) if ($_POST["select_sort"] == "5") echo 'selected'; ?>>Від А - Я</option>
                                                <option value="6" <?php if (isset($_POST["select_sort"])) if ($_POST["select_sort"] == "6") echo 'selected'; ?>>Від Я - А</option>
                                            </select>

                                        </td>
                                        <td class="cart_total">
                                            <input id="btnUpdate" type="submit" name="btnSelect" value="Пошук" />
                                        </td>
                                        <td class="cart_product1">
                                            <input id="btnUpdate1" type="submit" style="visibility: hidden;" value="Пошук" />
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </form>
                    
                </div>






                <br>
                <br>
                <br>
                <div id="prodListDiv">
                    <?php
                    if (isset($_GET["txtSearch"])) {
                        $value = $_GET["txtSearch"];

                        $value = trim($value);
                        $value = htmlspecialchars($value);

                        $query = "SELECT * FROM product WHERE prodName = '$value'";
                        $resultSet = $connect->mysqli->query($query);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запит $query>");
                        $fetchedRow = mysqli_fetch_row($resultSet);
                        if ($fetchedRow != null) {
                            $id = $fetchedRow[0];
                            echo '<script>location.replace("prodInfo.php?prodId=' . $id . '");</script>';
                            exit;
                        }
                        $querySearch = "SELECT * FROM product WHERE prodName LIKE '%$value%'";
                        $statementSearch = "FROM product WHERE prodName LIKE '%$value%'";
                    }

                    $limit = 9;
                    $page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);

                    $startpoint = ($page * $limit) - $limit;

                    
                    $query = "SELECT * FROM product where prodProd='0'";
                    $statement = "FROM product where prodProd='0'";
                    $queryLimit = "SELECT * FROM product where prodProd='0' LIMIT {$startpoint} , {$limit}";

                    if (isset($_GET["txtSearch"])) {
                        $query = $querySearch;
                        $statement = $statementSearch;
                        $queryLimit = "SELECT * FROM product WHERE prodName LIKE '%$value%' LIMIT {$startpoint} , {$limit}";
                    } else if (isset($_POST["btnSelect"])) {
                        if (isset($_POST["select_age"])) {
                            $age = $_POST["select_age"];
                            if ($age == "0") $query_add_age = "";
                            else
                                $query_add_age = "AND prodAge= '$age'";
                        }

                        if (isset($_POST["select_sort"])) {
                            $sort = $_POST["select_sort"];
                            $query_add_sort = "";
                            if ($sort == "2") {
                                $query_add_sort = "ORDER BY price ASC";
                            }

                            if ($sort == "3") {
                                $query_add_sort = "ORDER BY price DESC";
                            }

                            if ($sort == "4") {
                                $query_add_sort = "ORDER BY prodId DESC";
                            }
                            if ($sort == "5") {
                                $query_add_sort = "ORDER BY prodName ASC";
                            }
                            if ($sort == "6") {
                                $query_add_sort = "ORDER BY prodName DESC";
                            }
                        }
                        if (isset($_POST["prodType"])) {
                            if($_POST["prodType"]!="0")
                            $query_add_type = "AND type = '$prodType'";
                            else
                            $query_add_type = "";
                        }

                        if (isset($_POST["prodProducer"])) {
                            if($_POST["prodProducer"]!="0")
                            $query_add_prodProducer = "AND prodProducer = '$prodProducer'";
                            else
                            $query_add_prodProducer = "";
                        }
                        
                        
                        
                        $query = "SELECT * FROM product WHERE prodProd='0' $query_add_type $query_add_prodProducer $query_add_age $query_add_sort";
                        $queryLimit = "SELECT * FROM product WHERE prodProd='0' $query_add_type  $query_add_prodProducer $query_add_age $query_add_sort LIMIT {$startpoint} , {$limit} ";

                        $page = 1;
                        if(isset($_GET["page"]))
                        {
                            unset($_GET['page']);
                        }

                    }


                    $resultSet = $connect->mysqli->query($query);
                    $num_rows = mysqli_num_rows($resultSet);
                    if ($num_rows > $limit) {
                        echo '<div id="paginationBoxDiv">
                    <div id="paginationDiv" >';
                        echo pagination($statement, $limit, $page, "?prodType=$prodType&amp;",$connect);
                        echo '</div>
                </div>';
                    }
                    ?>

                    <table id="productTable">
                        <?php
                        $resultSet = $connect->mysqli->query($queryLimit);
                        if (!$resultSet) die("<Помилка: Неможливо виконати запрос $queryLimit>");
                        $fetchedRow = mysqli_fetch_row($resultSet);

                        if ($fetchedRow == null) {
                            echo '<div class="center_text"><h1 style="text-align: center; color: red;">На жаль товару з такими параметрами немає у БД</h1></div>';
                        } else {
                            for ($rowNumber = 0; $rowNumber < 3; $rowNumber++) {
                                if ($fetchedRow == null) break;
                                echo "<tr>";
                                for ($columnNumber = 0; $columnNumber < 3; $columnNumber++) {
                                    if ($fetchedRow == null) {
                                        echo "<td></td>";
                                    } else {
                                        $id = $fetchedRow[0];
                                        $name = $fetchedRow[1];
                                        $imageName = $fetchedRow[2];
                                        $price = $fetchedRow[6];
                                        $displayImage = "<img src='css/images/products/$imageName' width='50%' height='200px' alt='tableImage'/>";
                                        echo " <td><a href='prodInfo.php?prodId=$id'> $displayImage <p style='color: #1ab188;'><span class='price' style='color: red;' >$price грн.</span><br> $name </p></a></td> ";
                                        $fetchedRow = mysqli_fetch_row($resultSet);
                                    }
                                }
                                echo "</tr>";
                            }
                        }
                        ?>
                    </table>

                    <?php

                    $resultSet = $connect->mysqli->query($query);

                    $num_rows = mysqli_num_rows($resultSet);
                    if ($num_rows > $limit) {

                        echo '<br><div id="paginationBoxDiv">
                    <div id="paginationDiv" >';
                        echo pagination($statement, $limit, $page, "?prodType=$prodType&amp;",$connect);
                        echo '</div>
                </div>';
                    }
                    ?>


                </div>
                <?php include "footer.php" ?>
            </div>
        </div>
    </body>

    </html>