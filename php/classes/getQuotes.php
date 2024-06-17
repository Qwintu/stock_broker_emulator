<?php
  header('Content-type: text/html; charset=utf-8');
  require_once('php/classes/simple_html_dom.php');
  
  $tickers = [
      [
        "GAZP" => "https://mfd.ru/marketdata/ticker/?id=330", 
        "LKOH" => "https://mfd.ru/marketdata/ticker/?id=632", 
        "ROSN" => "https://mfd.ru/marketdata/ticker/?id=1373",
        "SBER" => "https://mfd.ru/marketdata/ticker/?id=1463",
        "TATN" => "https://mfd.ru/marketdata/ticker/?id=1613",
        "GMKN" => "https://mfd.ru/marketdata/ticker/?id=336",
        "AFLT" => "https://mfd.ru/marketdata/ticker/?id=183",        
        "AFKS" => "https://mfd.ru/marketdata/ticker/?id=1503",
        "VTBR" => "https://mfd.ru/marketdata/ticker/?id=258",
        "NLMK" => "https://mfd.ru/marketdata/ticker/?id=913",
        "MOEX" => "https://mfd.ru/marketdata/ticker/?id=51353",
      ],
      [
        // "GAZP" => "https://www.finam.ru/quote/moex/gazp/", 
        // "LKOH" => "https://www.finam.ru/quote/moex/lkoh/", 
        // "ROSN" => "https://www.finam.ru/quote/moex/rosn/",
        // "SBER" => "https://www.finam.ru/quote/moex/sber/",
        // "TATN" => "https://www.finam.ru/quote/moex/tatn/",
        // "GMKN" => "https://www.finam.ru/quote/moex/gmkn/",
        // "AFKS" => "https://www.finam.ru/quote/moex/afks/",
        // "VTBR" => "https://www.finam.ru/quote/moex/vtbr/",
        // "NLMK" => "https://www.finam.ru/quote/moex/nlmk/",
        // "MOEX" => "https://www.finam.ru/quote/moex/moex/",
      ],
      [
        // "GAZP" => "https://bcs.ru/markets/gazp/tqbr",
        // "LKOH" => "https://bcs.ru/markets/lkoh/tqbr",
        // "ROSN" => "https://bcs.ru/markets/rosn/tqbr",
        // "SBER" => "https://bcs.ru/markets/sber/tqbr",
        // "TATN" => "https://bcs.ru/markets/tatn/tqbr",
        // "GMKN" => "https://bcs.ru/markets/gmkn/tqbr",
        // "AFKS" => "https://bcs.ru/markets/afks/tqbr",
        // "VTBR" => "https://bcs.ru/markets/vtbr/tqbr",
        // "NLMK" => "https://bcs.ru/markets/nlmk/tqbr",
        // "MOEX" => "https://bcs.ru/markets/moex/tqbr",
      ]
  ];
    
    $quotes = [];
    // $quotes_eod = [];
    
    foreach($tickers[0] as $key => $value) {
      $quotes[$key] = parse_quote_mfdru($value);
    }

    // foreach($tickers[1] as $key => $value) {
    //   $quotes[$key] = parse_quote_finam($value);
    // }

    echo json_encode($quotes);


  function parse_quote_mfdru($url_mfdru) {
    $html = file_get_html($url_mfdru);

// текущая цена
    $price_str = $html->find('.m-companytable-last')[0];
    $repls = array("&nbsp;", " ");
    $price = str_replace($repls, "", $price_str);  // убираем неразрывный пробел и пробел из цен больше 1 000 руб
    // $str_with_point = str_replace('.',',',$price); //Меняем точку на запятую
    preg_match("#([0-9\.]+)#", $price, $match);  // из парсера приходит строка длинной 44 символа непоонятно с чем. Тут убираем мусор
    $price_fl = floatval($match[0]);
   //  $price_fl = floatval($price); //удаляем все лишнее, превращаем строку в число float

// EOD
    $price_eod_str = $html->find('.mfd-tickerdata-table')[0]->children(1)->children(1)->plaintext;
    $price_eod_str = str_replace($repls, "", $price_eod_str);  // убираем неразрывный пробел и пробел из цен больше 1 000 руб
    preg_match("#([0-9\.]+)#", $price_eod_str, $match);  // из парсера приходит строка длинной 44 символа непоонятно с чем. Тут убираем мусор
    $price_eod_fl = floatval($match[0]);

// Изменение в %
    $price_str_change_percent = (($price_fl - $price_eod_fl) / $price_eod_fl) * 100;
    $price_str_change_percent = number_format($price_str_change_percent, 2, '.', '') . " %";

    $ticker_data = [$price_fl, $price_eod_fl, $price_str_change_percent];
    return $ticker_data;
  }

?>

