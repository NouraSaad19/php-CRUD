<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</br>
<form action="user.php" method='post' enctype="multipart/form-data">
<?php  
   
    include "logic.php";
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insertData']))
    {
      $name = $_POST['user'];
    //   insertUserDB($_REQUEST['user']);
      header("Location: index.php?user=".$name);
      exit;
    }
?>

<div class="form_group">
<label>user</label>
<input type="text" name="user" placholder="user">
</div>
<input type="submit" name="insertData" value="insert" />


</body>
</html>
