<?php 
include "../includes/layout.php";

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
        <h3>Actions des Enseignants</h3>
        <div class="col-sm-5">
            <br>
         <h3>
         <input type="search" placeholder="chercher..." class="form-control search-input" data-table="table-prof"/>
         </h3>
         <br>
        </div>
        <table class="table-prof table" namz="">
            <thead>
                <tr>
                    <th class="p-2" scope="col">Nom d'enseignant</th>
                    <th>Module enseigner</th>
                    <th>Action proposer</th>
                    
                </tr>
            </thead>

        <?php
      

        
        
        $sql = "SELECT * FROM professeur join subject on professeur.id_professeur = subject.professeur_id  
                                         join action on professeur.id_professeur = action.professeur_id  ";
        
        $result = mysqli_query($conn, $sql);

       $index = 0;
        while($row = mysqli_fetch_assoc($result)) {
            ?>
            
            <tr><td><?php echo$row['professor_Fname']." ".$row['professor_Lname'] ?></td>
            <td><?php echo $row['subject_name'] ?></td>
            
            <td>
            <button type='button' class='btn' data-bs-toggle='modal' data-bs-target=<?php echo"#Modal-$index" ?>>
                Action
            </button>   
    
            <div class='modal fade' id=<?php echo"Modal-$index" ?> tabindex='-1' aria-hidden='true'>
                <div class='modal-dialog'>
                    <div class='modal-content'>
                        <div class='modal-header'>
                        <h1 class='modal-title fs-5' id='exampleModalLabel'>Action du prof</h1>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                        </div>
                        <div class='modal-body'><?php
                         echo $row['action_description'] ;
                        ?></div>
                    </div>
                </div>
            </div>
        </td>
          
            </tr>
            
          <?php
          $index++;
          }
        ?> 




<!--
            <tbody>
                
                    <td class="p-2">enseignant 1</td>
                    <td>electro statique</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Action
                        </button>   

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action prof</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    chi haja hna yktebha lprof
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="p-2">enseignant 1</td>
                    <td>electro statique</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Action
                        </button>   
                   
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action prof</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    chi haja hna yktebha lprof
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="p-2">enseignant 1</td>
                    <td>electro statique</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Action
                        </button>   
                     
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action prof</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    chi haja hna yktebha lprof
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="p-2">enseignant 1</td>
                    <td>electro statique</td>
                    <td>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Action
                        </button>   
                        
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Action prof</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    chi haja hna yktebha lprof
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        -->
        </table>
    </div>
    <script>
  (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
          var search_input;

          function _onInputSearch(e) {
              search_input = e.target;
              var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
              myArray.forEach.call(tables, function(table) {
                  myArray.forEach.call(table.tBodies, function(tbody) {
                      myArray.forEach.call(tbody.rows, function(row) {
                          var text_content = row.textContent.toLowerCase();
                          var search_val = search_input.value.toLowerCase();
                          row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                      });
                  });
              });
          }

          return {
              init: function() {
                  var inputs = document.getElementsByClassName('search-input');
                  myArray.forEach.call(inputs, function(input) {
                      input.oninput = _onInputSearch;
                  });
              }
          };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
          if (document.readyState === 'complete') {
              TableFilter.init();
          }
      });

  })(document);
</script>
<?php include "../includes/footer.php" ?>