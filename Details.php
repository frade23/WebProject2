<?php
session_start();

try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');

}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

$nb1 = "登录";
$nb2 = "注册";
//$nbHref1 =  "Login.php";
//$nbHref2 = "Register.php";

if (isset($_GET['$login'])){
    $_SESSION['login'] = $_GET['$login'];
}

if (isset($_SESSION['login']) && $_SESSION['login'] == 'true'){
    $nb1 = $_SESSION['nb1'];
    $nb2 = $_SESSION['nb2'] = "登出";
//    $nbHref1 = $_SESSION['nbHref1'] = "Check.php";
//    $nbHref2 = $_SESSION['nbHref2'] = "Login.php";
}
else{
    $_SESSION['nb1'] = "登录";
    $_SESSION['nb2'] = "注册";
}

//详情的各种信息


if (isset($_GET['src'])){
    $src = $_GET['src'];
    $number1 = $db->query("SELECT * FROM artworks WHERE imageFileName='$src'");
    $updateName = $db->exec("UPDATE artworks SET view = view +1 WHERE imageFileName='$src'");
}

    while ($row = $number1->fetch()){
        $imageFileName = $row['imageFileName'];
        $path = "resources/img/" . $imageFileName;
        $artist = $row['artist'];
        $title = $row['title'];
        $description = str_replace('"', '', $row["description"]);
        $yearOfWork = $row['yearOfWork'];
        $genre = $row['genre'];
        $width = $row['width'];
        $height = $row['height'];
        $price = $row['price'];
        $view = $row['view'];
        $timeReleased = $row['timeReleased'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/Details.css"  media="all"/>
    <meta charset="UTF-8">
    <script src="js/Details.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <title>Details</title>
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
                <a class="nav-link" href="" onclick="return cart()">购物车</a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="" onclick="return logIn()" id="logIn"><?php echo $nb1;?></a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="" id="logOut" onclick="return logOut()"><?php echo $nb2;?></a>
            </li>

            <!-- Dropdown -->
            <!--<li class="nav-item dropdown">-->
            <!--<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
            <!--Dropdown link-->
            <!--</a>-->
            <!--<div class="dropdown-menu">-->
            <!--<a class="dropdown-item" href="Home.html">首页</a>-->
            <!--</div>-->
            <!--</li>-->
        </ul>
    </nav>
    <!--<nav id="pos">-->
    <!--<h4 id="h4">欢迎来到Art Store</h4>-->
    <!--<a href="LogIning.html">登录</a>或-->
    <!--<a href="#" id="a1">注册</a>-->
    <!--<a href="LogIning.html">未登录</a>-->
    <!--<a href="Cart.html">购物车</a>-->
    <!--<a href="Home.html">登出</a>-->
    <!--</nav>-->
</header>

<!--<h1 id="h1">Art Store</h1>-->
<form>
    <label id="pos2">
        <input type="search" name="googlesearch">
        <a href="Search.php">
            <input type="button" value="搜索">
        </a>
    </label>
</form>

<body class="container-fluid">
<!--<div id="div1">-->
<!--<p>-->
<!--<a href="Home.html">首页</a>-->
<!--<a href="Search.html">搜索</a>-->
<!--<span id="span1">详情</span>-->
<!--</p>-->
<!--</div>-->
<!--<div class="row">-->
<!---->
<!--</div>-->
<div class="row">
    <div class="col-sm-5 text-center">
        <h2 class="pos1" id="title"><?php echo $title;?></h2>
        <p class="pos1">By <?php echo $artist;?></p>
        <img src="<?php echo $path;?>" id="img" class="">
        <p id="p1"><?php echo $description;?></p>
        <p>price: <span id="font1"><?php echo $price;?></span></p>
        <button type="button" onclick="" class="btn btn-outline-secondary">Add to Wish List</button>
        <button type="button" onclick="return goToCart()" class="btn btn-outline-secondary">Add to Shopping Cart</button><br></div>
    <div class="col-sm-4">
        <table class="table table-bordered table1">
            <thead>
            <tr>
                <th id="caption1">Product Details</th>
            </tr>
            </thead>
            <tbody>
            <tr >
                <td class="tr1">Date</td>
                <td class="tr1"><?php echo $yearOfWork;?></td>
            </tr>
            <tr>
                <td class="tr1">Medium</td>
                <td class="tr1">Oil on canvas</td>
            </tr>
            <tr>
                <td class="tr1">Dimensions</td>
                <td class="tr1"><?php echo $width;?> cm X <?php echo $height;?> cm</td>
            </tr>
            <tr>
                <td class="tr1">Home</td>
                <td class="tr1">Boltmore Art Museum</td>
            </tr>
            <tr>
                <td class="tr1">Genres</td>
                <td class="tr1"><?php echo $genre;?></td>
            </tr>
            <tr>
                <td class="tr1">Subjects</td>
                <td class="tr1">People Family</td>
            </tr>
            <tr>
                <td class="tr1">View</td>
                <td class="tr1"><?php echo $view;?></td>
            </tr>
            <tr>
                <td class="tr1">Time Released</td>
                <td class="tr1"><?php echo $timeReleased;?></td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="col-sm-2 table2">
        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th class="caption2">流行艺术家</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><a href="Search.php">Johannes Vermeer
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">Raffaello Santi
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">van Gogh
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">Piero da Vinci
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">Claude Monet
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">Paul Cézanne
                    </a></td>
            </tr>
            <tr>
                <td><a href="Search.php">Michelangelo
                    </a></td>
            </tr>
            </tbody>
        </table>

        <table class="table table-bordered text-center">
            <thead>
            <tr>
                <th class="caption2">流行流派</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Classical</td>
            </tr>
            <tr>
                <td class="tr2">Romantic</td>
            </tr>
            <tr>
                <td class="tr2">Criticize</td>
            </tr>
            <tr>
                <td class="tr2">Reality</td>
            </tr>
            <tr>
                <td class="tr2">Beautiful</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
