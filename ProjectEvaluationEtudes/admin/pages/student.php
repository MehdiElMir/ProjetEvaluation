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
}
//echo "Connected successfully";

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
   <h1 style="text-align: center;">Etudiants</h1>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          
          <th scope="col">Nom</th>
          <th scope="col">Prenom</th>
          <th scope="col">Email</th>
          <th scope="col">Classe</th>
          </tr>
      </thead>
      <?php
        $sql = "SELECT * FROM `student` JOIN class AS class_name ON class_id = id_class ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            
            <td><?php echo $row["student_Fname"] ?></td>
            <td><?php echo $row["student_Lname"] ?></td>
            <td><?php echo $row["student_email"] ?></td>
            <td><?php echo $row["class_name"] ?></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>