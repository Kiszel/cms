


<?php

if(isset($_GET['p_id'])) {
$the_post_id=$_GET['p_id'];

}

    $query = "SELECT * from posts where post_id = '$the_post_id'  ";
    $select_posts = mysqli_query($connect, $query);

    confirm($select_posts);

    while ($row = mysqli_fetch_array($select_posts)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_user = $row['post_user'];
        $post_category_id = $row['post_category_id'];
        $post_status = $row['post_status'];
        $post_image=$row['post_image'];

        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comments = $row['post_comment_count'];
        $post_tags = $row['post_tags'];
        $post_date = $row['post_date'];
    }

    if(isset($_POST['update_post'])){
        $post_title=$_POST['title'];
        $post_user=$_POST['post_user'];
        $post_category_id=$_POST['post_category'];
        $post_status=$_POST['post_status'];




        $post_tags=$_POST['post_tags'];
        $post_content=$_POST['post_content'];


        $query= "UPDATE posts SET ";
        $query .= "post_title = '{$post_title}', ";
        $query .= "post_user = '{$post_user}', ";
        $query .= "post_category_id = '{$post_category_id}', ";
        $query .= "post_status = '{$post_status}', ";
        $query .= "post_tags = '{$post_tags}', ";
        $query .= "post_content = '{$post_content}', ";
        $query .= "post_date = now() ";
        $query .= "WHERE post_id = {$the_post_id} ";

        $update_post = mysqli_query($connect,$query);

        confirm($update_post);
        echo "<p class='bg-success'>Post Updated.<a href='../post.php?p_id={$the_post_id}'>View Post  </a>or<a href='post.php'>Edit More posts</a></p>";


    }

?>

<form action="" method="post" enctype="multipart/form-data">


    <div class="form-group">
        <label for="title"> Post Title</label>
        <input value="<?php echo "$post_title" ?>" type="text" class="form-control" name="title">
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
               if($cat_id ==$post_category_id){


                   echo "<option selected value='{$cat_id}'>{$cat_title}</option>";

               }else{
                   echo "<option value='{$cat_id}'>{$cat_title}</option>";

               }
           }

           ?>
        </select>
    </div>
    <div class="form-group">
        <label for="users">Users</label>
        <select  id="" name="post_user">
         <?php   echo "<option value='{$post_user}'>{$post_user}</option>"; ?>

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
<!--        <input value="--><?php //echo "$post_user" ?><!--" type="text" class="form-control" name="author">-->
<!--    </div>-->

    <div class="form-group">
    <select name="post_status" id="">
        <option value="<?php echo $post_status ?>"><?php echo $post_status; ?></option>
        <?php
        if($post_status == 'published'){
            echo "<option value='draft'>Draft</option>";

        }else{
            echo "<option value='published'>Published</option>";
        }

        ?>
    </select>
    </div>
<!--    <div class="form-group">-->
<!--        <label for="post_status"> Post Status</label>-->
<!--        <input value="--><?php //echo "$post_status" ?><!--" type="text" class="form-control" name="post_status">-->
<!--    </div>-->

    <div class="form-group">
        <img width="100" src="../images/<?php echo "$post_image" ?>" alt="image">
    </div>
    <div class="form-group">
        <label for="post_tags"> Post Tags</label>
        <input value="<?php echo "$post_tags" ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content"> Post Content</label>
    <textarea type="text" class="form-control" name="post_content" id="body" cols="30" rows="10"><?php echo str_replace('\r\n','</br>' , $post_content) ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="publish post">
    </div>
</form>

