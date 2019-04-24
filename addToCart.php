<?php
session_start();

try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');
}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

//添加购物车
$title3 = $_GET['title'];
$name = $_GET['name'];
//print $title3.$userID;
$artworkID = $db->query("SELECT artworkID FROM artworks WHERE title = '$title3'");
while ($row1 = $artworkID->fetch()){
    $artworkID1 = $row1['artworkID'];
}

$userID = $db->query("SELECT userID FROM users WHERE name = '$name'");
while ($row2 = $userID->fetch()){
    $userID1 = $row2['userID'];
}

$checkIfAdded = $db->query("SELECT artworkID FROM carts WHERE title='$title3'");
$row1 = $checkIfAdded->fetchAll();
if (!count($row1)) {
    $addData = $db->prepare("INSERT INTO carts( userID, artworkID, title, name) 
                                              VALUES (?,?,?,?)");
    $addData->execute(array($userID1,$artworkID1,$title3, $name));
    echo "success";
} else {
    echo "defeat";
}

