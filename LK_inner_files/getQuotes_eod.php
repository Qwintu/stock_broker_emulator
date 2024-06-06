<?php
  header('Content-type: text/html; charset=utf-8');
  require_once('simple_html_dom.php');
  
  $tickers = [
        [
        "GAZP" => "https://www.finam.ru/quote/moex-akcii/gazprom/", 
        "LKOH" => "https://www.finam.ru/quote/moex-akcii/lukoil/", 
        "ROSN" => "https://www.finam.ru/quote/moex-akcii/rosneft/",
        "SBER" => "https://www.finam.ru/quote/moex-akcii/sberbank/",
        "TATN" => "https://www.finam.ru/quote/moex-akcii/tatneft-3",
        "GMKN" => "https://www.finam.ru/quote/moex-akcii/nornickel-gmk",
        "POLY" => "https://www.finam.ru/quote/moex-akcii/polymetal-international-plc/",
        "AFKS" => "https://www.finam.ru/quote/moex-akcii/afk-sistema",
        "VTBR" => "https://www.finam.ru/quote/moex-akcii/vtb/",
        "NLMK" => "https://www.finam.ru/quote/moex-akcii/nlmk-ao/",
        "MOEX" => "https://www.finam.ru/quote/moex-akcii/moscowexchange/",
        ],
        [
        "GAZP" => "https://broker.ru/quotes/gazp",
        "LKOH" => "https://broker.ru/quotes/lkoh",
        "ROSN" => "https://broker.ru/quotes/rosn",
        "SBER" => "https://broker.ru/quotes/sber",
        "TATN" => "https://broker.ru/quotes/TATN",
        "GMKN" => "https://broker.ru/quotes/GMKN",
        "POLY" => "https://broker.ru/quotes/POLY",
        "AFKS" => "https://broker.ru/quotes/AFKS",
        "VTBR" => "https://broker.ru/quotes/VTBR",
        "NLMK" => "https://broker.ru/quotes/NLMK",
        "MOEX" => "https://broker.ru/quotes/MOEX",
        ]
      ];
    
    $quotes_eod = [];
    
    foreach($tickers[1] as $key => $value) {
    $quotes_eod[$key] = parse_quote_edo($value);
    };
    //var_dump($quotes_eod);
    echo json_encode($quotes_eod);
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