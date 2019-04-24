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
    <title>upload</title>
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
    <main class="table-bordered container">
        <form>
            <h4>Art Details</h4>
            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" id="title" placeholder="Give your photo a descriptive name">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea class="form-control" id="description" placeholder="Adding a rich description will help with search results"></textarea>
            </div>
            <div class="form-group">
                <label for="sel1">Continent</label>
                <select class="form-control" id="sel1">
                    <option>Choose continent</option>
                </select>
                <label for="sel2">Country</label>
                <select class="form-control" id="sel2">
                    <option>Choose country</option>
                </select>
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" id="city" placeholder="">
            </div>

            <div class="form-group">
                <p>Copyright?</p>
                <form>
                    <div class="radio">
                        <label><input type="radio" name="optradio ">All rights reserved</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="optradio">Creative Commons</label>
                    </div>
                </form>
            </div>


            <div class="form-group">
                <p>Creative Commons Types</p>
                <form>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Attribution
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input">Noncommercial
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">No Derivative Works
                        </label>
                    </div>
                </form>
            </div>

            <div class="form-group">
                <form>
                    <div class="form-check form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" value="">I accept the software license
                        </label>
                    </div>
                </form>
            </div>

            <div class="row">
                <div class="col-md-3 form-group">
                    <div class="form-group">
                        <label for="qidiwang">Rate this art:</label><br>
                        <input type="number" id="qidiwang" class="form-control" size="1em">
                    </div>
                </div>
                <div class="col-md-8 form-group offset-md-1">
                    <div class="form-group">
                        <label for="collection">Color Collection:</label><br>
                        <input type="color" id="collection" class="form-control" >
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <div class="form-group">
                        <p>Date Taken:</p>
                        <label>
                            <input type="date" id="date" class="form-control">
                        </label>

                    </div>
                </div>
                <div class="col-md-5 form-group offset-md-1">
                    <div class="form-group">
                        <p>Time Taken:</p>
                        <label>
                            <input type="time" name="Time Taken" class="form-control">
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" class="btn btn-dark">Submit</button>
                <button type="button" class="btn btn-dark">Clear</button>
            </div>
        </form>
    </main>

</body>
</html>