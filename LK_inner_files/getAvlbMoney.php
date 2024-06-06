<?php
    // получает из базы остаток денег
    header('Content-type: text/html; charset=utf-8');
    require_once("db.php");
    $id = 8;
    $sql_money = $mysqli->query("SELECT `manyopen` FROM `User` WHERE id='$id'");
    $avlb_money = $sql_money->fetch_assoc();
    echo floatval($avlb_money[manyopen]);
?>