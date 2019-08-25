
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
                            <small> <?php echo $_SESSION["username"]; ?></small>
                        </h1>
                    </div>
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php



                                        $post_count = recordCount('posts');
                                       echo" <div class='huge'> $post_count  </div>";
                                        ?>

                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./post.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $commnet_count = recordCount('comments');

                                        echo" <div class='huge'>{$commnet_count} </div>";
                                        ?>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $user_count = recordCount('users');

                                        echo" <div class='huge'>{$user_count} </div>";
                                        ?>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php

                                        $cat_count = recordCount('category');

                                        echo" <div class='huge'>{$cat_count} </div>";
                                        ?>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="./categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <?php

                $query ="SELECT * FROM posts WHERE post_status = 'draft' ";
                $select_all_draft_post=mysqli_query($connect,$query);
                $post_draft_count=mysqli_num_rows($select_all_draft_post);

                $query ="SELECT * FROM posts WHERE post_status = 'published' ";
                $select_all_published_post=mysqli_query($connect,$query);
                $post_published_count=mysqli_num_rows($select_all_published_post);

                $query ="SELECT * FROM comments WHERE comment_status = 'unaproved' ";
                $select_all_unaproved_commentt=mysqli_query($connect,$query);
                $count_unaproved_commentt=mysqli_num_rows($select_all_unaproved_commentt);


                $query ="SELECT * FROM users WHERE user_role = 'subsribers' ";
                $select_all_subsribers_user=mysqli_query($connect,$query);
                $count_all_subsribers_user=mysqli_num_rows($select_all_subsribers_user);

                ?>


                <div class="row">
                    <script type="text/javascript">
                        google.load('visualization',"1.1", {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['data', 'Count'],

                               <?php
                                    $elements_text=['Active Posts','Draft Posts','Published Posts','Comments','Unaproved Comments','Users','Subscribers','Categories'];
                                    $element_counts=[$post_count,$post_draft_count,$post_published_count,$commnet_count,$count_unaproved_commentt,$user_count,$count_all_subsribers_user,$cat_count];
                                    for($i=0;$i<8;$i++){
                                       echo "['{$elements_text[$i]}'" . "," . "{$element_counts[$i]}],";
                                    }


                                    ?>

                            ]);

                            var options = {
                                chart: {
                                    title:'' ,
                                    subtitle:'' ,
                                }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnchart_material" style="width:auto; height: 500px;"></div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>

        <!-- /#page-wrapper -->
        <?php include "includes/footer.php" ?>
