
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</br>
<form action="" method='post' enctype="multipart/form-data">
<?php 

include "logic.php";
$user = $_GET['user'];
$userId = returnIdUser($user);
echo "Name user : ".$user." $userId"."<br/>";

selectData($userId);
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insertData']))
    {
      insertDB($userId , $_REQUEST['task']);
      header("Location: index.php?user=".$user);
      exit;
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deleteData'])){
      deleteTask($_REQUEST['deleteTask']);
      header("Location: index.php?user=".$user);
      exit;
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['updateData'])){
      updateTask($_REQUEST['oldtask'] , $_REQUEST['updatetasks']);
      header("Location: index.php?user=".$user);
      exit;
    }
?>

<div class="form_group">
<label>add your Task</label>
<input type="text" name="task" placholder="task">
</div>
<input type="submit" name="insertData" value="insert" />

<br/><br/>
<div class="form_group">
<label>your old Task</label>
<input type="text" name="oldtask" placholder="oldtask">
</div>
<div class="form_group">
<label>Enter the update you want :</label>
<input type="text" name="updatetasks" placholder="updateTask">
</div>
<input type="submit" name="updateData" value="update" />

<br/><br/>
<div class="form_group">
<label>delete your Task</label>
<input type="text" name="deleteTask" placholder="deleteId">
</div>
<input type="submit" name="deleteData" value="delete" />
</form>

</body>
</html>