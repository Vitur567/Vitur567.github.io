	<?php
	if (!isset($_GET['cat'])) {
		
	
    $select = "select * from post limit 0,3 ";
    $q = mysqli_query($con,$select);
$nom = 0;
    while ($row = mysqli_fetch_array($q)) {
    	
   $category_id = $row['category_id'];
   $post_id = $row['post_id'];
   $title = $row['post_title'];
   $image = $row['post_image'];
   $content = substr($row['post_content'],0,15);    /* функция substr определяет количетво текста выводимого */
   $author = $row['post_author'];
   $date = $row['post_date'];
 
$nom++;

echo $nom;



   echo"<br/>";
   echo"<div ></div>";
   echo " <div class='a1' style='display: flex;
   justify-content: space-between;	'>
   <div style='
   background: #37E3F2; width: 200px;  padding:  10px 10px 10px 10px  ' >
   <h2><a href='detals.php?post=$post_id'>$title</a></h2>
   <a href='../news_images/$image'> <img src='news_images/$image'width='100'height='100'></a> 

   <p >$content<a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
   <hr>
   <p style='color: red;'>Автор:  $author     </p><p>    .Дата публикации:$date</p>
   
   </div>
  </div> 
   <br>";
  
     }

 

  }   
else
{
	include("includes/cat_post.php");
}
  
?>
