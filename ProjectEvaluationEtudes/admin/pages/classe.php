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
   <h1 style="text-align: center;">Classes</h1>

    <a href="add_class.php" class="btn btn-dark mb-3">+ Ajouter</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          
          <th scope="col">Class</th>
          <th scope="col">Niveau</th>
          <th scope="col">Action</th>
          </tr>
      </thead>

      <?php
        $sql = "SELECT * FROM `class`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            
            <td><?php echo $row["class_name"] ?></td>
            <td><?php echo $row["level_id"] ?></td>
            <td>
              <a href="edit_class.php?id=<?php echo $row["id_class"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="delete_class.php?id=<?php echo $row["id_class"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>