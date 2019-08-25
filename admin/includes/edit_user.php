<?php

if(isset($_GET['edit_user'])) {
    $the_user_id = escape($_GET['edit_user']);

    $query = "SELECT * from users where user_id = $the_user_id ";
    $select_user_query = mysqli_query($connect, $query);


    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $user_id = $row['user_id'];
        $user_name = $row['user_name'];
        $user_password = $row['user_password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];

    }


if(isset($_POST['update_user'])) {
    $the_user_id = $_GET['edit_user'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];


//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];

    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    //$post_date=date('d-m-y');
//    $post_comment_count=4;

//    $query="SELECT user_randSalt FROM USERS";
//    $select_randSalt_query=mysqli_query($connect,$query);
//    if(!$select_randSalt_query){
//        die("QUERY FAILED".mysqli_error($connect));
//    }
//    $row=mysqli_fetch_array($select_randSalt_query);
//    $salt=$row["user_randSalt"];
//    $hashed_password=crypt($user_password,$salt);

//    move_uploaded_file($post_image_temp,"../images/$post_image");

    if (!empty($user_password)) {
        $query_password = "SELECT user_password from users where user_id='$the_user_id'";
        $get_user = mysqli_query($connect, $query_password);
        confirm($get_user);

        $row = mysqli_fetch_array($get_user);

        $db_user_password = $row['user_password'];
        if ($db_user_password != $user_password) {
            $hashed_password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
        }
        $query = "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_role = '{$user_role}', ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$hashed_password}' ";
        $query .= "WHERE user_id = {$the_user_id} ";

        $update_user = mysqli_query($connect, $query);

        confirm($update_user);
        header("Location:users.php");
    }


}

}else{
    header("Location:index.php");
}

?>




<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="user_firstname"> FirstName</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="user_lastname">LastName</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
    </div>


    <div class="form-group">
        <select  id="" name="user_role">
            <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>
            <?php

            if($user_role == 'admin'){
                echo "<option value='subsrcriber'>subsrcriber</option>";
            }else{
                echo "  <option value='admin'>Admin</option>";
            }

            ?>


        </select>
    </div>




    <!--    <div class="form-group">-->
    <!--        <label for="post_image">user image</label>-->
    <!--        <input type="file" class="form-control" name="image">-->
    <!--    </div>-->
    <div class="form-group">
        <label for="user_name">UserName</label>
        <input type="text" class="form-control" value="<?php echo $user_name ?>" name="user_name">
    </div>
    <div class="form-group">
        <label for="user_email">email</label>
        <input type="email" class="form-control" value="<?php echo $user_email ?>" name="user_email" >
    </div>


    <div class="form-group">
        <label for="user_password">password</label>
        <input type="password" class="form-control" name="user_password" autocomplete="off"  >
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_user" value="edit user">
    </div>
</form>

