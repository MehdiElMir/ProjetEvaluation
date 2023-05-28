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
    <div class='main-content'>
        
        <div class='enquete enquete--header d-flex align-items-center justify-content-between mb-5'>
            <h1>Enquetes Disponible</h1>
            <a href='ajouterEnquete.php' class='btn btn-primary' style='height: fit-content;'>
            Ajouter Enquete
            </a>
        </div>    

<?php

$sql = "SELECT *,branch.branch_name FROM survey JOIN level ON level.id_level=survey.level_id JOIN branch ON branch.id_branch=level.branch_id JOIN semestre ON semestre.id_semestre=survey.semestre_id"; 

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
           ?> <div class="cards-container"> <?php
            while($row = mysqli_fetch_assoc($result)) {

                
                if($row['survey_statut']=="Finit"){
                    ?>
                    <div class='cards'>
                                
                        <?php echo $row['branch_name']; ?>
                        <br>
                        <?php echo  "semestre N:" . $row['semestre_id']; ?>

                        <br><br>
                        <?php echo "créer à :".$row['survey_created_at'] ; ?>
                        
                        
                        <div class='progress'>
                            <span>Finit</span>
                            <div class='progress-bar'>
                                
                            </div>
                        </div>

                    </div> <?php } 

if($row['survey_statut']=="Prête"){
    ?>
    <div class='cards'>
                
        <?php echo $row['branch_name']; ?>
        <br>
        <?php echo  "semestre N:" . $row['semestre_id']; ?>

        <br><br>
        <?php echo "créer à :".$row['survey_created_at'] ; ?>
        
        <div class='progress'>
            <span>Prête</span>
            <div class='progress-bar ready'></div>
        </div>


    </div> <?php } 

        if($row['survey_statut']=="En cours"){
                
            ?>
                <div class='cards'> 
                    <?php echo $row['branch_name']; ?>
                    <br>
                    <?php echo  "semestre N:" . $row['semestre_id']; ?>

                    <br><br>
                    <?php echo "créer à :".$row['survey_created_at'] ;?>
                    
                    
                    <div class='progress'>
                        <span class='progress-limit'>(En cours)</span>
                        <div class='progress-bar-limit'>
                            
                        </div>
                    </div>
                </div>
        <?php } ?>
        
        <?php 

}

}
?> </div>
</div>  

<?php include "../includes/footer.php" ?>