<?php

if(isset($_POST['create_post'])){
    $post_title=$_POST['title'];
    $post_user=escape($_POST['post_user']);
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];

    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];

    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
//    $post_comment_count=4;


    move_uploaded_file($post_image_temp,"../images/$post_image");

    $query="INSERT INTO posts(post_category_id,post_title,post_user,post_date,post_image,post_content,post_tags,post_status) ";
    $query .="VALUES('{$post_category_id}','{$post_title}','{$post_user}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}' ) ";


   $create_post_query =mysqli_query($connect,$query);

  confirm($create_post_query);
  $the_post_id=mysqli_insert_id($connect);
    echo "<p class='bg-success'>Post Created.<a href='../post.php?p_id={$the_post_id}'>View Post  </a>or<a href='post.php'>Add More posts</a></p>";





}

?>




<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title"> Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="category">Category</label>
        <select  id="" name="post_category">
            <?php
            $query = "SELECT * from category  ";
            $select_category = mysqli_query($connect, $query);
            confirm($select_category);

            while ($row = mysqli_fetch_assoc($select_category)) {
                $cat_title = $row["cat_title"];
                $cat_id = $row["cat_id"];
                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="users">Users</label>
        <select  id="" name="post_user">
            <?php
            $users_query = "SELECT * from users  ";
            $select_users = mysqli_query($connect, $users_query);
            confirm($select_users);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row["user_id"];
                $user_name = $row["user_name"];
                echo "<option value='{$user_name}'>{$user_name}</option>";
            }

            ?>
        </select>
    </div>


<!--    <div class="form-group">-->
<!--        <label for="title"> Post Author</label>-->
<!--        <input type="text" class="form-control" name="author">-->
<!--    </div>-->

<div class="form-group">
    <select name="post_status">
        <option value="draft">Post Status</option>
        <option value="publish">publish</option>
        <option value="draft">draft</option>
    </select>

</div>

<div class="form-group">
    <label for="post_image"> Post Image</label>
    <input type="file" class="form-control" name="image">
</div>
<div class="form-group">
    <label for="post_tags"> Post Tags</label>
    <input type="text" class="form-control" name="post_tags">
</div>

<div class="form-group">
    <label for="post_content"> Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10">
    </textarea>
</div>

<div class="form-group">
    <input type="submit" class="btn btn-primary" name="create_post" value="publish post">
</div>
</form>

