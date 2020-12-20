<link  rel="stylesheet" href="styles/styles.css">

<div class="form">
<form action="index.php" method="post" name="show_questions">
    <input type="hidden" name="action" value="get_all_questions">
    <input type="submit" value="Show all Questions">

</form>
<form action="index.php" method="post" name="show_user_questions">
    <input type="hidden" name="action" value="display_question">
    <input type="submit" value="Show Users Questions">

</form>
</div>
<table>
    <tr>
        <th>Name</th>
        <th>Body</th>
        <th>Skills</th>
    </tr>

    <td><?php echo $questions['title']; ?><br></td>
    <td><?php echo $questions['body']; ?></td>
    <td><?php echo $questions['skills']; ?></td>

</table>