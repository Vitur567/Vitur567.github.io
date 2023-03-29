	<?php
	if (!isset($_GET['cat'])) {
		
	
    $select = "select * from post order by rand() ";
    $q = mysqli_query($con,$select);

    while ($row = mysqli_fetch_array($q)) {
    	
   $category_id = $row['category_id'];
   $post_id = $row['post_id'];
   $title = $row['post_title'];
   $image = $row['post_image'];
   $content = substr($row['post_content'],0,150);    /* функция substr определяет количетво текста выводимого */
   $author = $row['post_author'];
   $date = $row['post_date'];

   echo"<br/>";
   echo "<div style='background: #37E3F2; width: 600px; margin: 0 auto; padding:  10px 10px 10px 10px  ' >
   <h2><a href='detals.php?post=$post_id'>$title</a></h2>
   <a href='../news_images/$image'> <img src='news_images/$image'width='300'height='250'></a> 

   <p >$content<a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
   <hr>
   <p style='color: red;'>Автор:  $author     </p><p>    .Дата публикации:$date</p>
   </hr>
   </div>
   <background>
   <br>";

    }

    }
else
{
	include("includes/cat_post.php");
}

?>
<script language="JavaScript">
  function picture($image){
    window.open("news_images/$image","newwindow",
      config = "width: 1000px, height 1000px,toolbar=0,location=0,directories=0,status=1,menubar=0,scrollbars=0,resizable=0");
  }
  </script>