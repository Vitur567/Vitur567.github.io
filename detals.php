<?php
include("functions/connect.php");
 ?>
 <!doctype html>
	<html lang="ru">
	<head>
	
    
<link rel="stylesheet"  href="css/style2.css">

     <title>simple_site</title>
</head>
<body>
	
<div class="container">
	
	<div class="head">
		<img id="logo" src="img/Log1.png">
		
	</div>
</div>

<!--<div class="barmenu" style="padding-left: 0px; margin-left: 200px;">--barmenu open --

   		<ul id="menu">-- nav open--   		


   		</ul>--nav closed--> 

   	<!--	<div id="form">
   			<form method="get" action="result.php" enctype="multipart/form-data">
   			<input style="border-radius: 7px;" type="text" name="searchquery">
   			<input style="border-radius: 7px; background-color: #56E5DE;"  type="submit"
   			name="search" value="Найти">
   		</div>
   		
   	</div>--barmenu closed-->

   	<div class="barmenu1" style = 'margin-left: 546px;' >
   		<ul id="menu">
<?php include ("includes/nav.php");?>

	</ul>
</div>

<?php
if (isset($_GET['post'])) {              /*  у нас есть переменной 'post' */
	$post_id = $_GET['post'];           /*   при помощи GET получаем значение переменной  */

 $get_post = "select * from post where post_id='$post_id'";  /*  и подставляем значение этой переменной в запрос к базе */
$run = mysqli_query($con,$get_post);
while ($ro = mysqli_fetch_array($run)) {
	
	  $post_new_id = $ro['post_id'];
    $post_title = $ro['post_title'];
    $post_date = $ro['post_date'];
    $post_author = $ro['post_author'];
    $post_image = $ro['post_image'];
    $post_content = $ro['post_content'];

    echo "<div class='sta'>
          <h2 style='color: red;'>$post_title</h2>
      <a href='news_images/$post_image'>   <img src='news_images/$post_image'width='300'height='300'></a> 
          <p>$post_content</p>
          <span style='color: red;'>Опубликовал статью:<i><b>$post_author</b></i>&nbsp;&nbsp;</span>
          </div>
    ";
   // echo"<h2>$post_new_id</h2>";

}

}
//  include("includes/comments_form.php");
 ?>
<div class="comments"><!--Comments-->
	<form action="detals.php?post=<?php echo $post_new_id ?>" method="post">
		<input type="text" name="comment_name"><br>
		<input type="text" name="comment_email"><br>
		<textarea name="comment_text" cols="50" rows="10"></textarea><br>
		<input type="submit" name="submit" value="Добавь комментарий">		
	</form>
	
</div><!-- Comments-->

<?php
if(isset($_POST['comment_text']))
{
$post_com_id = $post_new_id;
$comment_name = $_POST['comment_name'];
$comment_email = $_POST['comment_email'];
$comment_text = $_POST['comment_text'];
$status = "unapprove";

if($comment_name == '' OR $comment_email == '' OR $comment_text == '')
{
	echo"<script>alert('Поля не заполнены')</script>";
  echo"<script>window.open('detals.php?post=$post_id')</script>";
   exit();
}
else
{
$query_comment = "insert into comments (post_id,comment_name,comment_email,comment_text,status)
values('$post_com_id','$comment_name','$comment_email','$comment_text','$status')";

$run_query = mysqli_query($con,$query_comment);
if(mysqli_query($con,$run_query))
{
	echo"<script>alert('Ваш контент не добавленн!')</script>";
	echo"<script>window.open('detals.php?post=$post_id')</script>";
	exit();
}
else
{
	echo"<script>alert('Ваш контент добавленн!')</script>";
	echo"<script>window.open('detals.php?post=$post_id')</script>";
}

}

}

?>
<?php 


    $zq = "select * from comments where post_id='$post_new_id' AND status='approve'";
    $q = mysqli_query($con,$zq);
    echo"<br><br>";
    while($row = mysqli_fetch_array($q))
    {

    	echo"<h2 style='margin-left: 50px;'>$post_new_id</h2>";
    	echo"<a style='color: red;padding:  10px 10px 10px 170px '>Имя:_____</a>";
    	
       echo $row['comment_name'];
       echo" <br>";
       echo"<a style='color: blue;padding:  10px 10px 10px 150px '>Комментарий:_</a>";
       echo $row['comment_text'];
     // echo" <br><br>";
      echo"<hr>";
    }

?>

<div class="foterarea" style ='margin-left: 543px;'><!--foterarea open-->
   	
   	<?php include("includes/footer.php");?>	
   		
   	</div><!--foterarea closed-->
   	

	</body>


</html>
