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

    // Retrieve the questions
    $sqlQuestions = "SELECT * FROM question";
    $resultQuestions = $conn->query($sqlQuestions);

    // Check for query errors
    if (!$resultQuestions) {
        die('Error executing the query: ' . $conn->error);
    }

    // Prepare the statement for inserting responses
    $stmt = $conn->prepare("INSERT INTO response (student_id, survey_question_id, response_note, comment) VALUES (?, ?, ?, ?)");

    // Bind the parameters
    $stmt->bind_param("iiis", $studentId, $surveyQuestionId, $responseNote, $comment);

    while ($question = $resultQuestions->fetch_assoc()) {
        $surveyQuestionId = $question['id_question'];
        $responseNote = $_POST['response_note_' . $surveyQuestionId];
        $comment = $_POST['comment_' . $surveyQuestionId];

        // Execute the statement
        $stmt->execute();
    }

    // Close the statement
    $stmt->close();

    echo "Responses have been successfully recorded.";
} else {
    echo "Invalid request method.";
}
?>
