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
//$nbHref1 =  "Login.php";
//$nbHref2 = "Register.php";

if (isset($_GET['$login'])){
    $_SESSION['login'] = $_GET['$login'];
}

if (isset($_SESSION['login']) && $_SESSION['login'] === 'true'){
    $nb1 = $_SESSION['nb1'];
    $nb2 = $_SESSION['nb2'] = "登出";
//    $nbHref1 = $_SESSION['nbHref1'] = "Check.php";
//    $nbHref2 = $_SESSION['nbHref2'] = "Login.php";
}
else{
    $_SESSION['nb1'] = "登录";
    $_SESSION['nb2'] = "注册";
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

    <script src="js/Home.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Home.css"  media="all"/>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body class="">
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
                <a class="nav-link" href="" id="logIn" onclick="return logIn()"><?php echo $nb1;?></a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="" id="logOut" onclick="return logOut()"><?php echo $nb2;?></a>
            </li>
            <li class="nav-item col-sm-2">
                <a class="nav-link" href="Search.php">搜索</a>
            </li>
        </ul>
    </nav>

    <div id="loadTip" class="alert alert-success alert-dismissable"  <?php
        if(isset($_SESSION['login']) && $_SESSION['login'] === 'true'){
            echo '';
        }else{
            echo 'hidden';
        }
    ?> >
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong class="text-center">登录已成功</strong>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- 指示符 -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <?php
        //选取热度最高的三张图片
        $number1 = $db->query("SELECT imageFileName, description, title FROM artworks WHERE sell=0 ORDER BY 
                        view DESC LIMIT 3");
        echo "<div class=\"carousel-inner text-center\">";
        $i=0;
        while ($row = $number1->fetch()){
            $temp = $row['imageFileName'];
            $path[] = "resources/img/" . $temp;
            $description[] = str_replace('"', '', $row["description"]);
            $title[] = $row['title'];
            if($i == 0){
                // 轮播图片
                echo "
                   <div class=\"carousel-item active\">
                            <img src=\"$path[$i]\" class=\"img\" onclick=\"window.location.href ='Details.php?src=$temp'\">
                        <div class=\"carousel-caption\">
                            <h3> $title[$i]</h3>
                            <p>$description[$i]</p>
                        </div>
                    </div>";

            }
            else {
                echo "
                   <div class=\"carousel-item\">
                            <img src=\"$path[$i]\" class=\"img\" onclick=\"window.location.href ='Details.php?src=$temp'\">
                        <div class=\"carousel-caption\">
                            <h3> $title[$i]</h3>
                            <p>$description[$i]</p>
                        </div>
                    </div>";
            }

            $i++;
        }
        echo "</div>";

//                 <!-- 左右切换按钮 -->
        echo '<a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>';
        ?>

</header>

<!--展示最新的三张图片-->
<main class="container">
    <div class="row">
        <?php
        $number2 = $db->query("SELECT imageFileName, description, title FROM artworks WHERE sell=0 ORDER BY 
                        timeReleased DESC LIMIT 3");
        $i=0;
        while ($row = $number2->fetch()) {
            $temp1 = $row['imageFileName'];
            $path2[] = "resources/img/" . $temp1;
            $description2[] = str_replace('"', '', $row["description"]);
            $title2[] = $row['title'];
            echo "<div class=\"col-sm-4 text-center\">
                        <img src=\" $path2[$i] \" class=\"rounded-circle img1\"  id=\"search\" onclick=\"window . location . href = 'Details.php?src=$temp1'\">
                        <div>
                            <h4> $title2[$i]</h4>
                            <p>$description2[$i] </p>
                        </div>
                        <button type=\"button\" class=\"btn btn-outline-secondary\" onclick=\"window . location . href = 'Details.php?src=$temp1'\">Learn more</button>
                   </div>";
            $i++;
        }
        ?>
    </div>
</main>
<br/>

<footer class="">
    <div class="container-fluid ">
        <div class="row final">
            <p class="text-center">Copyright &copy; 2017 Creative Commons ShareAlike</p>
        </div>
    </div>
</footer>
</body>
</html>