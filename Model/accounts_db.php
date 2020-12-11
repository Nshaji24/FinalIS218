<?php


function validate_login($Email, $Password){
    global $db;
    $query = 'SELECT * FROM accounts WHERE email = :email AND password = :password';
    $statement = $db->prepare($query);
    $statement->bindValue(':email',$Email);
    $statement->bindValue(':password',$Password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();

    if(count($user)>0){
        return $user['id'];
    }else{
        return false;
    }
}