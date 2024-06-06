<?php
    header('Content-type: text/html; charset=utf-8');
    require_once("db.php");
    
    $id = 8;
    
    $result = $mysqli->query("SELECT `issuer`, `ticker`, `last_price` FROM `Infoticker`");
    $tickerlist = [];
    while($row = $result->fetch_assoc()){
        $tickerlist[] = $row;
    }
    echo json_encode($tickerlist);

?>