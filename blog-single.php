<!doctype html>
<html lang="en">

<head>
    <title>Colorlib Balita &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php   session_start(); ?>
    <?php include "navigationBar.php"?>
    <!-- END header -->

    <?php require "db.php"; ?>
    <?php
    
  


    if (!isset($_GET['post'])) {
      $post = 1;
    } else {
      $post = $_GET['post'];
      
    }
    $_SESSION['postID'] = $post;
    
    $sql="SELECT * FROM post where post_id ='$post'";
    $result = $db->query($sql); 
    
    foreach ($result as $row)
    {
        
    }
    $_SESSION['category'] = $row['post_category'];
    
    ?>

    <section class="site-section py-lg">
        <div class="container">

            <div class="row blog-entries">
                <div class="col-md-12 col-lg-8 main-content">
                    <h1 class="mb-4"><?php echo $row['post_title']; ?></h1>
                    <div class="post-meta">
                        <span class="category"><?php echo $row['post_category']; ?></span>
                        <span class="mr-2"><?php echo $row['post_time']; ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                    </div>
                    <div class="post-content-body">
                        <div class="row mb-5">
                            <div class="col-md-12 mb-4 element-animate">
                                <img src="images/post/<?php echo $row['post_image']; ?>" alt="Image placeholder" class="img-fluid">
                            </div>

                        </div>
                        <p><?php echo $row['post_article']; ?></p>
                    </div>


                    <div class="pt-5">
                        <p> Tags: <a href="#">#<?php echo $row['post_tag']; ?></a></p>
                    </div>


                    <div class="pt-5">

                        <h3 class="mb-5">6 Comments</h3>




                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form method="POST" class="p-5 bg-light" id='comment_form'>
                                <div class="form-group">
                                    <label for="name">Your Name *</label>
                                    <input type="text" name="comment_name" id="comment_name" class="form-control" id="name">
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Comment</label>
                                    <textarea name="comment_content" id="comment_content" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                    <input type="submit" name="submit" id="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>


                        <span id="comment_message"></span>
                        <br />
                        <div id="display_comment"></div>
                        <hr>


                        <ul class="comment-list">

                            <li class="comment">
                                <div class="vcard">
                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3>Jean Doe</h3>
                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                    <p><a href="#" class="reply">Reply</a></p>
                                </div>

                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard">
                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3>Jean Doe</h3>
                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                            <p><a href="#" class="reply">Reply</a></p>
                                        </div>


                                        <ul class="children">
                                            <li class="comment">
                                                <div class="vcard">
                                                    <img src="images/person_1.jpg" alt="Image placeholder">
                                                </div>
                                                <div class="comment-body">
                                                    <h3>Jean Doe</h3>
                                                    <div class="meta">January 9, 2018 at 2:21pm</div>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                    <p><a href="#" class="reply">Reply</a></p>
                                                </div>

                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="vcard">
                                                            <img src="images/person_1.jpg" alt="Image placeholder">
                                                        </div>
                                                        <div class="comment-body">
                                                            <h3>Jean Doe</h3>
                                                            <div class="meta">January 9, 2018 at 2:21pm</div>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur quidem laborum necessitatibus, ipsam impedit vitae autem, eum officia, fugiat saepe enim sapiente iste iure! Quam voluptas earum impedit necessitatibus, nihil?</p>
                                                            <p><a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- END comment-list -->


                    </div>

                </div>

                <!-- END main-content -->

                <?php 
            
                $category=$_SESSION['category'];
                $ran =3;
                $sql="SELECT * FROM post where post_category='$category'".' LIMIT '.$ran ;
                $result = $db->query($sql); 
                unset($_SESSION['category']);

            ?>

                <div class="col-md-12 col-lg-4 sidebar">
                    <!-- END sidebar-box -->
                    <div class="sidebar-box">
                        <h3 class="heading">Related Posts</h3>
                        <div class="post-entry-sidebar">
                            <ul>

                                <?php foreach ($result as $row): ?>

                                <li>
                                    <a href="blog-single.php ?post=<?php echo $row['post_id']; ?>">
                                        <img src="images/post/<?php echo $row['post_image']; ?>" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                            <h4><?php echo $row['post_title']; ?></h4>
                                            <div class="post-meta">
                                                <span class="mr-2"><?php echo $row['post_time']; ?> </span> &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Technology <span>(12)</span></a></li>
                            <li><a href="#">Commercial <span>(22)</span></a></li>
                            <li><a href="#">Sports <span>(37)</span></a></li>
                            <li><a href="#">Busniess <span>(42)</span></a></li>
                            <li><a href="#">Educational<span>(14)</span></a></li>
                        </ul>
                    </div>
                    <!-- END sidebar-box -->

                    <div class="sidebar-box">
                        <h3 class="heading">Tags</h3>
                        <ul class="tags">
                            <li><a href="#">Money</a></li>
                            <li><a href="#">Lifestyle</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Freelancing</a></li>
                            <li><a href="#">Travel</a></li>
                            <li><a href="#">Adventure</a></li>
                            <li><a href="#">Food</a></li>
                            <li><a href="#">Investment</a></li>
                            <li><a href="#">Business</a></li>
                            <li><a href="#">Buy</a></li>
                        </ul>


                    </div>
                </div>
                <!-- END sidebar -->

            </div>
        </div>
    </section>


    <?php include "footer.php" ?>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>


    <script src="js/main.js"></script>



    <script>
        $(document).ready(function() {

            $('#comment_form').on('submit', function(event) {
                event.preventDefault();
                var form_data = $(this).serialize();
                $.ajax({
                    url: "add_comment.php",
                    method: "POST",
                    data: form_data,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.error != '') {
                            $('#comment_form')[0].reset();
                            $('#comment_message').html(data.error);
                            $('#comment_id').val('0');
                            load_comment();
                        }
                    }
                })
            });

            load_comment();

            function load_comment() {
                $.ajax({
                    url: "fetch_comment.php",
                    method: "POST",
                    success: function(data) {
                        $('#display_comment').html(data);
                    }
                })
            }

            $(document).on('click', '.reply', function() {
                var comment_id = $(this).attr("id");
                $('#comment_id').val(comment_id);
                $('#comment_name').focus();
            });

        });

    </script>



    < /body> < /html>
