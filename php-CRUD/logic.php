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
// id INT(6) ,
// MyTask VARCHAR(60) NOT NULL
// )";
// if (mysqli_query($conn , $sqlCreate)) {
//   echo "Table MyToDo created successfully";
// } else {
//   echo "Error creating table: " . mysqli_error($conn);
// }


//sql to insert data 
function insertDB($userId , $nameTask){
$sqlInsert = "INSERT INTO MyToDo (id , MyTask)
VALUES ($userId,'$nameTask')";

if (mysqli_query($GLOBALS["conn"], $sqlInsert)) {
  echo "New record created successfully"."<br>";
} else {
  echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
}
}


//sql returnIdUser
function returnIdUser($userName){
    $sqlSelsect = "SELECT id FROM user where userName='$userName'";
    $result = mysqli_query($GLOBALS["conn"], $sqlSelsect);
    $id = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        // echo "<br>"."id: " . $row["id"]."<br>";
        $id = $row["id"];
      }
    } else {
      echo "0 results";
    }
    return $id;
}

//sql returnIdUser
function selectData($userId){
    $sqlSelsect = "SELECT id , MyTask FROM MyToDo where id='$userId'";
    $result = mysqli_query($GLOBALS["conn"], $sqlSelsect);
    $id = 0;
    if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " -My Task: " . $row["MyTask"]. "<br>";
       
      }
    } else {
      echo "0 results";
    }
   
}


//sql update data 
function updateTask($oldtask , $updatetasks){
  $sqlUpdate = "UPDATE MyToDo SET MyTask='$updatetasks' WHERE MyTask='$oldtask'";
  if (mysqli_query($GLOBALS["conn"], $sqlUpdate)) {
    echo $myTask;
    echo "update successfully"."<br>";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
  }
}


//sql delete data 
function deleteTask($deleteTask){
  $sqlDelete = "DELETE FROM MyToDo WHERE MyTask='$deleteTask'";
  if (mysqli_query($GLOBALS["conn"], $sqlDelete)) {
    echo "delete successfully"."<br>";
  } else {
    echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
  }
}




//sql to insert user
function insertUserDB($userName){
    $sqlInsert = "INSERT INTO user (userName)
    VALUES ('$userName')";
    if (mysqli_query($GLOBALS["conn"], $sqlInsert)) {
      echo "New record created successfully"."<br>";
    } else {
      echo "Error: " . $sqlInsert . "<br>" . mysqli_error($conn);
    }
    }




?>