<?php 

 session_start();

$user = 'root';
$pass = '';

$db = 'project_database';
$mysqli = new mysqli('localhost', $user, $pass, $db) or die(mysqli_error($mysqli));

    $id = 0;
    $update = false;
    $name = '';
    

    if (isset($_POST['save'])) {
        $name = $_POST["name"];
            
        $mysqli->query("INSERT INTO final_project (name) VALUES ('$name')") or
        die($mysqli->error);
        
        header("Location:index.php");
    
    }
    
    if (isset($_GET["delete"])) {
        $id = $_GET["delete"];
            
        $result = $mysqli->query("DELETE FROM final_project WHERE id=$id") or
        die($mysqli->error);
       
        header("Location:index.php");
    }

    if (isset($_GET["edit"])) {
        $id = $_GET["edit"];
        $update = true;

        $result = $mysqli->query("SELECT * FROM final_project WHERE id=$id") or
        die($mysqli->error);

        while($row = mysqli_fetch_assoc($result)) {
            $name = $row["name"];
            $id = $row["id"];
        }

    }

    if (isset($_POST['update'])){
        $name = $_POST['name']; 
        $id = $_POST['id'];

        $mysqli->query("UPDATE final_project SET name='$name' WHERE id=$id") or
        die($mysqli->error);

        header("Location:index.php");
    }
?>