<!DOCTYPE html>
<html lang="en">
<head>
    <link  rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">
    <title>Registration Form</title>
</head>
<body>
<nav> <ul id="nav_menu">
        <li><a href=".?action=show_login">Login</a></li>

        <li><a href=".?action=display_registration">Register</a></li>&nbsp;
    </ul>
</nav>

<form action="index.php" method="post" >
    <input type="hidden" name="action" value="validate_registration">
<section id="Registration" class="regis">
    <h1>Registration Form</h1>
    <br>

    <label for="FirstName">First Name</label>
    <input type="text" name="FirstName" id="FirstName" > <br>


    <label for="LastName">Last Name</label>
    <input type="text" name="LastName" id="LastName" > <br>


    <label for="Birthday">Birthdate</label>
    <input type="date" name="Birthday" id="Birthday" > <br>


    <label for="EmailReg">Email</label>
    <input type="email" name="EmailReg" id="EmailReg" > <br>


    <label for="PassReg">Password</label>
    <input type="password" name="PassReg" id="PassReg" > <br>


    <input type="submit" value="Submit" class="BTN" >

</section>
</form>
</body>
</html>