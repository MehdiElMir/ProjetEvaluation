<?php include "../includes/layout.php" ?>

    <div class="main-content">
        
        <h1 class="mb-5">Archives des Enquêtes</h1>

        <div class="archive archive-filters d-flex gap-2 mb-5">
            <select name="filieres" id="" class="flex-grow-1 bg-transparent border border-black rounded-3 px-4">
                <option value="filieres">filieres</option>
                <option value="filieres1">filieres1</option>
                <option value="filieres2">filieres2</option>
                <option value="filieres3">filieres3</option>
            </select>
            <select name="annee universitaire" id="" class="flex-grow-1 bg-transparent border border-black rounded-3 px-4">
                <option value="annee universitaire">annee universitaire</option>
                <option value="2020-2021">2020-2021</option>
                <option value="2021-2022">2021-2022</option>
                <option value="2022-2023">2022-2023</option>
            </select>
            <button class="btn btn-secondary">Filtrer</button>
        </div>

        <h1 class="mb-3">Enquêtes</h1>

        <div class="cards-container d-flex gap-4 flex-wrap">
            <div class="cards">
                <h5>Enquête mai 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>Enquête mai 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>Enquête mai 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="cards">
                <h5>Enquête mai 2022</h3>
                <div class="progress">
                    <span>Finit</span>
                    <div class="progress-bar">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php include "../includes/footer.php" ?>