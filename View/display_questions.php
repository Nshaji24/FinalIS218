<link  rel="stylesheet" href="styles/styles.css">


<nav> <ul id="nav_menu">
        <li><a href=".?action=show_login">Login</a></li>
        <li><a href=".?action=display_question_form&userId=<?php echo $userId ; ?>">Post a Question</a></li>
        <a href=".?action=logout">Logout</a>
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
        <td>

        <form action="index.php" method="post" name="delete_button" class="deleteBTN">

            <input type="hidden" name="action" value="delete_question">

            <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">

            <input type="hidden" name="userId" value="<?php echo $userId; ?>">

            <input type="submit" value="DELETE">


        </form>
            <form action="index.php" method="post">

                <input type="hidden" name="action" value="edit_question">

                <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">

                <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                <input type="submit" value="Edit Question">



            </form>



            <form action="index.php" method="post">

                <input type="hidden" name="action" value="view_single_question">

                <input type="hidden" name="questionId" value="<?php echo $question['id']; ?>">

                <input type="hidden" name="userId" value="<?php echo $userId; ?>">

                <input type="submit" value="View Question">



            </form>
        </td>



        </form>

    </tr>
    <?php endforeach; ?>

</table>
<div class="form">
<form action="index.php" method="post" name="show_questions">
    <input type="hidden" name="action" value="get_all_questions">
    <input type="submit" id="allquest" value="Show all Questions">

</form>
<form action="index.php" method="post" name="show_user_questions">
    <input type="hidden" name="action" value="display_question">
    <input type="submit" id="usersquest" value="Show Users Questions">

</form>
</div>






