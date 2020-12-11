<link  rel="stylesheet" href="styles/styles.css">


<nav> <ul id="nav_menu">
        <li><a href=".?action=show_login">Login</a></li>
        <li><a href=".?action=display_question_form&userId=<?php echo $userId ; ?>">Post a Question</a></li>
    </ul>
</nav>
<!--  <a href="../done/Questions_form.php?userId=<?php echo $userId ; ?>" Add Question></a> -->



<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
    </tr>
    <?php foreach ($questions as $question): ?>
    <tr>
        <td> <?php echo $question['title'];?> </td>
        <td> <?php echo $question['body'];?> </td>
        <td> <?php echo $question['skills'];?> </td>

    </tr>
    <?php endforeach; ?>
</table>


