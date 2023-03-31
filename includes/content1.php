<?php
	if (!isset($_GET['cat'])) {
		
        $select1 = "select * from post   limit 3,5";
        $q1 = mysqli_query($con,$select1);
      $nom = 0;
        while ($row = mysqli_fetch_array($q1)) {
          
       $category_id = $row['category_id'];
       $post_id = $row['post_id'];
       $title = $row['post_title'];
       $image = $row['post_image'];
       $content = substr($row['post_content'],0,15);    /* функция substr определяет количетво текста выводимого */
       $author = $row['post_author'];
       $date = $row['post_date'];
      
      $nom++;
      
            
       echo"<br/>";
       echo"<div ></div>";
       echo " <div class='a2' style='display: flex;
       justify-content: space-between;	'>
       <div style='
       background: #37E3F2; width: 200px;  padding:  10px 10px 10px 10px  ' >
       <h2><a href='detals.php?post=$post_id'>$title</a></h2>
       <a href='../news_images/$image'> <img src='news_images/$image'width='100'height='100'></a> 
      
       <p >$content<a style='color: red;' href='detals.php?post=$post_id'>Полный текст</a></p>
       <hr>
       <p style='color: red;'>Автор:  $author     </p><p>    .Дата публикации:$date</p>
       </hr>
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