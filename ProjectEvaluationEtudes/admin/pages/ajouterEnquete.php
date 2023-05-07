<?php include "../includes/layout.php" ?>

    <div class="main-content d-flex flex-column overflow-scroll">

        <h1>Ajouter Une Enquete</h1>
        
        <div class="enquetes d-flex flex-column gap-4 mb-5">
            <div class="enquete enquete-faculte d-flex gap-5 align-items-center">
                <label for="faculte" >Faculte</label>
                <select name="faculte" id="" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="faculte1">faculte1</option>
                    <option value="faculte2">faculte2</option>
                    <option value="faculte3">faculte3</option>
                </select>
                <button class="btn border-secondary-subtle text-secondary" >ok</button>
            </div>
    
            <div class="enquete enquete-filiere d-flex gap-5 align-items-center">
                <label for="filiere">Filières</label>
                <select name="filiere" id="" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="filiere1">Filières1</option>
                    <option value="filiere2">Filières2</option>
                    <option value="filiere3">Filières3</option>
                </select>
                <button class="btn border-secondary-subtle text-secondary">ok</button>
            </div>
            
            <div class="enquete enquete-niveau d-flex gap-5 align-items-center">
                <label for="niveau">Niveau</label>
                <select name="niveau" id="" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="niveau1">Niveau1</option>
                    <option value="niveau2">Niveau2</option>
                    <option value="niveau3">Niveau3</option>
                </select>
                <div class="session-containter d-flex gap-3">
                    <div class="automne">
                        <input type="radio" name="automne" id="">
                        <label for="automne">Automne</label>
                    </div>
                    <div class="printemps">
                        <input type="radio" name="printemps" id="">
                        <label for="printemps">printemps</label>
                    </div>
                </div>
                <button class="btn border-secondary-subtle text-secondary">ok</button>
            </div>
    
        </div>

        <div class="modules mb-5">
            
            <div class="modules modules--header d-flex justify-content-between align-items-center mb-3">
                <h1>Modules à enquêter</h1>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1">Selectionner Tout</label>
                </div>
            </div>

            <div class="modules modules-selctions p-4 border border-black rounded-4 d-flex flex-wrap gap-4">

                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>
                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>
                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>
                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>
                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>
                <div class="sub-module">
                    <input type="checkbox" name="module1" id="">
                    <label for="module1">Module1</label>
                </div>

            </div>

        </div>

        <div class="questions">
            <div class="questions questions--header d-flex justify-content-between align-items-center mb-3">
                <h1>Questions</h1>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck1">Selectionner Tout</label>
                </div>
            </div>

            <div class="quetions d-flex flex-column gap-4 rounded-4 border border-black p-4">

                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>
                <div class="question d-flex align-items-center gap-2">
                    <input type="checkbox" name="quetions" id="">
                    <label for="quetion">Question 1</label>
                </div>

            </div>
        </div>

        <div class="lancer lancer-enquete d-flex justify-content-end">
            <button class="btn btn-success">Lancer</button>
        </div>

    </div>

<?php include "../includes/footer.php" ?>