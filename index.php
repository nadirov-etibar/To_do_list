<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todolist";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    die("Failed connection") or mysqli_error($conn);
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
<div>
    <?php
        $select = "select * from tasks where done_status = false";

        $resultSelect = mysqli_query($conn, $select);


        if (mysqli_num_rows($resultSelect) > 0) {
        while ($row = mysqli_fetch_assoc($resultSelect)) {
                echo "<div  class='tasks'>
                        <p class='taskName'>".$row["task_name"]."</p>";
                ?>
                            <form action="" method="post">
                                <input type="submit" class="delete" name="delete" value="Delete">
                                <input type="button" class="edit" name="edit" value="Edit" onclick="editTask(this)">
                                <input type="submit" class="done" name="done" value="Done">
                                <input type="hidden" name="rowid" id="id" value="<?php echo $row['task_id']?>">
                            </form>

                        </div>
                <?php
            }
        }
    ?>
</div>
<div>
    <?php
        $select = "select * from tasks where done_status=true";

        $resultSelect = mysqli_query($conn, $select);


        if (mysqli_num_rows($resultSelect) > 0) {
            while ($row = mysqli_fetch_assoc($resultSelect)) {
                echo "<div class='tasks'>
                        <p class='doneTaskName'>".$row["task_name"]."</p>";
                ?>
                            <form action="" method="post">
                                <input type="submit" class="delete" name="delete" value="Delete">
                                <input type="button" class="edit" name="edit" value="Edit" onclick="editTask(this)">
                                <input type="hidden" name="rowid" id="id" value="<?php echo $row['task_id']?>">
                            </form>

                        </div>
                 <?php
            }
        }
    ?>
</div>

<p id="addTask" onclick="addTask(this)"><i class="fas fa-plus"></i>add task</p>

</div>
<script src="js/main.js"></script>
</body>
</html>

<?php
    if (isset($_POST["submit"])){
        $task = $_POST["newTask"];

        if ($task !== "") {
            $sql = "INSERT INTO tasks(task_name, done_status) values ('$task', false)";
            mysqli_query($conn, $sql);
        }

        echo "<meta http-equiv='Refresh' content='0'; url='index.php'/>";
    }
    
    if (isset($_POST["delete"])){
        $delete = "delete from tasks where task_id=".$_POST["rowid"];

        mysqli_query($conn, $delete);
        echo "<meta http-equiv='Refresh' content='0'; url='index.php'/>";
    }

    if (isset($_POST["edit"])){
        $editTask = $_POST["editTask"];

        if ($editTask !== ""){
            $edit = "update tasks set task_name='$editTask' where task_id=".$_POST["rowid"];

            mysqli_query($conn, $edit);
        }

        echo "<meta http-equiv='Refresh' content='0'; url='index.php'/>";
    }

    if (isset($_POST["done"])){
        $done = "update tasks set done_status=true where task_id=".$_POST["rowid"];
        mysqli_query($conn, $done);
        echo "<meta http-equiv='Refresh' content='0'; url='index.php'/>";
    }

mysqli_close($conn);
?>
