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

<?php $datenew =  date('l jS \of F Y h:i:s ');
$prob = '  ';
echo "<div style = 'background-color: #e2f28683; font-size: 12px;'>Время когда Вы зашли на сайт: $prob &nbsp;$datenew</div>";  
 ?>
   		<div class="sta"><!--sta open-->

   		<?php include("includes/content.php");?>

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