<?php
//require('database.php');

function create_registration($EmailReg,$FirstNameReg, $LastNameReg,$Birthday,$PassReg){
            $Birthday= new DateTime($Birthday);
            $query = 'INSERT INTO accounts
                (email, fname, lname, birthday,password)
              VALUES
                (:email, :fname, :lname , :birthday,:password)';
            $statement = $db->prepare($query);
            $statement->bindValue(':email', $EmailReg);
            $statement->bindValue(':fname', $FirstNameReg);
            $statement->bindValue(':lname', $LastNameReg);
            $statement->bindValue(':birthday', $Birthday->format('Y-m-d'));
            $statement->bindValue(':password', $PassReg);



            //   $statement->bindValue(':EmailReg', $EmailReg);
            //  $statement->bindValue(':PassReg', $PassReg);
            $statement->execute();
            $statement->closeCursor();


}




?>
