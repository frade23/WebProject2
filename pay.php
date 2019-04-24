<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');
}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

$price = $_GET['price'];
$name = $_GET['name'];

$time = new DateTime();
$time1= $time->format("c");

$users = $db->query("SELECT * FROM users WHERE name='$name'");
$carts = $db->query("SELECT * FROM users WHERE name='$name'");
$row2 = $carts->fetch();
while ($row1=$users->fetch()){
    $userID1 = $row1['userID'];
    $balance = $row1['balance'];
    $artworkID = $row2['artworkID'];


    if ($balance >= $price){

        //扣钱
        $balance -= $price;
        $update = $db->exec("UPDATE users SET balance=$balance WHERE name='$name'");
        //
        $update2 = $db->exec("UPDATE artworks SET ownerName=$userID1 WHERE artworkID=$artworkID");
        //清除购物车的物品
        $delete = $db->query("DELETE FROM carts WHERE name='$name'");
        //生成订单
        $addData = $db->prepare("INSERT INTO orders( ownerID, sum, timeCreated) 
                                              VALUES (?,?,?)");
        $addData->execute(array($userID1, $price, $time1));
        echo "success";
    }
    else echo 'defeat';
}
