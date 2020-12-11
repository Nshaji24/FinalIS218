<?php
// require('database.php');
function get_users_questions($userID){
    global $db;

    $query= 'SELECT * FROM questions WHERE ownerid= :userID';
    $statement= $db->prepare($query);
    $statement->bindValue(':userID',$userID);
    $statement->execute();

    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
}
function create_question($title, $body,$skills,$ownerid){
    global $db;

    $query= 'INSERT INTO questions
                  (title,body,skills,ownerid)
                  VALUES(:title,:body,:skills,:ownerid)';
    $statement = $db->prepare($query);
    $statement->bindValue('title',$title);
    $statement->bindValue('body',$body);
    $statement->bindValue('skills',$skills);
    $statement->bindValue('ownerid',$ownerid);
    $statement->execute();
    $statement->closeCursor();
}


$userId = filter_input(INPUT_GET, 'userId');


function get_questions_by_ownerId($ownerId)
{
    global $db;
    $query = 'SELECT * FROM questions WHERE ownerId= :ownerId';

    $statement = $db->prepare($query);
    $statement->bindValue('ownerId', $ownerId);
    $statement->execute();
    $questions = $statement->fetchAll();
    $statement->closeCursor();
    return $questions;
}


$questions = get_questions_by_ownerId($userId);


?>