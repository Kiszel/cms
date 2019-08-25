<?php

if(isset($_POST['create_user'])){

    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];


//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];

    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    //$post_date=date('d-m-y');
//    $post_comment_count=4;

    $user_password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));


//    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="INSERT INTO users(user_name,user_password,user_firstname,user_lastname,user_email,user_role) ";
    $query .="VALUES('{$user_name}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}' ) ";


   $create_user_query =mysqli_query($connect,$query);

  confirm($create_user_query);
  echo "User Created" ." ". "<a href='users.php'>View Users</a> ";





}

?>




<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
    <label for="user_firstname"> FirstName</label>
    <input type="text" class="form-control" name="user_firstname">
</div>

<div class="form-group">
    <label for="user_lastname">LastName</label>
    <input type="text" class="form-control" name="user_lastname">
</div>


    <div class="form-group">
        <select  id="" name="user_role">
            <option value="admin">Admin</option>
            <option value="subsrcriber">subsrcriber</option>
        </select>
    </div>




<!--    <div class="form-group">-->
<!--        <label for="post_image">user image</label>-->
<!--        <input type="file" class="form-control" name="image">-->
<!--    </div>-->
<div class="form-group">
    <label for="user_name">UserName</label>
    <input type="text" class="form-control" name="user_name">
</div>
    <div class="form-group">
        <label for="user_email">email</label>
        <input type="email" class="form-control" name="user_email" >
    </div>


<div class="form-group">
    <label for="user_password">password</label>
    <input type="password" class="form-control" name="user_password" >
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_user" value="create user">
</div>
</form>

