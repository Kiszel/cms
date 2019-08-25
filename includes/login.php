<?php include "db.php"; ?>

<?php session_start(); ?>


<?php

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username= mysqli_real_escape_string($connect,$username);
    $password= mysqli_real_escape_string($connect,$password);

    $query = "SELECT * FROM users where user_name = '{$username}' ";
    $select_user_query=mysqli_query($connect,$query);

    if(!$select_user_query){
        die("QUery failed".mysqli_error($connect));
    }

    while ($row= mysqli_fetch_array($select_user_query)){
        $db_id=$row['user_id'];
        $db_username=$row['user_name'];
        $db_password=$row['user_password'];
        $db_firstname=$row['user_firstname'];
        $db_lastname=$row['user_lastname'];
        $db_user_role=$row['user_role'];
    }

   // $password=crypt($password,$db_password);

    if(password_verify($password,$db_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['user_role'] = $db_user_role;
        $_SESSION['firstname'] = $db_firstname;
        $_SESSION['lastname'] = $db_lastname;

        header("Location:../admin/index.php");

    }else{
        header("Location:../index.php");
    }

}



?>
