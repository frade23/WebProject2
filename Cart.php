<?php
session_start();

try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');

}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

//导航栏的变化
$nb1 = "登录";
$nb2 = "注册";

if (isset($_GET['$login'])){
    $_SESSION['login'] = $_GET['$login'];
}

if (isset($_SESSION['login']) && $_SESSION['login'] === 'true'){
    $nb1 = $_SESSION['nb1'];
    $nb2 = $_SESSION['nb2'] = "登出";
}
else{
    $_SESSION['nb1'] = "登录";
    $_SESSION['nb2'] = "注册";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/Cart.css"  media="all"/>
    <meta charset="UTF-8">
    <title>Cart</title>
</head>
<header id="header1" class="container-fluid">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark row fixed-top">
        <!-- Brand -->
        <a class="navbar-brand col-sm-4" href="#" id="h1">Art Store
            <span id="span1">Shopping for happiness</span>
        </a>

        <!-- Links -->
        <ul class="navbar-nav col-sm-8">
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="Home.php">首页</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="upload.php">发布艺术品</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="" onclick="return logIn()" id="logIn"><?php echo $nb1;?></a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="" onclick="return logOut()" id="logOut"><?php echo $nb2;?></a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="Search.php">搜索</a>
            </li>
        </ul>
    </nav>
</header>

<form>
    <label id="pos2">
        <input type="search" name="googlesearch">
        <a href="Search.php">
            <input type="button" value="搜索">
        </a>
    </label>
</form>

<body>
<h4>购物车</h4>
<main id="main1">
<!--    <div class="div2">-->
<!--        <nav>-->
<!--            <a href="Details.php">-->
<!--                <img src="images/works/square-small/021040.jpg">-->
<!--            </a>-->
<!--        </nav>-->
<!--        <section>-->
<!--            <p>Still life with bowl and Fruit</p>-->
<!--            <p>Raffaello Santi</p>-->
<!--            <span>-->
<!--                <button type="button" onclick="" class="btn btn-outline-secondary blueButton">价格:$120.0000</button>-->
<!--                <button type="button" onclick="" class="btn btn-outline-secondary redButton">删除</button>-->
<!--            </span>-->
<!--        </section>-->
<!--    </div><hr>-->
<!--    <div class="div2">-->
<!--        <nav>-->
<!--                <img src="images/works/square-small/024020.jpg" onclick="">-->
<!--        </nav>-->
<!--        <section>-->
<!--            <p>Family of Saltimbanques</p>-->
<!--            <p>Raffaello Santi</p>-->
<!--            <button type="button" onclick="" class="btn btn-outline-secondary blueButton">价格:$170.0000</button>-->
<!--            <button type="button" onclick="" class="btn btn-outline-secondary redButton">删除</button>-->
<!--        </section>-->
<!--    </div>-->

<!--    购物车物品展示-->
    <?php
    $totalPrice = 0;
    $number3 = $db->query("SELECT * FROM carts WHERE name = '$nb1'");

    while ($row2 = $number3->fetch()){
        $artwork = $row2['title'];
        $number4 = $db->query("SELECT * FROM artworks WHERE title = '$artwork'");
                while ($row3 = $number4->fetch()){
                    $imageFileName = $row3['imageFileName'];
                    $path = "resources/img/". $imageFileName;
                    $title = $row3['title'];
                    $artist = $row3['artist'];
                    $price = $row3['price'];

                    print "<div class=\"div2\">
                                <nav>
                                       <img src=\"$path\" id='img' onclick=\"window.location.href = 'Details.php?src=$imageFileName'\">
                                </nav>
                                <section>
                                    <p id='$title' class='title'>$title</p>
                                    <p>作者：$artist</p>
                                    <button type=\"button\" onclick=\"\" class=\"btn btn-outline-secondary blueButton\">$price</button>
                                    <button type=\"button\" onclick=\"\" class=\"btn btn-outline-secondary del\">删除</button>
                                </section>
                            </div><hr>";
                    $totalPrice += $price;
                }
    }
    ?>
    <div>
        <button type="button" onclick="" class="btn btn-outline-secondary sum" id='price'><?php echo $totalPrice;?></button>
    </div>
</main>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"

        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"

        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"

        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/Cart.js"></script>
</body>
</html>
