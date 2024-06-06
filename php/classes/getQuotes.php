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
    
    $quotes = [];
    $quotes_eod = [];
    
      foreach($tickers[0] as $key => $value) {
        $quotes[$key] = parse_quote_finam($value);
      }
        echo json_encode($quotes);
        //echo "<br>";
      
     //   foreach($tickers[1] as $key => $value) {
     //   $quotes_eod[$key] = parse_quote_edo($value);
     //   //echo "<br>";
     //   }
     //   echo json_encode($quotes);


  function parse_quote_finam($url_finam) {
    $html = file_get_html($url_finam);
    
    //foreach($html->find('.PriceInformation__price--26G') as $price_str) {
    $price_str = $html->find('.PriceInformation__price--26G')[0];
    
    //$price = explode(" ", $price_str->plaintext);     // текущая цена
    $price_str = htmlentities($price_str->plaintext, null, 'utf-8');  // нужна для работы след команды с &nbsp;
    $price = str_replace("&nbsp;", "", $price_str);  // убираем неразрывный пробел из цен больше 1 000 руб
    $price = str_replace(" RUB", "", $price);
    $price = string_to_int($price);  // делает price числом
    $price_print = number_format(string_to_int($price), 2); // дописывает перед печатью два нуля после запятой, если число целое, возвращает строку 
    //};
    
    $price_str_change = $html->find('.PriceInformation__subContainer--2qx')[0];
    $price_str_change_rub = $price_str_change->first_child()->plaintext;  // изменение тикера в рублях
    $price_change_rub_int = string_to_int($price_str_change_rub);         // возвращает число
    $price_change_rub_print = number_format(string_to_int($price_change_rub_int), 2);   // возвращает строку
    
    
    $price_str_change_percent = $price_str_change->last_child()->plaintext;  // изменение тикера в процентах
    $price_str_change_percent = trim($price_str_change_percent, "()");  // строка
    
    $ticker_data = [$price, $price_print, $price_change_rub_int, $price_change_rub_print, $price_str_change_percent];
    
    return $ticker_data;
    
  };
  
  function parse_quote_edo($url_bcs) {
    $html = file_get_html($url_bcs);
    $price_edo_str = $html->find('.quotes-block__content')[1]->children(1)->children(0)->children(1)->plaintext;
    $price_edo_str = str_replace(" ", "", $price_edo_str);
    $price_edo_int = string_to_int($price_edo_str);  // делает price числом
    //echo $price_edo_int;
  }
  
    function string_to_int($str_value) {
      $str_with_point = str_replace(',','.',$str_value); //Меняем точку на запятую
      $float_value = floatval($str_with_point); //удаляем все лишнее, превращаем строку в число float
      return $float_value;
    };
    

?>
