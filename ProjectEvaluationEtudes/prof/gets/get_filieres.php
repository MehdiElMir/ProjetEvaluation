<?php
include '../login_process/config.php';
// Retrieve the country ID from the AJAX request
$faculty_id = $_POST['faculty_id'];

// Connect to the database and query for the cities for the selected country

$stql = "SELECT branch.id_branch, branch.branch_name FROM branch Where faculty_id = $faculty_id ;";
$result = mysqli_query($connexion, $stql);


$options = '<option value="">Select a branch</option>';
while ($res = mysqli_fetch_array($result)) {
    $branch_name = $res['branch_name'];
    $id_branch = $res['id_branch'];
    $options .= '<option value="' . $id_branch . '">' . $branch_name . '</option>';
}
// Return the HTML options to the JavaScript code
echo $options;
//--------------------------------------------------------------------

?>
