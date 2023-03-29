<?php

if(isset($_GET['cat']))
{
    $cat_id = $_GET['cat'];
    $select = "select * from post where category_id='$cat_id'";
    $q = mysqli_query($con,$select);

    while ($row = mysqli_fetch_array($q)) {
    	
   $category_id = $row['category_id'];
   $post_id = $row['post_id'];
   $title = $row['post_title'];
   $image = $row['post_image'];
   $content = substr($row['post_content'],0,150);
   $author = $row['post_author'];
   $date = $row['post_date'];

   echo "<div style='background: #37E3F2; width: 600px; margin: 0 auto; padding:  10px 10px 10px 10px  ' >
   <h2><a href='detals.php?post=$post_id'>$title</a></h2>
   <img src='news_images/$image'width='200'height='200'>
   <p>$content <a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
   <hr>
   <p style='color: red;'>Автор:  $author        .Дата публикации:$date</p>
   </hr>
   </div>
   <background>
   <br>";

     }

    }
?>