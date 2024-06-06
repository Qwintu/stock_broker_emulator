<?php
    header('Content-type: text/html; charset=utf-8');
    require_once("db.php");
    
    $id = 8;
    
    $portfolio = $mysqli->query("SELECT `LKOH`, `LKOH_price`, `GAZP`, `GAZP_price`, `ROSN`, `ROSN_price`, `SBER`, `SBER_price`, `TATN`, `TATN_price`, `GMKN`, `GMKN_price`, `POLY`, `POLY_price`, `AFKS`, `AFKS_price`, `MOEX`, `MOEX_price`, `VTBR`, `VTBR_price`, `NLMK`, `NLMK_price` FROM `User` WHERE id='$id'");
    $invest_portfolio_full = $portfolio->fetch_assoc();
    $invest_portfolio = array_diff($invest_portfolio_full, array('0', '0.00'));
    echo json_encode($invest_portfolio);
    
?>