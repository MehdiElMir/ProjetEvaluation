<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/prof.css">
    <title>Login -professeur</title>
</head>
<body>
    
    <header>
        <nav class="p-3 shadow-lg">
            <img src="./assets/logo.png" alt="logo mundiapolis" class="img-size">
        </nav>
    </header>


    <main class="login d-flex flex-wrap">

        <!-- Formulaire Login -->
        <div class="login-form">
            <form action="./login_process/login_teacher.php" method="post" class="login-form-control d-flex flex-column py-12">
                <h3>Login</h3>
                <div class="input-fields">
                    <input class="rounded-pill shadow border border-secondary p-3" placeholder="email" type="text" name="email" id="email" required pattern="[a-z0-9._%+-]+@mundiapolis\.ma$" required>
                    <input class="rounded-pill shadow border border-secondary p-3" placeholder="password" type="password" name="password" id="password" required>
                </div>
                <div class="remember d-flex align-items-center justify-center gap-3">
                    <input type="checkbox" name="se souvenier de moi" id="remember">
                    <label for="se souvenier de moi" class="">se souvenier de moi</label>
                </div>
                <input class="submit-button rounded-pill border p-2" type="submit" name="submit" value="Log in">
            </form>
        </div>


        <div class="login-image">
           <h2>PROFESSEURS</h2>
        </div>
    </main>


    <footer class="footer">

        <img src="./assets/logo-white.png" alt="">


        <div class="phone  d-flex align-items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6AE2FF" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
            </svg>
            <span>Inscription : +212 (0) 5 XX XX XX XX</span>
        </div>


        <div class="email d-flex align-items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6AE2FF" class="bi bi-send-fill" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
            </svg>
            <span>xxxxxxxx@mundiapolis.ma</span>
        </div>
        <p class="copyright">&copy; 2023 Mundiapolis</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <!-- -----------------------------------------------------Authentification Google --- -->

    <?php
    // use sessions, to show the login prompt only if the user is not logged-in
    // session_start();
 
    // paste google client ID and client secret keys
    $google_oauth_client_id = "507631210326-ov9ided7se74vecolnro3857l1j1nhrm.apps.googleusercontent.com";
    $google_oauth_client_secret = "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";
?>

<!-- check if the user is not logged in -->
<?php // if (!isset($_SESSION["user"])): ?> 
 
 <!-- display the login prompt -->
 <script src="https://accounts.google.com/gsi/client" async defer></script>
 <div id="g_id_onload"
     data-client_id="<?php echo $google_oauth_client_id; ?>"
     data-context="signin"
     data-callback="googleLoginEndpoint"
     data-close_on_tap_outside="false">
 </div>
  
<?php // endif; ?>

<script>
    // callback function that will be called when the user is successfully logged-in with Google
    function googleLoginEndpoint(googleUser) {
        // get user information from Google
        console.log(googleUser);
 
        // send an AJAX request to register the user in your website
        var ajax = new XMLHttpRequest();
 
        // path of server file
        ajax.open("POST", "google-sign-in-prof.php", true);
 
        // callback when the status of AJAX is changed
        ajax.onreadystatechange = function () {
 
            // when the request is completed
            if (this.readyState == 4) {
        if (this.status == 200) {
            console.log(this.responseText);
            // Redirect to the "layout.php" page on success
            window.location.href = "prof_layout.php";
        } else if (this.status == 400) {
            console.log("Invalid user data");
            alert("make sure to use the right account");
            location.reload();
            // Handle the error response when user data is invalid
        } else if (this.status == 500) {
            console.log("Internal server error");
            alert("Internal server error");
            location.reload();
            // Handle the error response when an internal server error occurs
        }
    }
        };
 
        // send google credentials in the AJAX request
        var formData = new FormData();
        formData.append("id_token", googleUser.credential);
        ajax.send(formData);
    }
</script>

</body>
</html>