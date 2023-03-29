<!-- <h2 style="color: red;"><a href="detals.php?post=$post">Title</a></h2>
<img src="img/dds.png" width="100" height="100"> -->



<?php
  $select = "select * from post order by 1 DESC limit 0,5";    /* DESC-последняя добавленная новость. сщзтировка по убыванию */
    $q = mysqli_query($con,$select);

    while ($row = mysqli_fetch_array($q)) {
    	
   $category_id = $row['category_id'];
   $post_id = $row['post_id'];
   $title = $row['post_title'];
   $image = $row['post_image'];
   $content = substr($row['post_content'],0,15);
   $author = $row['post_author'];
   $date = $row['post_date'];

   echo "<div style='background: #37E3F2; width: 200px; margin: 0 auto; padding: 5px 10px 10px 5px' >";
   echo"<h2 class='recent' style='color: #fff;'>Recent Stories</h2>";
   echo"<h2><a href='detals.php?post=$post_id'>$title</a></h2>";
   echo"<img src='news_images/$image'width='200'height='150'>";


   echo"</div>";
   echo"<br>";


//   <p>$content <a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
//   <hr>
//   <p style='color: red;'>Name:$author.date:$date</p>
//   </hr>
//   </div>
//   <background>";


}



?>