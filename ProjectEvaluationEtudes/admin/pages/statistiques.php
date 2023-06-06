<?php include_once "../includes/layout.php"; 

?>
    <div class="main-content">
        <h3 class="fw-bold text-capitalize">Nom d'enquete</h1>
        <h4 class="fw-semibold fs-5">Statistiques des questions</h4>
        <div class="select-question d-flex align-items-center gap-2">
            <span>Selectionner une question</span>
            <select name="question" id="" class="bg-transparent p-2 border rounded-3">
                <option value="question1">question1</option>
                <option value="question1">question1</option>
                <option value="question1">question1</option>
                <option value="question1">question1</option>
            </select>
        </div>
        <div class="chart-statistique mb-5 mt-2 ml-4">
            <canvas id="myChart"></canvas>
            <p class="text-center mt-2">Nombres d'etudiant rependus: 19</p>
        </div>

        <h3 class="fw-semibold fs-5">Commentaires des etudiant: <span class="fw-light">15</span></h3>
        <div class="commentaires border rounded-3 p-2">
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
            <p>Commentaire 1</p>
        </div>
    </div>

<?php

    include_once "../includes/footer.php"

?>