<?php
  header('Content-type: text/html; charset=utf-8');
  header('Access-Control-Allow-Origin: *');
  session_start();
  $uri = explode('/',$_SERVER['REQUEST_URI']);
  require_once('php/classes/db.php');
  require_once('php/classes/User.php');
  require_once('php/classes/Blog.php');
  
  
  $request = [
    'regUser'=>function(){return User::regUser();},
    'authUser'=>function(){return User::authUser();},
    'getPortfolio'=>function(){return User::getPortfolio($_SESSION['id']);},
    'addPost'=>function(){return Blog::addPost($_POST['title'],$_POST['content'],$_POST['author']);},
    'sendMessage'=>function(){return Blog::sendMessage();},
    'getPostList'=>function(){return Blog::getPostList();},
    'getPostById'=>function(){return Blog::getPostById($_POST['id']);},
    'updateUser'=>function(){return User::updateUser();},
    'getAvlbMoney'=>function(){return User::getAvlbMoney($_SESSION['id']);},
    'getUserById'=>function(){return User::getUserById($_SESSION['id']);},
    'getTickerList'=>function(){return User::getTickerList($_SESSION['id']);},
    'getInfoTicker'=>function(){return User::getInfoTicker();},
    'getUserInfo'=>function(){return User::getUserInfo($_SESSION['id']);},
    'getDealList'=>function(){return User::getDealList($_SESSION['id']);},
    'uploadUserAvatar'=>function(){return User::uploadUserAvatar($_FILES['avatar']);},
    'exit'=>function(){session_destroy(); header('Location: /login'); },
    'emailSubmit'=>function(){
      $email = $_POST['email'];
      $name = $_POST['name'];
      $msg = $_POST['msg'];
      mail('tilda_flex@mail.ru','Письмо с сайта brokerem',"E-mail: $email\nИмя: $name\nСообщение: $msg");
      return json_encode(['result'=>'success']);
    }
  ];
  foreach($request as $key=>$handler){
    if($uri[1]==$key){
      exit($handler());
    }
  }  
  
    // if($uri[1]=='' and empty($_SESSION['id'])){
    if($uri[1]!='login' and empty($_SESSION['id'])){
    $title = "Главная";
    $h1 = "Проект";
    header('Location: /login');
  }else if($uri[1]=='reg'){
    $title = "Регистрация";
    $h1 = "Регистрация";
    $content = file_get_contents('content/reg.html');
    require_once('templates/head.php');  
  }else if($uri[1]=='lk' and $_SESSION['id']!=0){
    $title = "Личный кабинет";
    $content = file_get_contents('content/trading.php');
    require_once('templates/maintemplate.php');    
  }else if($uri[1]=='login'){
    $title = "Вход на сайт";
    $h1 = "Вход на сайт";
    $content = file_get_contents('content/login.html');
    require_once('templates/head.php');
  }else if($uri[1]=='getQuotes'){
    require_once('php/classes/getQuotes.php');//подключение парсера
  }else if($uri[1]=='getQuotes_eod'){
    require_once('php/classes/getQuotes_eod.php');//подключение парсера
  }else if($uri[1]=='transaction'){
    require_once('php/classes/transaction.php');//подключение блока транзакций
  }else if($uri[1]=='contact-us'){
    $title = "Обратная связь";
    $content = file_get_contents('content/contact.html');
    require_once('templates/maintemplate.php');
  }else if($uri[1]=='addIdea'){
    $title = "Добавление идеи";
    $content = file_get_contents('content/addPost.html');
    require_once('templates/maintemplate.php');
  }else if($uri[1]=='idea-list'){
    $title = "Все идеи";
    $content = file_get_contents('content/postList.html');
    require_once('templates/maintemplate.php');
  }else if($uri[1]=='idea'){
    $title = "Чтение идеи";
    $content = file_get_contents('content/post.html');
    require_once('templates/maintemplate.php');    
  }else if($uri[1]=='info'){
    $title = "Информация";
    $content = file_get_contents('content/info.php');
    require_once('templates/maintemplate.php');   
  }else if($uri[1]=='trading'){
    $title = "Торговый терминал";
    $content = file_get_contents('content/trading.php');
    require_once('templates/maintemplate.php');
  }else if($uri[1]=='history'){
    $title = "История";
    $content = file_get_contents('content/history.html');
    require_once('templates/maintemplate.php');
  }  else {
    $title = "404";
    $content = file_get_contents('content/404.html');
    require_once('templates/maintemplate.php');
  }


?>
