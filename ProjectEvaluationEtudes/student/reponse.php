<?php
include('config.php');
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the student ID is set in the session
    if (!isset($_SESSION['id_student'])) {
        echo "Error: student_id not defined in the session.";
        exit();
    }

    $studentId = $_SESSION['id_student'];

}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Enquete</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #5692e5;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #5692e5;
        }.styled-table tbody tr.active-row {
            font-weight: bold;
            color: #5692e5;
        }

        :root{
            --primary: #5692e5;
            --secondary: #0D3C48;
        }

        *{
            padding: 0 ;
            margin: 0;
            box-sizing: border-box;
        }

        ul{
            width: 100%;
            list-style: none;   
            padding: 0;
        }


        ul > li {
            margin-top: 5px;
            transition: 300ms ease-in-out all;
            
            width: 100%;
            height: 30px;
            display: flex;
            align-items: left; 
            justify-content: left;
            margin-left: 10px;
            border-left: 4px solid transparent;
            transition: 300ms all ease-in-out;
        }

        ul > li > a , .edit{
            color: #fff;
            font: bold !important;
            margin: 0 !important;
        }

        ul > li:hover, .edit:hover{
            border-left: 4px solid var(--secondary);
            background: linear-gradient(to right, #fff, #ffffff00);
        }

        .img-size{
            height: 80px;
        }

        .main{
            display: flex;
        }

        .sidebar{
            background: var(--primary);
            width: 300px;
        }

        .main-content{
            padding: 35px;
            width: 100%;
            display: flex;
            gap: 30px;
            height: 100%;
            flex-wrap: wrap;
        }



        .search > form > select{
            margin-right: 10px;
            width: 200px;
        }

        .search > form {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        
        label {
            margin-right: 10px;
        }
        
        select {
            width: 100%;
            max-width: 200px;
        }
        

        .cards, .cards--plus{
            border-radius: 20px;
            padding: 10px;
            width: 250px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: #E7E7E7;
            height: 200px;
        }

        .cards--plus{
            align-items: center;
            justify-content: center;
        }

        .progress{
            display: flex;
            flex-direction: column;
            width: 100%;
            height: 40px;
            background: #E7E7E7;
        }

        .progress > span{
            color: #e826c8;
        }

        .progress-limit{
            color: #000 !important;
        }

        .progress-bar, .progress-bar-limit{
            background-color: #fff;
            position: relative;
            width: 100%;
            height: 20%;
            border-radius: 20px;
        }

        .progress-bar::before{
            content: "";
            position: absolute;
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 20px;
            background-color: #fa0aba;
        }

        .progress-bar-limit::before{
            content: "";
            position: absolute;
            display: block;
            width: 25%;
            height: 100%;
            border-radius: 20px;
            background-color: #B2B2B2;
        }

        .edit{
            color: #fff;
            width: 100%;
            text-align: center;
            padding: 5px;
            margin-top: 300px !important;
        }

        .button-submit {
            background-color: #5692e5;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            height: 50px;
            width: 10%;
        }

        .subject-title {
            font-size: 40px;
            font-weight: 600;
            background-image: linear-gradient(to left,  #00357F, #5692e5);
            color: transparent;
            background-clip: text;
            -webkit-background-clip: text;
        }

        .logout {
            background-color: #ffffff;
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            height: 50px;
            position: absolute;
            bottom: 20px;
        }

    </style>
</head>

<body>


    <header>
        <nav class="p-3 shadow-lg">
            <img src="./assets/logo.png" alt="logo mundiapolis" class="img-size">
        </nav>
    </header>

    <main class="main">

    <div class="sidebar" style="text-align:left;">

        <div class="sidebar-top" style="min-width:180px">

            <p style="color:white;font-size:30px;margin-top:20px;margin-left:20px;margin-right:20px;;font-weight:bold;">Enquêtes</p>

            <ul style="text-align: left;">

                <li>
                    <a style="color: white; text-decoration:none; text-align:left; margin-left:20px; padding-left: 20px;">
                    Enquête 1
                    </a>
                </li>

                <button class="logout" onclick="window.location.href='login.php';">
                    Logout
                </button>
                
            </ul>
                
                
        </div>
        
    </div>

    <div class="main-content">

    <script>
    function submitResponses() {
        document.getElementById("submitButton").disabled = true;
        document.getElementById("submitButton").innerText = "Submitting...";
        var responses = [];

        <?php
        // Retrieve the questions
        $sqlQuestions = "SELECT * FROM question";
        $resultQuestions = $conn->query($sqlQuestions);

        // Check for query errors
        if (!$resultQuestions) {
            die('Error executing the query: ' . $conn->error);
        }


        foreach ($resultQuestions as $question) {
            $questionId = $question['id_question'];
            echo "var responseNote = document.querySelector('input[name=\"response_note{$question['id_question']}\"]:checked');";
            echo "var comment = document.getElementById(\"comment{$question['id_question']}\").value;";
            echo "if (responseNote !== null) {";
            echo "    responseNote = responseNote.value;";
            echo "    responses.push({";
            echo "        id_question: " . $questionId . ",";
            echo "        response_note: responseNote,";
            echo "        comment: comment";
            echo "    });";
            echo "}";
        }
        ?>

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    alert("Responses have been successfully recorded.");
                } else {
                    alert("An error occurred while submitting the responses.");
                }

                document.getElementById("submitButton").disabled = false;
                document.getElementById("submitButton").innerText = "Submit";
            }
        };

        xhr.open("POST", "enregistrer_reponses.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(JSON.stringify(responses));
    }

    </script>

    <?php

    $sqlModule = "SELECT `subject_name`, `id_subject` FROM `subject`";
    $resultModule = $conn->query($sqlModule);

    if (!$resultModule) {
        die('Error executing the query: ' . $conn->error);
    }

    if ($resultModule && $resultModule->num_rows > 0) {
        while ($row = $resultModule->fetch_assoc()) {
            $subject = $row['subject_name'];
            $subjectID = $row['id_subject'];
            echo '<br><br><br>';
            echo '<h3 class="subject-title">' . $subjectID . ") " . $subject . '</h3>';
            echo '<br>';

            
            // Table code here
            echo '
            <div class="styled-table">
            <table class="table mb-0">
                <form method="post" action="enregistrer_reponses.php">
                    <thead>
                        <tr>
                            <th scope="col">Question</th>
                            <th scope="col">Pas du tout d\'accord</th>
                            <th scope="col">Pas d\'accord</th>
                            <th scope="col">Moyennement d\'accord</th>
                            <th scope="col">D\'accord</th>
                            <th scope="col">Entièrement d\'accord</th>
                            <th scope="col">Commentaire</th>
                        </tr>
                    </thead>
                    <tbody>';

                        $sqlQuestions = "SELECT * FROM question";
                        $resultQuestions = $conn->query($sqlQuestions);

                        if (!$resultQuestions) {
                            die('Error executing the query: ' . $conn->error);
                        }

                        foreach ($resultQuestions as $question) {
                            $surveyQuestionId = $question['id_question'];
                            if (isset($question['response_note'])) {
                                $responseNote = $question['response_note'];
                            } else {
                                $responseNote = '';
                            }
                            if (isset($question['comment'])) {
                                $comment = $question['comment'];
                            } else {
                                $comment = '';
                            }
                            echo "<tr>";
                            echo "<td>" . $question['question_phrase'] . "</td>";
                            echo "<td><input type=\"radio\" name=\"response_note{$question['id_question']}\" value=\"1\"></td>";
                            echo "<td><input type=\"radio\" name=\"response_note{$question['id_question']}\" value=\"2\"></td>";
                            echo "<td><input type=\"radio\" name=\"response_note{$question['id_question']}\" value=\"3\"></td>";
                            echo "<td><input type=\"radio\" name=\"response_note{$question['id_question']}\" value=\"4\"></td>";
                            echo "<td><input type=\"radio\" name=\"response_note{$question['id_question']}\" value=\"5\"></td>";
                            echo "<td><textarea id=\"comment{$question['id_question']}\"></textarea></td>";
                            echo "</tr>";
                        }
                    echo ' </tbody>
                </form>
            </table>
            </div>';
        }
    } else {
        echo "No subjects found.";
    }

    ?>

    <button id="submitButton" type="button" class="button-submit" onclick="submitResponses()">Submit</button>

    </div>
    </main>

</body>
