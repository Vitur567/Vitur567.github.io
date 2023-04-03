<?php 
 include ("functions/connect.php");
?>
<!doctype html>
	<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

   <link rel="shortcut icon" href="../Logo66.ico">
   <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.min.css">
 
    
      
    

<link rel="stylesheet"  href="../css/style1.css">

     <title>Светин сайт</title>
</head>
<body>
   <div class="container"><!--container jpen-->

   	<div class="head"><!--head open-->
   		<img id="logo" src="img/Log1.png">
   	</div><!--head closed-->

   	<div class="barmenu"><!--barmenu open -->

   		<ul id="menu"><!-- nav open-->
   		
<?php include ("includes/nav.php");?>

   		</ul><!--nav closed-->
<!-- Форма поиска=================================== -->
   		<div id="form">
   			<form method="get" action="result.php" enctype="multipart/form-data">
   			<input style="border-radius: 7px;" type="text" name="searchquery">
   			<input style="border-radius: 7px; background-color: #56E5DE;"  type="submit"
   			name="search" value="Найти">
   		</div>
   		
   	</div><!--barmenu closed-->

   	<div class="postarea"><!--postarea open-->


   		<div class="sta"><!--sta open-->
<?php 
$z = "SELECT * FROM contact";
$q = mysqli_query($con,$z);
$r = mysqli_fetch_array($q);

$name = $r['name'];
$surname = $r['surname'];
$email = $r['email'];
$foto = $r['img'];
$tell = $r['tell'];

?>

<h1>Мои Контакты:</h1>
<img src="<?php echo $foto; ?>" width="300" height="300">
<p><span style="color:cornflowerblue; font-size: 15pt;">Имя</span><?php echo $name; ?></p>
<p><span style="color:cornflowerblue; font-size: 15pt;">Фамилия</span><?php echo $surname; ?></p>
<p><span style="color:cornflowerblue; font-size: 15pt;">E-mail</span><?php echo $email; ?></p>
<p><span style="color:cornflowerblue; font-size: 15pt;">Телефон</span><?php echo $tell; ?></p>   		


//<?php 
 // if(isset($_POST['send'])){

   // $email = $_POST['email'];
  //  $message = $_POST['message'];
  //  if((strlen($email)<5)  or (strlen($message)<10)) {$result=1;}
  //  else
  //  {
    //    if(filter_var($email,FILTER_VALIDATE_EMAIL))
      //  {
       //     $subject = "Из Вашего сайта simplecms";
         //   $header = "from<".$email.">\r\nContent-type:text\plain: charset=utf-8";
          //  mail("xxxniknik@gmail.com",$subject,$message,$header);
           // $result=3;
       // }
       // else $result=2;
   // }
 // }
   // $ansver = "";
   // if($result)
   // {
     //   switch($result)
      //  {
        //    case 1:
          //      {
            //        $ansver = "<p style='color: red;>email tropo corto!5 mesagio tropo corto 10</p>";
             //   }break;
          //  case 2:
            //    {
              //      $ansver = "<p style='color: red;>email non coreto!</p>";
              //  }break;   
         //   case 3:
           //     {
             //       $ansver = "<p style='color: #fff;>Messagio Estato Inviato</p>";
             //   }break;     
      //  }
   // }

   //   else $ansver = "";
   ?>

    <?php
 //   echo $ansver;
   // unset($ansver);
    ?>

<!-- <center><h2>Napisaty Adminu</h2></center>
<form action="" name="f" method="POST">
    <p><input type="email" name="email" placeholder="E-mail..."</p>
    <textarea name="message" cols="22" rows="6"><?php //echo $message; ?> </textarea><br>
    <button style="border-radius: 10px; background-color: #BFD8FC;" name="send">Отправить</button></form>

 -->


 <?php
//проверяем, существуют ли переменные в массиве POST
if(!isset($_POST['fio']) and !isset($_POST['email'])){
 ?> <form action="send.php" method="post">
<input type="text" name="fio" placeholder="Укажите ФИО" required>
<input type="text" name="email" placeholder="Укажите e-mail" required>
<input type="submit" value="Отправить">
</form>
 <?php
 //показываем форму
 $fio = $_POST['fio'];
 $email = $_POST['email'];
 echo $email;
 $fio = htmlspecialchars($fio);
 $email = htmlspecialchars($email);
 $fio = urldecode($fio);
 $email = urldecode($email);
 $fio = trim($fio);
 $email = trim($email);
 if (mail("example@mail.ru", "Заявка с сайта", "ФИО:".$fio.". E-mail: ".$email ,"From: example2@mail.ru \r\n")){
 echo "Сообщение успешно отправлено";
 } else {
 echo "При отправке сообщения возникли ошибки";
 }
}
?>




   		</div><!--sta closed -->
   		
   	</div><!--postarea closed-->

   	<div class="sbar"><!--sbar open-->

<?php include("includes/saitbar.php");?>
   		
   	</div><!--sbar closed-->
   	<div class="foterarea"><!--foterarea open-->
   	
   	<?php include("includes/footer.php");?>	
   		
   	</div><!--foterarea closed-->
   	
   </div>

</body>
</html>