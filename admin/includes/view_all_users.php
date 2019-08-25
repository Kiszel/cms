<table class="table table-bordered table-hover table-responsive">
    <thead >
    <tr>
        <th>Id</th>
        <th>username</th>
        <th>firstname</th>
        <th>lastname</th>
        <th>email</th>
        <th>role</th>
    </tr>
    </thead>
    <tbody>
    <?php

    $query="SELECT * from users";
    $select_users=mysqli_query($connect,$query);

    while ($row=mysqli_fetch_assoc($select_users)){
        $user_id=$row['user_id'];
        $user_name=$row['user_name'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname'];
        $user_email=$row['user_email'];
        $user_image=$row['user_image'];
        $user_role=$row['user_role'];

        echo"<tr>";
        echo "<td>$user_id</td>";
        echo "<td>$user_name</td>";
        echo "<td>$user_firstname</td>";

//        $query = "SELECT * from category WHERE cat_id = $post_category_id ";
//        $select_category_id = mysqli_query($connect, $query);
//
//        while ($row = mysqli_fetch_assoc($select_category_id)) {
//            $cat_title = $row["cat_title"];
//            $cat_id = $row["cat_id"];
//
//            echo "<td>$cat_title</td>";
//        }



        echo "<td>$user_lastname</td>";
        echo "<td>$user_email</td>";
         echo "<td>$user_role</td>";

//        $query="SELECT * FROM posts where post_id = $comment_post_id";
//        $select_post_id_query=mysqli_query($connect,$query);
//        while ($row=mysqli_fetch_assoc($select_post_id_query)){
//            $post_id=$row['post_id'];
//            $post_title=$row['post_title'];
//
//            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
//        }




        echo "<td><a href='users.php?change_to_admin=$user_id'>change to admin</a></td>";
        echo "<td><a href='users.php?change_to_sub=$user_id'>change to sub</a></td>";

        echo "<td><a href='users.php?delete=$user_id'>delete</a></td>";
        echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>edit</a></td>";
        echo "</tr>";
    }




    ?>
    </tbody>
</table>

<?php

if(isset($_GET['change_to_admin'])) {
    $the_user_id = $_GET['change_to_admin'];
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $admin_query = mysqli_query($connect, $query);
    header("Location:users.php");
}
if(isset($_GET['change_to_sub'])) {
    $the_user_id = $_GET['change_to_sub'];
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";
    $sub_query = mysqli_query($connect, $query);
    header("Location:users.php");
}




if(isset($_GET['delete'])){
    if(isset($_SESSION["user_role"])) {
        if ($_SESSION['user_role']== 'admin') {
            $the_users_id = $_GET['delete'];
            $query = "DELETE FROM users WHERE user_id = {$the_users_id}";
            $delete_query = mysqli_query($connect, $query);
            header("Location:users.php");
        }

    }

}


?>