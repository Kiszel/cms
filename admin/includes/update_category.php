<form action="" method="post">
    <div class="form-group">
        <label for="cat_title">Edit Category</label>

        <?php
        if(isset($_GET["edit"])) {
            $cat_id=$_GET["edit"];

            $query = "SELECT * from category WHERE cat_id = $cat_id ";
            $select_category_id = mysqli_query($connect, $query);

            while ($row = mysqli_fetch_assoc($select_category_id)) {
                $cat_title = $row["cat_title"];
                $cat_id = $row["cat_id"];
                ?>

                <input value="<?php if(isset($cat_title)){echo $cat_title;}  ?>" type="text" class="form-control" name="cat_title">

            <?php }} ?>
        <?php // UPDATE QUERY

        if(isset($_POST["update_category"])){
            $the_cat_title=$_POST["cat_title"];

            $query="UPDATE category SET cat_title = '{$the_cat_title}' where cat_id = $cat_id ";
            $update_query=mysqli_query($connect,$query);

            header("Location: categories.php");

            if(!$update_query){
                die('QUERY FAILED'.mysqli_error($connect));
            }
        }

        ?>

    </div>
    <div class="form-group">

        <input class="btn btn-primary" name="update_category" value="Update Category" type="submit">
    </div>

</form>