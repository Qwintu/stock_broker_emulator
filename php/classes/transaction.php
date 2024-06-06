<?php
    header('Content-type: text/html; charset=utf-8');
    require_once("db.php");
    session_start();
    
    $ticker = $_POST['ticker'];
    $shareprice = $_POST['price'];
    $numbershears = $_POST['vol'];
    $pointticket = $_POST['flag'];
    $id = 8;
    $idname = 8;
    $timedeal = date("Y-m-d H:i:s");
    $ticker_price = $ticker."_price";
    $ticker_limit = $ticker."_limit";
    
    // получаем данные из портфелеля по тикеру, по которому прошла сделка, для проверки
    $sql_resp = $mysqli->query ("SELECT `$ticker`, `$ticker_price`, `manyopen`, `$ticker_limit` FROM `User` WHERE id='$id'");
    $data_row = $sql_resp->fetch_assoc();
    $ticker_avg_price = floatval($data_row[$ticker_price]);  // средняя цена позиции
    $ticker_vol = floatval($data_row[$ticker]);  // кол-во акций в портфеле
    $avlb_money = floatval($data_row['manyopen']);  // доступные деньги
    $stock_limits = floatval($data_row[$ticker_limit]);  // лимит по акции для шорта

    //$b = $mysqli->query ("SELECT `id`, `LKOH`, `LKOH_price`, `$ticker`, '$ticker_price' FROM `User` WHERE id='$id'");
    
    // сделка
    if ($numbershears == 0 ||  $numbershears == ""){
        echo json_encode("Введите количество акций больше нуля");
    }elseif ($pointticket == "buy" && $shareprice*$numbershears > $avlb_money) {
        echo json_encode("Недостаточно средств на покупку");
    }elseif ($pointticket == "sell" && $numbershears + $ticker_vol < $stock_limits) {
        echo json_encode("Недостаточно лимитов по акции");
    }elseif ($numbershears*(-1) == $ticker_vol) {
        $ticker_avg_price_new = 0;
        $ticker_vol_new = 0;
        $avlb_money_new = $avlb_money-$shareprice*$numbershears;
        // записываем данные сделки табл истории сделок
        $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
        $mysqli->query("UPDATE `User` SET `$ticker_price`='$ticker_avg_price_new',`$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
        echo json_encode(getPortfolio());
    }elseif (($ticker_vol>=0 && $numbershears>0) OR ($ticker_vol<=0 && $numbershears<0)){
        // добовляем к позиции позицию в туже сторону
        $ticker_vol_new = $ticker_vol+$numbershears;
        $ticker_avg_price_new = ($ticker_avg_price*$ticker_vol+$shareprice*$numbershears)/($ticker_vol+$numbershears);
        $avlb_money_new = $avlb_money-$shareprice*$numbershears;
        // записываем данные сделки табл истории сделок
        $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
        $mysqli->query("UPDATE `User` SET `$ticker_price`='$ticker_avg_price_new',`$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
        echo json_encode(getPortfolio());
    }elseif (($ticker_vol>0 && $numbershears<0 && $ticker_vol + $numbershears>0) OR ($ticker_vol<0 && $numbershears>0 && $ticker_vol+$numbershears<0)){
        // частичное закрытие позиции
        $ticker_vol_new = $ticker_vol+$numbershears;
        $avlb_money_new = $avlb_money-$shareprice*$numbershears;
        // записываем данные сделки табл истории сделок
        $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
        $mysqli->query("UPDATE `User` SET `$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
        echo json_encode(getPortfolio());
    }elseif (($ticker_vol>0 && $ticker_vol + $numbershears<0) OR ($ticker_vol<0 && $ticker_vol + $numbershears>0)){
        // при перевороте разбиваем транзакцию на 2 части: первой закрываем открытую сделку, второй открываем обратную позицию на разницу между откр поз и сделкой
        $ticker_vol_new = $ticker_vol + $numbershears; // разница между откр позициией и сделкой - размер новой позиции
        $ticker_avg_price_new = $shareprice;
        $avlb_money_new = $avlb_money + $shareprice * $ticker_vol - $shareprice * $ticker_vol_new;
         // записываем данные сделки табл истории сделок
        $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
        $mysqli->query("UPDATE `User` SET `$ticker_price`='$ticker_avg_price_new',`$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
        echo json_encode(getPortfolio());
    }else{echo json_encode("Ошибка операции");};
    
    /*
    if ($pointticket == "buy") {
        if ($shareprice*$numbershears <= $avlb_money) {
            // записываем данные сделки табл истории сделок
            $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
            
            // пишем обновленные данные в табл после совершения сделки
            $ticker_vol_new = $ticker_vol+$numbershears;
            $ticker_avg_price_new = ($ticker_avg_price*$ticker_vol+$shareprice*$numbershears)/($ticker_vol+$numbershears);
            $avlb_money_new = $avlb_money-$shareprice*$numbershears;
            $mysqli->query("UPDATE `User` SET `$ticker_price`='$ticker_avg_price_new',`$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
            //$mysqli->query("UPDATE `User` SET `$ticker`='$numbershears', `$ticker_price`='$shareprice' WHERE `id`='$id'");
            echo json_encode(getPortfolio());
        } else {
            echo json_encode("Недостаточно средств на покупку");
        };
    }elseif ($pointticket == "sell") {
        if ($numbershears + $ticker_vol >= $stock_limits) {
             // записываем данные сделки табл истории сделок
            $mysqli->query("INSERT INTO `Dealuser`(`idname`, `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket`) VALUES ('$idname', '$ticker', '$shareprice', '$numbershears', '$timedeal', '$pointticket')");
            
            // пишем обновленные данные в табл после совершения сделки
            $ticker_vol_new = $ticker_vol + $numbershears;
            $ticker_avg_price_new = ($ticker_avg_price*$ticker_vol+$shareprice*$numbershears)/($ticker_vol+$numbershears);
            $avlb_money_new = $avlb_money-$shareprice*$numbershears;
            $mysqli->query("UPDATE `User` SET `$ticker_price`='$ticker_avg_price_new',`$ticker`='$ticker_vol_new',`manyopen`='$avlb_money_new' WHERE id='$id'");
            echo json_encode(getPortfolio());
        }else {
            echo json_encode("Недостаточно лимитов по акции");
        };
    }else{echo json_encode("Ошибка операции");};
    */
    
    // выгружаем все из портфеля, удаляем нулевые позиции, записываем все в массив
    function getPortfolio() {
        global $mysqli;
        global $id;
        $portfolio = $mysqli->query("SELECT `LKOH`, `LKOH_price`, `GAZP`, `GAZP_price`, `ROSN`, `ROSN_price`, `SBER`, `SBER_price`, `TATN`, `TATN_price`, `GMKN`, `GMKN_price`, `POLY`, `POLY_price`, `AFKS`, `AFKS_price`, `MOEX`, `MOEX_price`, `VTBR`, `VTBR_price`, `NLMK`, `NLMK_price` FROM `User` WHERE id='$id'");
        $invest_portfolio_full = $portfolio->fetch_assoc();
        $invest_portfolio = array_diff($invest_portfolio_full, array('0', '0.00'));
        return $invest_portfolio;
    };
    
    $a = [$ticker, $shareprice, $numbershears, $pointticket, $timedeal, $ticker_price, $avlb_money, $ticker_vol, $stock_limits];
    
    //echo gettype($avlb_money);
    //var_dump($data_row);
    //var_dump($a);
    //var_dump($invest_portfolio);
    //echo json_encode($a);
    //var_dump($ticker, $price, $vol, $flag);
    ?>