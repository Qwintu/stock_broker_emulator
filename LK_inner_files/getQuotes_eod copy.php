<?php
  header('Content-type: text/html; charset=utf-8');
  require_once('simple_html_dom.php');
  require_once("db.php");
  
  $tickers = [
        [
        "GAZP" => "https://www.finam.ru/quote/moex-akcii/gazprom/", 
        "LKOH" => "https://www.finam.ru/quote/moex-akcii/lukoil/", 
        "ROSN" => "https://www.finam.ru/quote/moex-akcii/rosneft/"
        ],
        [
        "GAZP" => "https://broker.ru/quotes/gazp",
        "LKOH" => "https://broker.ru/quotes/lkoh",
        "ROSN" => "https://broker.ru/quotes/rosn"
        ]
      ];
    
    $quotes_eod = [];
    
    foreach($tickers[1] as $key => $value) {
    $quote_eod = parse_quote_edo($value);
    echo $key;
    echo $quote_eod;
   
  //  $mysqli->query("INSERT INTO `Dealstock`(`ticker`, `last_price`) VALUES ('$key','$quote_eod')"); //Заносим сделки
   $mysqli->query("INSERT INTO `Dealstock`(`ticker`,`last_price`,`open_price` ) VALUES ('$key','$quote_eod','$quote_eod')");
    
   //  $mysqli->query("INSERT INTO `Dealuser`(`ticker`) VALUES (`$key`)");
   
  
    // var_dump( $result);
   
   // $result = $mysqli->query("SELECT `id` FROM `Dealstock` WHERE `email`='$email'");
   
    };
    //var_dump($quotes_eod);
    //echo json_encode($quotes_eod);
    //echo "<br>";
    
  function parse_quote_edo($url_bcs) {
    $html = file_get_html($url_bcs);
    $price_edo_str = $html->find('.quotes-block__content')[1]->children(1)->children(0)->children(1)->plaintext;
    $price_edo_str = str_replace(" ", "", $price_edo_str);  // убираем пробел из цен больше 1 000 руб
    $price_edo_int = string_to_int($price_edo_str);  // делает price числом
    return $price_edo_int;
  }
  
    function string_to_int($str_value) {
      $str_with_point = str_replace(',','.',$str_value); //Меняем точку на запятую
      $float_value = floatval($str_with_point); //удаляем все лишнее, превращаем строку в число float
      return $str_with_point;
      //return $float_value;
    };
    

?>