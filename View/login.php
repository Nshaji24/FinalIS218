
<!DOCTYPE html>
<html lang="en">
<head>
    <link  rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">
    <title>Login Form</title>
</head>
<body>
<nav> <ul id="nav_menu">
        <li><a href=".?action=show_login">Login</a></li>
        <li><a href=".?action=display_registration">Register</a></li>&nbsp;
    </ul>
</nav>


  <form action="index.php" method="post" >
      <input type="hidden" name="action" value="validate_login">
    <section id="LoginForm" class="LoginForm" >
        <h1>Login Form</h1>
        <label for="Email">Email</label><br>
        <input type="email" name="Email" id="Email"> <br>
        <label for="Password">Password</label><br>
        <input type="password" name="Password" id="Password"><br>


        <br>
        <input type="submit" value="Submit" class="BTN">
    </section>








  </form>
</body>
</html>
