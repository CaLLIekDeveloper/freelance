<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
        <div id="preloader">
            <div class="preloader-area">
                <div class="preloader-box">
                    <div class="preloader"></div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="css/style.css">
        <section class="header-top-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="header-top-content">
                            <ul class="nav nav-pills navbar-left">
                                <li><a href="#"><i class="pe-7s-call"></i><span>+3XXXXXXXXXXX</span></a></li>
                                <li><a href="#"><i class="pe-7s-mail"></i><span> xxxxxxxxx@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="header-top-menu">
                            <ul class="nav nav-pills navbar-right">

                                <?php
                                function num2word($num, $words)
                                {
                                    $num = $num % 100;
                                    if ($num > 19) {
                                        $num = $num % 10;
                                    }
                                    switch ($num) {
                                        case 1: {
                                            return($words[0]);
                                        }
                                        case 2: case 3: case 4: {
                                            return($words[1]);
                                        }
                                        default: {
                                            return($words[2]);
                                        }
                                    }
                                }
                                if(!isset($_SESSION["basket"]))
                                {
                                    $size = 0;
                                    $end = "товарів";
                                }
                                else
                                {
                                $size = sizeof($_SESSION["basket"]);
                                $end =  num2word($size, array('предмет', 'предмета', 'предметів'));
                                }
                                if (isset($_POST["btnLogout"])) {
                                    unset($_SESSION["customer"]);
                                }
                                if (isset($_SESSION["customer"])) {
                                    $custName = $_SESSION["customer"]["name"];
                                    echo "<li><a id='account' href='account.php'>Мій профіль ($custName)</a></li>";
                                    echo '
                                    <li><a href="basket.php"><img width="20px" height="20px" src="css/images/imgCartW26xH26.png" width="26" height="26" alt="Cart Image" />
                                            Корзина &nbsp;'.$size.'&nbsp;'.$end.'</a></li>
                                    <li><a href="exit.php"><i class="pe-7s-lock"></i>Вихід</a></li>'; 
                                }
                                else {
                                    echo '<li><a href="login.php"><i class="pe-7s-lock"></i>Вхід/Реєстрація</a></li>
                                    <li><a href="basket.php"><img width="20px" height="20px" src="css/images/imgCartW26xH26.png" width="26" height="26" alt="Cart Image" />
                                            Корзина &nbsp;'.$size.'&nbsp;'.$end.'</a></li>
                                    '; 
                                }
                                ?>
                                

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <header class="header-section">
            <nav class="navbar navbar-default">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="index.php">furniture<b>&</b>inspiration</a>
                    </div>

                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <?php  $url = $_SERVER['REQUEST_URI']; 
                            $pos=strripos($url, "index.php");
                            if ($pos === false) echo '<li><a href="index.php">Головна сторінка</a></li>'; else echo '<li class="active"><a href="index.php">Головна сторінка</a></li>'; 
                            ?>
                            <li <?php  $pos=strripos($url, "aboutus.php");if ($pos === false) echo ""; else echo 'class="active"'; ?>><a href="aboutus.php">Про нас</a></li>
                            <li <?php  $pos=strripos($url, "prodList.php");if ($pos === false) echo ""; else echo 'class="active"'; ?>><a href="prodList.php">Каталог товарів</a></li>
                            <li <?php  $pos=strripos($url, "contacts.php");if ($pos === false) echo ""; else echo 'class="active"'; ?>><a href="contacts.php">Контакти</a></li>
                            
                            <?php if (isset($_SESSION["customer"])) {
                                    $isAdmin = $_SESSION["customer"]["isAdmin"];
                                    if($isAdmin==1)
                                    {
                                        $pos=strripos($url, "admin.php");
                                        if ($pos === false) echo '<li><a href="admin.php">Сторінка адміністрування</a></li>'; 
                                        else 
                                        echo '<li class="active"><a href="admin.php">Сторінка адміністрування</a></li>';
                                    }
                             } ?>
                        </ul>
                        <ul class="nav navbar-nav navbar-right cart-menu">
                            <li><a href="#" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

        <section class="search-section">
            <div class="container">
                <div class="row subscribe-from">
                    <div class="col-md-12">
                        <form class="form-inline col-md-12 wow fadeInDown animated" action="prodList.php"  method="get">
                            <div class="form-group">
                                <input type="text" class="form-control subscribe" id="email" name="txtSearch" placeholder="Пошук...">
                                <button class="suscribe-btn" type="submit"><i class="pe-7s-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://unpkg.com/isotope-layout@3.0.6/dist/isotope.pkgd.min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/custom.js"></script>
