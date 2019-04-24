<?php
try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');
}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

$title3 = $_GET['title'];
$name = $_GET['name'];
//删除购物车的物品
$delete = $db->query("DELETE FROM carts WHERE name='$name' AND title='$title3'");
echo "success";
?>