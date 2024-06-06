<?php
class Blog{
  public static function addPost($title,$content,$author){
    global $mysqli;
    $mysqli->query("INSERT INTO Blog (`author`,`title`,`content`) VALUES ('$author','$title','$content')");
    return json_encode(['result'=>'success']);
  }  
   public static function getPostList(){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM Blog");
    $posts = [];
    while($row = $result->fetch_assoc()){
      $posts[] = $row;
    }
    return json_encode($posts);
  }
  public static function getPostById($id){
    global $mysqli;
    $result = $mysqli->query("SELECT * FROM Blog WHERE id='$id'");
    return json_encode($result->fetch_assoc());
  }
  public static function sendMessage(){
  $name= $_POST['name'];
  $email= $_POST['email'];
  $subject = $_POST['subject'];
  $text= $_POST['message'];
  $email= mb_strtolower($_POST['email']);
  $message= "Имя: $name\nТема письма: $subject\nПочта: $email\nСообщение: $text\n";
  mail("lebeshov@gmail.com","Письмо с сайта", $message);
  echo "posted";
  }
}
?>