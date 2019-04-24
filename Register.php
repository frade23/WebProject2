<?php
session_start();
try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

$nameErr = $keyWordErr = $emailErr = $confirmKeyWordErr =$telErr = $addressErr ="";
$keyWord = $gender = $comment = $checkNumber = "";
//$name = $_POST["name"];

//登录
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "用户名不能为空";
    }
    else if (empty($_POST["password"])) {
        $keyWordErr = "密码不可以为空";
    }
    //检查密码是否大于6位
    else if (strlen($_POST['password']) < 6) {
        $keyWordErr = "密码应大于等于6位";
    }
    //检查密码是否为纯数字
    else if (is_numeric($_POST["password"])) {
        $keyWordErr = "密码不可以为纯数字";
    }
    else if (empty($_POST["confirmPassword"])) {
        $confirmKeyWordErr = "请填写确认密码";
    }
    else if ($_POST["confirmPassword"] != $_POST["password"]) {
        $confirmKeyWordErr = "请保证两次密码填写一致";
    }
    else if (empty($_POST["email"])){
        $emailErr = "邮箱不可以为空";
    }
    else if (!checkEmail($_POST["email"])){
        $emailErr = "邮箱格式错误";
    }
    else if (empty($_POST["tel"])){
        $telErr = "号码不可以为空";
    }
    else if (empty($_POST["address"])){
        $addressErr = "地址不可以为空";
    }
    else{
        echo 1;
        $name = $_POST["name"];
        $dataName = $db->query("SELECT name FROM users WHERE name = '$name'");
        $row=$dataName->fetchAll();
        if(!count($row)){
            $addData = $db->prepare("INSERT INTO users( name, email, password, tel, address, balance) 
                                              VALUES (?,?,?,?,?,?)");
            $addData ->execute(array($_POST['name'], $_POST['email'], $_POST['password'], $_POST['tel'], $_POST['address'], '0'));

            header('location:Login.php');
            exit();
        }else{
            $nameErr = "用户名已存在";
        }
            }
}

function checkEmail($email){
    $pattern="/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
    if(preg_match($pattern,$email)){
        return true;
    } else{
        return false;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/LogIn.css"  media="all"/>
    <meta charset="UTF-8">
    <script src="js/Register.js"></script>
    <title>注册</title>
</head>
<body class="container-fluid">
<form class="row" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="col-sm-4"></div>
    <div id="div2" class="col-sm-3">
        <label>
            <input type="text" id="logUser" placeholder="昵称：" name="name">
        </label>
        <span id="LogTip">
                <?php echo $nameErr;?>
        </span><br>
        <label>
            <input type="password" id="password1" placeholder="密码：" name="password">
        </label>
        <span id="password1Tip">
                <?php echo $keyWordErr;?>
        </span><br>
        <label>
            <input type="password" id="password2" placeholder="确认密码：" name="confirmPassword">
        </label>
        <span id="password2Tip">
                <?php echo $confirmKeyWordErr;?>
        </span><br>
        <label>
            <input type="email" name="email" placeholder="邮箱：">
        </label>
        <span id="emailTip">
                <?php echo $emailErr;?>
        </span><br>
        <label>
            <input type="tel" placeholder="电话：" name="tel">
        </label>
        <span id="emailTip">
                <?php echo $telErr;?>
        </span><br>
        <label>
            <input type="text" placeholder="地址：" name="address">
        </label>
        <span id="emailTip">
                <?php echo $addressErr;?>
        </span><br>
            <button type="submit" class="btn btn-outline-secondary btn-block"
                    onfocus="" value="">注册</button>
            <button type="submit" class="btn btn-outline-secondary btn-block" value="" onclick="return check2()">取消</button>
</div>

</form>
</body>
<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</html>