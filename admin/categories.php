
<?php include "includes/header.php"; ?>

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
                    <div class="cl-xs-6">
                        <?php insert_categories(); ?>



                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input   type="text" name="cat_title">
                            </div>
                            <div class="form-group">

                                <input class="btn btn-primary" name="submit" value="Add Category" type="submit">
                            </div>

                        </form>
                        <?php //UPDATE AND INCLUDE QUERY
                        if(isset($_GET["edit"])){
                             $cat_id=$_GET['edit'];
                            include "includes/update_category.php";
                        }

                        ?>
                    </div>
                    <div class="cl-xs-6">

                        <table class="table table-bordered table-hover" >
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Title</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>


                                <?php //FIND ALL CATEGORIES QUERY

                                findAllCategories();

                                ?>
                            <?php

                                deleteCategories();

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
