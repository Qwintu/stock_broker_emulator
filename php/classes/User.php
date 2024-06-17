<?php

class User{
  public static function getTickerList($id){
    global $mysqli;
    $result = $mysqli->query("SELECT `issuer`, `ticker`, `sector`, `last_price` FROM `Infoticker`");
    $tickerlist = [];
    while($row = $result->fetch_assoc()){
      $tickerlist[] = $row;
      }
      return json_encode($tickerlist);
  }

  public static function getPortfolio($id){
    global $mysqli;
    $portfolio = $mysqli->query("SELECT `LKOH`, `LKOH_price`, `GAZP`, `GAZP_price`, `ROSN`, `ROSN_price`, `SBER`, `SBER_price`, `TATN`, `TATN_price`, `GMKN`, `GMKN_price`, `AFLT`, `AFLT_price`, `AFKS`, `AFKS_price`, `MOEX`, `MOEX_price`, `VTBR`, `VTBR_price`, `NLMK`, `NLMK_price` FROM `Users` WHERE id='$id'");
    $invest_portfolio_full = $portfolio->fetch_assoc();
    $invest_portfolio = array_diff($invest_portfolio_full, array('0', '0.00'));
    echo json_encode($invest_portfolio);
  }  

  public static function getAvlbMoney($id){
    global $mysqli;
    $sql_money = $mysqli->query("SELECT `manyopen` FROM `Users` WHERE id='$id'");
    $avlb_money = $sql_money->fetch_assoc();
    echo floatval($avlb_money["manyopen"]);
  }

  public static function getDealList($id){
    global $mysqli;
    $result = $mysqli->query("SELECT `ticker`, `shareprice`, `numbershears`, `timedeal`, `pointticket` FROM `Dealuser`WHERE `idname`='$id'");
    $deallist = [];
    while($row = $result->fetch_assoc()){
      $deallist[] = $row;
      }
    return json_encode($deallist);
  }

  public static function getUserInfo($id){
  global $mysqli;
  $result = $mysqli->query("SELECT `LKOH`, `LKOH_price`, `GAZP`, `GAZP_price`, `ROSN`, `ROSN_price`, `SBER`, `SBER_price`, `TATN`, `TATN_price`, `GMKN`, `GMKN_price`, `AFLT`, `AFLT_price`, `AFKS`, `AFKS_price`, `MOEX`, `MOEX_price`, `VTBR`, `VTBR_price`, `NLMK`, `NLMK_price` FROM `Users` WHERE `id`='$id'");
    $userinfo = [];
    $row = $result->fetch_assoc();
    $userinfo[] = array_diff($row, array('0', '0.00'));
    return json_encode($userinfo);//отправка по пользователю массива со списком тикеров и средней ценой
  }

  public static function getInfoTicker(){
  global $mysqli;
  $result = $mysqli->query("SELECT `ticker`, `sector`, `last_price` FROM `Infoticker`");
  $infoticker = [];
  while($row = $result->fetch_assoc()){
    $infoticker[] = $row;
    }
    return json_encode($infoticker);
  }

  public static function authUser(){
    global $mysqli;
    $email = mb_strtolower($_POST['email']);
    $pass  = $_POST['pass'];
    $result = $mysqli->query("SELECT * FROM `Users` WHERE `email`='$email'");
    $row = $result->fetch_assoc();
    if(password_verify($pass, $row['pass'])){
      $_SESSION['name'] = $row['name'];
      $_SESSION['lastname'] = $row['lastname'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['id'] = $row['id'];
      $_SESSION['manyopen'] = $row['manyopen'];
      $_SESSION['finresult'] = $row['finresult'];
      echo "exist";
    }else{
      echo "error";
    }
  }

  public static function regUser(){
    global $mysqli;
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $email = mb_strtolower($_POST['email']);
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
    $result = $mysqli->query("SELECT `id` FROM `Users` WHERE `email`='$email'");
    if($result->num_rows){
      echo "exist";
    }else{
      $mysqli->query("INSERT INTO `Users`(`name`, `last_name`, `email`, `pass`) VALUES ('$name','$lastname','$email','$pass')");
      echo "success";
    }
  }
}
?>