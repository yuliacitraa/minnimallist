<!DOCTYPE html>
<html>
    <head>
        <title>User Register</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Gochi+Hand&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="blogin">
    <div class="container">
        <div class="login" id="register" align="center">
            <h2>Register</h2>
            <form method="post" action="create_signup_pembeli.php">
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
                <div class="inputform">
                    <span class="logreg">Password</span> <br>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div>
                    <span class="logreg"><input type="checkbox" onclick="show()">Show Password</span>
                </div>
                <div>
                    <span class="logreg">
                    <input type="hidden" name="usertype" value="Pelanggan">
                </div>
                <div class="inputform">
                    <button type="submit" name="save">Sign Up</button> <br>
                    <span class="logreg">have an account? <a href="login.php">Login</a></span> <br>
                </div>
            </form>
            <script>
	            function show() {
		            var x = document.getElementById("password");
		            if (x.type === "password") {
			            x.type = "text";
		            } else {
			            x.type = "password";
		            }  
	            }
	        </script>
        </div>
    </div>
    </body>
</html>