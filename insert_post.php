<?php 
 include ("functions/connect.php");
?>





<html>
<head>
	<title>Вставить страницу</title>
</head>
<body bgcolor="#ccc">

	<form method="post" action="insert_post.php" enctype="multipart/form-data">
		<table width="300">

			<tr>
				<td><h2>Вставить статью</h2></td>
			</tr>
			<tr>
				
				<td>
					<h4>Категория</h4>
          
                    <select name="cat">
                    	<option value="null">Выбрать категорию</option>

                    	<?php

                    	$mq = "select * from category";
                    	$query = mysqli_query($con,$mq);

                    	while ($row = mysqli_fetch_array($query)) {
                    		
                    		$catid = $row['cat_id'];
                    		$cattitle = $row['cat_title'];
                    		echo "<option value='$catid'>$cattitle</option>";
                    	}
                    	?>
                    </select>


				</td>
			</tr>
			<tr>
				<td>
				<h4>Название статьи</h4>
				<input type="text" name="post_title"></td>
			</tr>
			<tr>
				<td>
					<h4>Автор статьи</h4>
					<input type="text" name="post_author"></td>
			</tr>
			<tr>
				<td>
					<h4>post keywords</h4>
					<input type="text" name="post_keywords"></td>
			</tr>

<tr>
				<td>
					<h4>Изображение</h4>
					<input type="file" name="post_image"></td>
			</tr>

<tr>
				<td>
					<h4>Содержание статьи</h4>
					<textarea name="post_content" cols="25" rows="10">Easi</textarea>
					<input type="submit" name="post" value="add post"></td>
			</tr>

		</table>

	</form>
	
</body>
</html>

<?php
$datenew =  date('l jS \of F Y h:i:s ');         /*    определяем время публикации */
        if (isset($_POST['post'])) {
         	
         	$post_title = $_POST['post_title'];
         	$post_date = date('l jS \of F Y h:i:s '); 
         	$post_cat = $_POST['cat'];
         	$post_author = $_POST['post_author'];
         	$post_keywords = $_POST['post_keywords'];
         	$post_image = $_FILES['post_image']['name'];
         	$post_image_tmp = $_FILES['post_image']['tmp_name'];

         	$post_content = $_POST['post_content'];

             if($post_title == '' OR $post_cat=='null' OR $post_author=='' OR $post_keywords==''
             	OR $post_image=='' OR $post_content=='')
             {
             echo"<script> alert' не отправлены'</script>";
            //    exit();
         } 
         else
         {
            move_uploaded_file($post_image_tmp, "news_images/$post_image");
           $insert = "INSERT INTO post (category_id,post_title,post_date,post_author,post_keywords,post_image,
           	post_content) values('$post_cat','$post_title','$post_date','$post_author','$post_keywords','$post_image','$post_content')";
            $q = mysqli_query($con,$insert);
            if($q)
            {
				echo $post_date;
            	echo"<script> alert('Контент добавлен')</script>";
            }
            else
            {
            	echo"<script> alert('Контент  не добавлен')</script>";
            }

         }

}

         ?>