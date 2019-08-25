<?php
include "includes/db.php";
include "includes/header.php";


?>

<!-- Navigation -->
<?php

include "includes/navigation.php";


?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if(isset($_GET["p_id"])){
                $the_post_id=$_GET['p_id'];
                $the_post_user=$_GET['author'];



            $query="SELECT * from posts where post_user = '{$the_post_user}' ";

            $select_all_posts_query=mysqli_query($connect,$query);

            while ($row=mysqli_fetch_array($select_all_posts_query)) {
                $post_id=$row["post_id"];
                $post_title = $row["post_title"];
                $post_user = $row["post_user"];
                $post_date = $row["post_date"];
                $post_image = $row["post_image"];
                $post_content = $row["post_content"];
            }
                ?>

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All post by <?php echo $post_user ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                <hr>
                <?php echo $post_content ?> <br>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

            <?php } ?>





        <!-- Blog Sidebar Widgets Column -->
        <?php

        include "includes/sidebar.php";


        ?>

    </div>
</div>

    <!-- /.row -->

    <hr>

    <?php

    include "includes/footer.php";


    ?>

