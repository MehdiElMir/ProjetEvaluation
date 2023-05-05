<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>professeur - dashboard</title>
    <link rel="stylesheet" href="./css/prof_layout.css">

</head>
<body>
    
    <header>
        
        <nav class="p-3 shadow-lg">
            <a href="/">
                <img src="./assets/logo.png" alt="logo mundiapolis" class="img-size">
            </a>
        </nav>
        
    </header>


    <!-- MAIN CONTENT -->
    <main class="main">
        
        <div class="sidebar">
            <div class="sidebar-top">
                <ul>
                    <li><p>matiere 1</p></li>
                    <li><p>matiere 2</p></li>
                    <li><p>matiere 3</p></li>
                    <li><p>matiere 4</p></li>
                    <li><p>matiere 5</p></li>
                    
                </ul>
            </div>
           
        </div>
        


        <div class="main-content">
        <h3> Nom de matière:</h3>  
        <table class="table">
        <thead>
            <tr>
            <th scope="col-2"> </th>
            <th scope="col-6">Questions </th>
            <th scope="col-4">Résultats</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
            
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                
                
                </tr>
                <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                </tr>
            </tbody>
            </table>
            <form>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Saisir une action:</label>
                <textarea class="form-control form-control-lg" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <div>
            <button type="button" class="btn btn-secondary">Afficher les commentaires</button>
            <button type="button" class="btn btn-success">Ajouter une action</button>
            </div>
</form>

    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>