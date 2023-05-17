<?php include "../includes/layout.php" ?>

<<<<<<< HEAD
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
<?php
echo "<div class='main-content'>";
        
echo "<div class='enquete enquete--header d-flex align-items-center justify-content-between mb-5'>
<h1>Enquetes Disponible</h1>
<a href='ajouterEnquete.php' class='btn btn-primary' style='height: fit-content;'>
    Ajouter Enquete
</a>
</div>";    
echo "</div>";

$sql = "SELECT *,branch.branch_name FROM survey JOIN level ON level.id_level=survey.level_id JOIN branch ON branch.id_branch=level.branch_id JOIN semestre ON semestre.id_semestre=survey.semestre_id"; 

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
  
    while($row = mysqli_fetch_assoc($result)) {
        if($row['survey_statut']=="Finit"){
        echo "<div class='main-content'>
              <div class='cards'> ";
              
=======
    <div class="main-content">
        <div class="enquete enquete--header d-flex align-items-center justify-content-between mb-5">
            <h1>Enquetes Disponible</h1>
            <a href="ajouterEnquete.php" class="btn btn-primary" style="height: fit-content;">
                Ajouter Enquete
            </a>
        </div>
        <div class="flex-wrap d-flex cards-container gap-4">
            <div class="cards">
                <h5>1ACI Info 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>1ACI Indus 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>1ACI Aero 2022</h3>
                <div class="progress">
                    <span class="progress-limit">25% (En cours)</span>
                    <div class="progress-bar-limit">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>2ACI Info 2022</h3>
                <div class="progress">
                    <span class="progress-limit">25% (En cours)</span>
                    <div class="progress-bar-limit">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>3ACI Info 2022</h3>
                <div class="progress">
                    <span class="progress-limit">25% (En cours)</span>
                    <div class="progress-bar-limit">
                        <span></span>
                    </div>
                </div>
            </div>
>>>>>>> bd1b10ae8d10176fd8157ccc500c825b615fbb8f
            
         echo $row['branch_name'];
         echo"<br>";
         echo  "semestre N:" . $row['semestre_id'];

         echo "<br><br>";
         echo "créer à :".$row['survey_created_at'] ;
         
        
        echo"<div class='progress'>
        <span>Finit</span>
        <div class='progress-bar'>
            <span></span>
        </div></div>";

        echo"</div></div> ";
}

 if($row['survey_statut']=="En cours"){
        echo "<div class='main-content'>
              <div class='cards'> ";
              
            
         echo $row['branch_name'];
         echo"<br>";
         echo  "semestre N:" . $row['semestre_id'];

         echo "<br><br>";
         echo "créer à :".$row['survey_created_at'] ;
         
        
        echo "<div class='progress'>
                    <span class='progress-limit'>(En cours)</span>
                    <div class='progress-bar-limit'>
                        <span></span>
                    </div>
              </div>";

        echo"</div></div> ";
}



}

}

?>  

<?php include "../includes/footer.php" ?>