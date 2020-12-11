
<?php
require ('Model/database.php');
require ('Model/accounts_db.php');
require ('Model/questions_db.php');
require ('Model/Registration.php');

$action = filter_input(INPUT_POST,'action');
if($action==NULL){
    $action = filter_input(INPUT_GET,'action');
    if($action==NULL){
        $action = 'show_login';
    }
}

switch ($action){
    case 'show_login': {
        include('View/login.php');
        break;
    }


    case 'validate_login':
    {
        $Email = filter_input(INPUT_POST, 'Email');
        $Password = filter_input(INPUT_POST, 'Password');
        $Valid = true;
        if($Email == NULL || $Password == NULL){
            $error ='email and password not included';
            include ('errors/error.php');
        }else{
            $userId = validate_login($Email,$Password);
            if ($userId == false) {
                header('Location: .?action=display_registration');
            } else {
                header("Location: .?action=display_question&userId=$userId");
            }
        }
        break;

        /* if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["Email"])) {
                $error = 'Must enter an email';
                include('errors/error.php');
                if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
                    $error = 'Incorrect Email Format';
                    include('errors/error.php');
                    $Valid = false;
                }
            } else {

                $Email = filter_input(INPUT_POST, 'Email');
                $userId = validate_login($Email, $Password);
                if ($userId == false) {
                    header('Location: .?action=display_registration');
                } else {
                    header("Location: .?action=display_questions&userId=$userId");
                }
            }
            break;
        }
        if (empty($_POST["Password"])) {
            $error = 'Must enter an password';
            include('errors/error.php');
            $Valid= false;
        } else if (strlen($Password) < 4) {
            $error = 'Password must be at least 4 characters';
            include('errors/error.php');
            $Valid= false;
        } else {
            $Password = filter_input(INPUT_POST,'Password') ;
        }
        if($Valid){

            $userId = validate_login($Email,$Password);
            if(!$userId){
                $error = 'Login invalid';
                include('errors/error.php');
            }else{
                header("Location: display_questions.php?userId=$userId");
            }

        }else{
            echo 'Invalid Form';
        }
        */
            break;
    }
    case 'validate_registration':
    {
        $FirstNameReg = filter_input(INPUT_POST, 'FirstName');
        $LastNameReg = filter_input(INPUT_POST, 'LastName');
        $Birthday = filter_input(INPUT_POST, 'Birthday');
        $EmailReg = filter_input(INPUT_POST, 'EmailReg');
        $PassReg = filter_input(INPUT_POST, 'PassReg');
        $Valid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["FirstName"])) {
                $error = 'First Name is empty';
                include('errors/error.php');
                $Valid = false;
            } else {
                $FirstNameReg = filter_input(INPUT_POST, 'FirstName');

            }
            if (empty($_POST["LastName"])) {
                $error = 'Last Name is empty';
                include('errors/error.php');
                $Valid = false;
            } else {
                $LastNameReg = filter_input(INPUT_POST, 'LastName');
            }

            if (empty($_POST["Birthday"])) {
                $error = 'Birthday is empty';
                include('errors/error.php');
                $Valid = false;
            } else {
                $Birthday = filter_input(INPUT_POST, 'Birthday');

            }
            if (empty($_POST["EmailReg"])) {
                $error = 'Email is empty';
                include('errors/error.php');
                $Valid = false;
            } else {
                $EmailReg = filter_input(INPUT_POST, 'EmailReg');
                if (!filter_var($EmailReg, FILTER_VALIDATE_EMAIL)) {
                    $error = 'Email is invalid';
                    include('errors/error.php');
                    $Valid = false;
                }
            }


            if (empty($_POST["PassReg"])) {
                $error = 'Password Registration is empty';
                include('errors/error.php');
                $Valid = false;
            } else if (strlen($PassReg) < 8) {
                $error = 'Password must be at least 4 characters';
                include('errors/error.php');
                $Valid = false;
            } else {
                $PassReg = filter_input(INPUT_POST, 'PassReg');
            }
            if ($Valid) {
                create_registration($EmailReg,$FirstNameReg, $LastNameReg,$Birthday,$PassReg);
            }
        }
        break;
    }

    case 'validate_question':{
        $title = filter_input(INPUT_POST,'title' );
        $body=filter_input(INPUT_POST,'body' );
        $skills=filter_input(INPUT_POST,'skills');
        $ownerid=filter_input(INPUT_POST,'ownerid');
        $Valid = true;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["title"])) {
                $error = 'Question Name is empty';
                include('errors/error.php');
                $Valid=false;
            } else if (strlen($title) < 3) {
                $error = 'Question Title must be at least 3 characters';
                include('errors/error.php');
                $Valid=false;
            } else {
                $title = filter_input(INPUT_POST,'title' );
            }


           /* if (empty($_POST[$body])) {
                $error = 'Text box is empty';
                include('errors/error.php');
            } else */
            if (strlen($body) > 500) {
                $error = 'Question must be less than 500 words';
                include('errors/error.php');
                $Valid=false;
            } else {
                $body = $_POST["body"];
           }


        }
        if($Valid){
            create_question($title,$body,$skills,$ownerid);
        }


        break;
    }

    case 'display_registration':{
        include('View/registration.php');

        break;

    }
    case 'display_question':{
       $userId = filter_input(INPUT_GET,'userId');
       if ($userId==NULL || $userId <0){
           header('Location: .?action=show_login');
       }else{
           $questions = get_users_questions($userId);
           include('View/display_questions.php');
       }
       break;
    }

    case 'display_question_form':{
        $userId = filter_input(INPUT_GET,'userId');
        if ($userId==NULL || $userId <0) {
            header('Location: .?action=show_login');
        }else{
            include ('View/question_form.php');
        }
        break;
    }

    case 'submit_question':{
        $userId= filter_input(INPUT_POST,'userId');
        $title= filter_input(INPUT_POST,'title');
        $body= filter_input(INPUT_POST,'body');
        $skills= filter_input(INPUT_POST,'skills');
        if($userId == NULL || $title == NULL || $body == NULL || $skills == NULL){
            $error = 'All fields are required';
            include ('errors/error.php');
        }else{
        create_question($title,$body,$skills,$userId);
        header("Location: .?action=display_question&userId=$userId");

        }
        break;
    }

    case 'delete_question': {
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId = filter_input(INPUT_POST, 'userId');
        if ($questionId == NULL || $userId == NULL) {
            $error = 'Both fields are required';
            include('errors/error.php');
        } else {
            delete_question($questionId);
            header("Location: .?action=display_question&userId=$userId");
        }

        break;
    }

    case 'edit_question': {
        $questionId = filter_input(INPUT_POST, 'questionId');
        $userId= filter_input(INPUT_POST,'userId');
        $title= filter_input(INPUT_POST,'title');
        $body= filter_input(INPUT_POST,'body');
        $skills= filter_input(INPUT_POST,'skills');
        if ($userId == NULL || $title == NULL || $body == NULL || $skills == NULL) {
            $error = 'All fields are required';
           include('errors/error.php');
       } else {
            edit_question($title, $body, $skills, $questionId);
            header("Location: .?action=display_question_form&userId=$userId");
        }

        break;

    }

    case 'get_all_questions' : {
        $questions = get_all_questions();
        include ('View/display_questions.php');
        break;
    }

    default:{
        $error = 'Unknown Action';
        include ('errors/error.php');
    }



}