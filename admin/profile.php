
<?php include "includes/header.php"; ?>

<?php
if(isset($_SESSION['username'])){

   $username= $_SESSION['username'];

   $query="SELECT * from users WHERE user_name = '{$username}' ";

   $select_user_profile_query=mysqli_query($connect,$query);

   while ($row=mysqli_fetch_array($select_user_profile_query)){
       $user_id = $row['user_id'];
       $user_name = $row['user_name'];
       $user_password = $row['user_password'];
       $user_firstname = $row['user_firstname'];
       $user_lastname = $row['user_lastname'];
       $user_email = $row['user_email'];
       $user_image = $row['user_image'];
   }

}



?>
<?php
if(isset($_POST['update_profile'])){


        $the_user_id = $_GET['edit_user'];
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname'];


//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];

        $user_name=$_POST['user_name'];
        $user_email=$_POST['user_email'];
        $user_password=$_POST['user_password'];
        //$post_date=date('d-m-y');
//    $post_comment_count=4;


//    move_uploaded_file($post_image_temp,"../images/$post_image");


        $query= "UPDATE users SET ";
        $query .= "user_firstname = '{$user_firstname}', ";
        $query .= "user_lastname = '{$user_lastname}', ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_password = '{$user_password}' ";
        $query .= "WHERE user_name = '{$username}' ";

        $update_user = mysqli_query($connect,$query);

        confirm($update_user);
        header("Location:users.php");





    }


?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php"?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author</small>
                    </h1>

                </div>
                <!-- /.row -->


                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="user_firstname"> FirstName</label>
                        <input type="text" class="form-control" value="<?php echo $user_firstname ?>" name="user_firstname">
                    </div>

                    <div class="form-group">
                        <label for="user_lastname">LastName</label>
                        <input type="text" class="form-control" value="<?php echo $user_lastname ?>" name="user_lastname">
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
                        <input type="password" class="form-control" autocomplete="off" name="user_password" >
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_profile" value="edit profile">
                    </div>
                </form>

            </div>
            <!-- /.container-fluid -->

        </div>
    </div>
    <!-- /#page-wrapper -->
    <?php include "includes/footer.php" ?>
