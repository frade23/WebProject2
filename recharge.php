<?php
session_start();

try{
    $db = new PDO("mysql:host=localhost;dbname=star", "root", "");
    $db -> exec('SET NAMES utf8');
}
catch (Exception $error){
    die("Connection failed:" . $error ->getMessage());
}

$name = $_GET['name'];
$add = $_GET['add'];

$users = $db->query("SELECT * FROM users WHERE name='$name'");
while ($row1=$users->fetch()){
    $balance = $row1['balance'];
    $artworkID = $row2['artworkID'];


    if ($add >=0){
        //充钱
        $balance += $add;
        $update = $db->exec("UPDATE users SET balance=$balance WHERE name='$name'");
        print 1;
    }
    else print 0;
}