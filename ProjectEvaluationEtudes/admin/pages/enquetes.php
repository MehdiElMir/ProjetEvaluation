<?php include "../includes/layout.php" ?>

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
            
        </div>
    </div>

<?php include "../includes/footer.php" ?>