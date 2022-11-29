<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="blogin">
    <div class="container">
        <div class="login" id="register" align="center">
            <h2>Register</h2>
            <form method="post" action="create_signup.php">
                <div class="inputform">
                    <span class="logreg">Name</span> <br>
                    <input type="text" name="full_name" placeholder="Name" required>
                </div>
                <div class="inputform">
                    <span class="logreg">Email</span> <br>
                    <input type="text" name="email" placeholder="E-mail" required>
                </div>
                <div class="inputform">
                    <span class="logreg">Username</span> <br>
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div>
                    <span class="logreg">
                    <input type="radio" name="usertype" value="Staff" required>Staff
                    <input type="radio" name="usertype" value="Manager" required>Manager</span>
                </div>
                <div class="inputform">
                    <button type="submit" name="save">Sign Up</button> <br>
                </div>
            </form>
        </div>
    </div>
    </body>
</html>