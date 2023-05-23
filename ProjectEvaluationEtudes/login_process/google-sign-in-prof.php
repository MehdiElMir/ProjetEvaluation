<?php
    // use sessions
    session_start();
    
    // Connexion à la base de données
   include 'config.php';

    // include google API client
    require_once "../vendor/autoload.php";
     
    // set google client ID
    $google_oauth_client_id = "507631210326-ov9ided7se74vecolnro3857l1j1nhrm.apps.googleusercontent.com";
 
    // create google client object with client ID
    $client = new Google_Client([
        'client_id' => $google_oauth_client_id
    ]);
 
    // verify the token sent from AJAX
    $id_token = $_POST["id_token"];
 
    $payload = $client->verifyIdToken($id_token);
    if ($payload && $payload['aud'] == $google_oauth_client_id)
    {
        // get user information from Google
        $user_google_id = $payload['sub'];
 
        $name = $payload["name"];
        $email = $payload["email"];
        $picture = $payload["picture"];

        // lancer la requête SQL dans la table admin 
        $sql =mysqli_query($connexion, "SELECT * FROM `professeur` WHERE `professor_email` = '$email'");
        $row = mysqli_fetch_array($sql);
        if (is_array($row)) {
 
        // login the user
            $_SESSION["user"] = $user_google_id;

            $_SESSION["id_professeur"] = $row['id_professeur'];
            $_SESSION["professor_Lname"]=$row['professor_Lname'];
            // Redirection vers la page d'accueil 
            

         // send the response back to client side
         echo "Successfully logged in. " . $user_google_id . ", " . $name . ", " . $email . ", " . $picture;
        }
        else{
            http_response_code(400);
            exit();
        }
       
        }
        else
        {
            // token is not verified or expired
            echo "Failed to login.";
        }
?>