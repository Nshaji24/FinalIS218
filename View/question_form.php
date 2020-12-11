<?php
$userId=filter_input(INPUT_GET,'userId');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link  rel="stylesheet" href="styles/styles.css">
    <meta charset="UTF-8">

</head>
<body>
<nav> <ul id="nav_menu">
        <li><a href=".?action=show_login">Login</a></li>
        <li><a href=".?action=display_question_form&userId=<?php echo $userId ; ?>">Post a Question</a></li>
        <li><a href=".?action=display_registration">Register</a></li>&nbsp;
    </ul>
</nav>
<form action="index.php" method="post" >
    <input type="hidden" name="action" value="submit_question">
   <!-- <input type="hidden" name="action" value="validate_question">   -->
    <input type="hidden" name="userId" value="<?php echo $userId; ?>">
    <section id="Question" class="quest">
        <h1>Question Form</h1>
        <h3>Question name?</h3>
        <input type="text" name="title"><br>
        <h3>Question Body</h3><br>
        <textarea name="body" rows="4" cols="50"></textarea><br>
        <h3>Enter Skills</h3>
        <input type="text" name="skills" id="skills">  <br>
        <br>

        <br>

        <input type="submit" value="Submit" class="BTN">

    </section>
</form>
</body>
</html>

<!--
<h1>Ask new Question</h1>

<form action="index.php" method="post">
    <input type="hidden" name="action" value="submit_question">
    <input type="hidden" name="userid" value=" php echo userid */">

    <div class="form-group">
        <label for="title">Question Title</label>
        <input type="text" name="title">
    </div>

    <div class="form-group">
        <label for="body">Question Body</label>
        <input type="text" name="body">
    </div>

    <div class="form-group">
        <label for="skills">Question Skills</label>
        <input type="text" name="skills">
    </div>

    <input type="submit" class="BTN" value="Add Question">
</form>
-->