<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "myToDo";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


//sql to create table
// $sqlCreate = "CREATE TABLE MyToDo (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// MyTask VARCHAR(60) NOT NULL
// )";
// if (mysqli_query($conn , $sqlCreate)) {
//   echo "Table MyToDo created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }


//sql to insert data 
function insertDB($nameTask){
$sqlInsert = "INSERT INTO MyToDo (MyTask)
VALUES ('$nameTask')";

if (mysqli_query($GLOBALS["conn"], $sqlInsert)) {
  echo "New record created successfully"."<br>";
} else {
  echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
}
}


//sql select data 
$sqlSelsect = "SELECT id, MyTask FROM MyToDo";
$result = mysqli_query($conn, $sqlSelsect);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<br>"."id: " . $row["id"]. " - MyTask: " . $row["MyTask"]."<br>";
  }
} else {
  echo "0 results";
}


//sql update data 
function updateTask($id , $myTask){
  $sqlUpdate = "UPDATE MyToDo SET MyTask='$myTask' WHERE id=$id";
  if (mysqli_query($GLOBALS["conn"], $sqlUpdate)) {
    echo $myTask;
    echo "update successfully"."<br>";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
  }
}


//sql delete data 
function deleteTask($id){
  $sqlDelete = "DELETE FROM MyToDo WHERE ID=$id";
  if (mysqli_query($GLOBALS["conn"], $sqlDelete)) {
    echo "delete successfully"."<br>";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
  }
}

?>

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



    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['insertData']))
    {
      insertDB($_REQUEST['task']);
      header('Location: index.php');
      exit;
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['deleteData'])){
      deleteTask($_REQUEST['deleteId']);
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['updateData'])){
      updateTask($_REQUEST['updateId'] , $_REQUEST['updatetask']);
      header('Location: index.php');
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
<label>update your Task</label>
<input type="text" name="updatetask" placholder="updatetask">
</div>
<div class="form_group">
<label>Enter the id :</label>
<input type="text" name="updateId" placholder="updateId">
</div>
<input type="submit" name="updateData" value="update" />

<br/><br/>
<div class="form_group">
<label>delete your Task</label>
<input type="text" name="deleteId" placholder="deleteId">
</div>
<input type="submit" name="deleteData" value="delete" />
</form>

</body>
</html>