<?php//include "../includes/layout.php" ?>


<?php
/*
$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

// Create connection
$conn = mysqli_connect($servername,$username,$password,$database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else {

    //echo"cnx etablie";
}


    $id_question = $_GET['id_question'];
    $sql = "DELETE FROM `question` WHERE id_question=$id_question";
    $result=mysqli_query($conn,$sql);
    if(result){
        header("Location: questionnaire.php?msg=Record delet successfully");

    }
    else{
        echo "failed:" . mysqli_error($conn);
    }
    ?> */
    
    
include "../includes/layout.php";

$servername = 'localhost';
$username = 'root';
$database_name ='projet_evaluation';
$password = '';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connexion établie";
}


$id_question = $_GET["id"];

$sql = "DELETE FROM `question` WHERE id_question = $id_question";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: questionnaire.php?msg=question supprimée");
} else {
  echo "Failed: " . mysqli_error($conn);
}




?>