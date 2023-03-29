<?php include 'functions/connect.php';?>

<a href="index.php">Домой</a>
<!doctype html>
    <html lang="ru">
    <head>
        <meta charset="utf-8">
       
      
    

<link rel="stylesheet"  href="css/style1.css">

     <title>Светин сайт</title>
</head>
<?php               
               $mq ="select * from category";
$query = mysqli_query($con,$mq);
while ($row = mysqli_fetch_array($query)) {
    
    $catid = $row['cat_id'];
    $cattitle = $row['cat_title'];
    echo "<li><a href='index.php?cat=$catid'>$cattitle</a></li>";
}


?>  

     <a href="contact.php">Контакты</a>             
