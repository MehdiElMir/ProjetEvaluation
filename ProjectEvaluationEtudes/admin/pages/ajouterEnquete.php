<?php include "../includes/layout.php" ?>

<div class="main-content d-flex flex-column ">
    <form action="submit.php" method="post" >
        <h1>Ajouter Une Enquete</h1>

        <div class="enquetes d-flex flex-column gap-4 mb-5">
            <div class="enquete enquete-faculte d-flex gap-5 align-items-center">
                <label for="faculte">Faculte</label>
                <select name="faculty" id="faculty" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="">Sélectionnez une faculté</option>
                    <?php foreach ($faculty as $faculty) : ?>
                        <option value="<?= $faculty['id_faculty'] ?>"><?= $faculty['faculty_name'] ?></option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="enquete enquete-filiere d-flex gap-5 align-items-center">
                <label for="filiere">Filières</label>
                <select name="branch" id="branch" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="">Sélectionnez une branche</option>
                </select>

            </div>

            <div class="enquete enquete-niveau d-flex gap-5 align-items-center">
                <label for="niveau">Niveau</label>
                <select name="level" id="level" class="flex-grow-1 bg-transparent border border-secondary-subtle outline-none p-3 rounded-3">
                    <option value="">Sélectionnez un niveau</option>
                </select>
                <div class="session-containter d-flex gap-3">
                    <div id="semestre" name="semestre">
                        <?php foreach ($semestre as $semestre) : ?>
                            <input type="radio" id="<?= $semestre['id_semestre'] ?>" name="semestre" value="<?= $semestre['id_semestre'] ?>">
                            <label for="<?= $semestre['id_semestre'] ?>"><?= $semestre['semestre_name'] ?></label>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>

        </div>

        <div class="modules mb-5">

            <div class="modules modules--header d-flex justify-content-between align-items-center mb-3">
                <h1>Modules à enquêter</h1>
                <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                    <input type="checkbox" class="btn-check" id="btncheck" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btncheck">Selectionner Tout</label>
                </div>
            </div>

            <div class="modules modules-selctions p-4 border border-black rounded-4 d-flex flex-wrap gap-4">
                <div id="subject-checkboxes">

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
                <?php foreach ($question as $question) : ?>
                    <div id="question d-flex align-items-center gap-2">

                        <input class="questioncheck" type="checkbox" name="questions[]" value="<?= $question['id_question'] ?>">
                        <label for="question"><?= $question['question_phrase'] ?></label>


                    </div>
                <?php endforeach; ?>
            </div>
        </div>
                </br>
        <div class="lancer lancer-enquete d-flex justify-content-end">
            <button type="submit" class="btn btn-success">Lancer</button>
        </div>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="../doc/script.js"></script>
<?php include "../includes/footer.php" ?>