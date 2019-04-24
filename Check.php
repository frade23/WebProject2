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

if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $balanceData = $db->query("SELECT * FROM users WHERE name='$nb1'");
    while ($row = $balanceData->fetch()) {
        $balance = $row['balance'];
        $name = $row['name'];
        $tel = $row['tel'];
        $email = $row['email'];
        $address = $row['address'];
    }
//    $productData = $db->query("SELECT * FROM artworks WHERE name='$nb1'");
//    while ($row1 = $productData->fetch()){
//        $title = $row['title'];
//    }
}
else{
    header('Location:Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/Check.css"  media="all"/>

    <meta charset="UTF-8">
    <title>Check</title>
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

<main class="container-fluid">
    <div class="row">
        <div id="div2" class="col-sm-2">
            <p>用户：<?php echo $name;?></p>
            <p>电话：<?php echo $tel;?></p>
            <p>邮箱：<?php echo $email;?></p>
            <p>地址：<?php echo $address;?></p>
            <p>余额：<span id="balance"><?php echo $balance;?></span></p>

            <button type="button" class="btn btn-outline-secondary text-center" data-toggle="collapse" data-target="#demo"  id="button">充值缴费</button>
            <div id="demo" class="collapse">
                <input type="number" id="add" placeholder="充值金额">
                <button type="button" class="btn btn-outline-secondary text-center" data-toggle="collapse" data-target="#demo"  id="button2">确认充值</button>
            </div>
        </div>

        <div id="divx" class="col-sm-9">
            <div id="div3">
                <label>
                    <textarea rows="8" cols="137"  id="text1" placeholder="我上传的艺术品："></textarea>
                </label>
            </div>

            <div id="div4">
                <p>我购买的艺术品：</p>
                <table border="1" id="table">
                    <?php
                    $users = $db->query("SELECT * FROM users WHERE name='$name'");
                    while ($row = $users->fetch()){
                        $userID = $row['userID'];
                    }

                    $orders = $db->query("SELECT * FROM orders WHERE ownerID='$userID'");
                    $orders2 = $db->query("SELECT * FROM artworks WHERE ownerName='$userID'");

                    while ($row = $orders->fetch()){
                                $orderID = $row['orderID'];
                                $sum = $row['sum'];
                                $timeCreated = $row['timeCreated'];

                                echo "<tr>
                                <td>订单编号：$orderID</td>
                                
                                <td>购买人：";
                                    echo $name."</td>
                                <td>订单时间：$timeCreated</td>
                                <td>订单总额：$sum</td>
                            </tr>";
                    }
                    ?>

                </table>
            </div>
            <div>
                <label>
                    <textarea rows="8" cols="137" id="text3" placeholder="我卖出的艺术品："></textarea>
                </label>
            </div>
        </div>
    </div>

</main>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"

        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"

        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"

        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/Check.js"></script>
</body>
</html>
