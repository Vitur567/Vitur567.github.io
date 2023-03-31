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

     <title>Результат</title>
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

   		<div id="form">
   			<form method="get" action="result.php" enctype="multipart/form-data">
   			<input style="border-radius: 7px;" type="text" name="searchquery">
   			<input style="border-radius: 7px; background-color: #56E5DE;"  type="submit"
   			name="search" value="Найти">
   		</div>
   		
   	</div><!--barmenu closed-->

   	<div class="postarea"><!--postarea open-->

<?php

if(isset($_GET['search']))
{
    $get_query = $_GET['searchquery'];
    $select = "select * from post where post_title like '%$get_query%'";
                                      /*  мы ищем по полю 'post_title' но можно по 'post_keywords' */
    $q = mysqli_query($con,$select);
  

    while ($row = mysqli_fetch_array($q)) {
   //   if($row){
   $category_id = $row['category_id'];
   $post_id = $row['post_id'];
   $title = $row['post_title'];
   $image = $row['post_image'];
   $content = substr($row['post_content'],0,15);
   $author = $row['post_author'];
   $date = $row['post_date'];
 echo"<br/>";
   echo "<div style='background: #37E3F2; width: 600px; margin: 0 auto; padding:  10px 10px 10px 10px  ' >
   <h2><a href='detals.php?post=$post_id'>$title</a></h2>
   <img src='news_images/$image'width='300'height='250'>
   <p>$content <a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
   <hr>
   <p style='color: red;'>Автор:  $author        .Дата публикации:$date</p>
   </hr>
   </div>
   
   <br>";

  //  }else{echo "<script>alert('Ничего не найдено!')</script>";}
   }

    }
else
{
   include("includes/cat_post.php");
}


   ?>


   		
   		
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