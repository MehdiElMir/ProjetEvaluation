

<?php include "../includes/layout.php" ?>

<?php 

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
?>




<div class="main-content">
    <?php
    if (isset($_GET["msg"])) {
      $msg = $_GET["msg"];
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
    ?>
   <h1 style="text-align: center;">QUESTIONNAIRE</h1>

    <a href="questions.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          
          <th scope="col">QUESTION</th>
          <th scope="col">ACTION</th>
          </tr>
      </thead>

      <?php
        $sql = "SELECT * FROM `question`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            
            <td><?php echo $row["question_phrase"] ?></td>

            <td>
              <a href="edit_question.php?id=<?php echo $row["id_question"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete_question.php?id=<?php echo $row["id_question"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>