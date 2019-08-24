<!doctype html>
<html lang="en">

<head>
    <title>Busniess Idea Sharing</title>
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

    <?php 
       require "db.php";
    ?>

    <?php include 'navigationBar.php' ?>



    <!-- END header -->


    <?php 
    
    $results_per_page = 4;
    $sql='SELECT * FROM post';
    $result = $db->query($sql);
    $number_of_results = mysqli_num_rows($result);
    $initial = $number_of_results-4;
    $sql='SELECT * FROM post LIMIT ' . $initial . ',' .  $results_per_page;
    $result = $db->query($sql); 

        
    ?>
    <section class="site-section pt-5">
        <div class="container">
            <div class="row">


                <div class="col-md-12">


                    <div class="owl-carousel owl-theme home-slider">
                        <?php foreach ($result as $row): ?>
                        
                           <?php 
                        
                           $post = $row['post_id'];
                      $sql ="SELECT COUNT(*) AS totalComment FROM comment where post_id= '$post'"; 
                      $act = $db->query($sql);
                    foreach($act as $key){
                        
                    }
                    
                    ?>
                        
                        
                        <div>
                            <a href="blog-single.php?post=<?php echo $row['post_id']; ?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('images/post/<?php echo $row['post_image']; ?>'); ">
                                <div class="text half-to-full">
                                    <div class="post-meta">
                                        <span class="category"><?php echo $row['post_category']; ?></span>
                                        <span class="mr-2"><?php echo $row['post_time'];?></span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span>
                                        <?php
                                      echo $key['totalComment'];  
                            ?>
                                          </span>
                                    </div>
                                    <h3><?php echo $row['post_title']; ?></h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem nobis, ut dicta eaque ipsa laudantium!</p>
                                </div>
                            </a>
                        </div>
                        <?php endforeach ?>
                    </div>

                </div>

            </div>


            <?php 
            
                $ran =3;
                $sql='SELECT * FROM post';
                $result = $db->query($sql);
                $number_of_results = mysqli_num_rows($result);
                $random = rand(1,$number_of_results-2);     
                $sql='SELECT * FROM post LIMIT ' .$random.','.$ran;
                $result = $db->query($sql);
                     

            ?>


            <div class="row">
               <div class="col-md-12">
                    <h2 class="mb-4 text-center">LATEST POSTS</h2>
                </div>
                <?php foreach ($result as $row): ?>
                
                  <?php 
                     $post = $row['post_id'];
                      $sql ="SELECT COUNT(*) AS totalComment FROM comment where post_id= '$post'"; 
                      $act = $db->query($sql);
                    foreach($act as $key){
                        
                    }
                    
                    ?>
                <div class="col-md-6 col-lg-4">
                    <a href="blog-single.php?post=<?php echo $row['post_id']; ?>" class="a-block d-flex align-items-center height-md" style="background-image: url('images/post/<?php echo $row['post_image']; ?>'); ">
                        <div class="text">
                            <div class="post-meta">
                                <span class="category"><?php echo $row['post_category']; ?></span>
                                <span class="mr-2"><?php echo $row['post_time'];?></span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span> <?php
                                      echo $key['totalComment'];  
                            ?></span>
                            </div>
                            <h3><?php echo $row['post_title']; ?></h3>
                        </div>
                    </a>
                </div>
                <?php endforeach ?>
            </div>
        </div>


    </section>
    <!-- END section -->

    <?php 
    
    $results_per_page = 6;
    $sql='SELECT * FROM post';
    $result = $db->query($sql);
    $number_of_results = mysqli_num_rows($result);
    $number_of_pages = ceil($number_of_results/$results_per_page);
    
    if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }
    $this_page_first_result = ($page-1)*$results_per_page;
    $sql='SELECT * FROM post LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
    $result = $db->query($sql); 
    ?>


    <section class="site-section py-sm">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-4">ALL POSTS</h2>
                </div>
            </div>
            <div class="row blog-entries">
                <div class="col-md-12 col-lg-12 main-content">
                    <div class="row">
                        <?php foreach ($result as $row): ?>
                        
                        <?php
                      $post = $row['post_id'];
                      $sql ="SELECT COUNT(*) AS totalComment FROM comment where post_id= '$post'"; 
                      $act = $db->query($sql);
                    foreach($act as $key){
                        
                    }
                    
                    ?>
                          
                        
                        <div class="col-md-4">
                            <a href="blog-single.php?post=<?php echo $row['post_id']; ?>" class="blog-entry element-animate" data-animate-effect="fadeIn">
                                <img src="images/post/<?php echo $row['post_image']; ?>" alt="Image placeholder">
                                <div class="blog-content-body">
                                    <div class="post-meta">
                                        <span class="category"><?php echo $row['post_category']; ?></span>
                                        <span class="mr-2"><?php echo $row['post_time'];?></span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> <?php
                                      echo $key['totalComment'];  
                            ?></span>
                                    </div>
                                    <h2><?php echo $row['post_title']; ?></h2>
                                </div>
                            </a>
                        </div>
                        <?php endforeach ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page; ?>">Prev</a></li>

                                    <li class="page-item">
                                        <?php for ($page=1;$page<=$number_of_pages;$page++) { ?>
                                        <a class="page-link" href="index.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                        <?php } ?>
                                    </li>


                                    <li class="page-item"><a class="page-link" href="index.php ?page=<?php echo $page; ?>">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>

                <!-- END main-content -->


            </div>
        </div>
    </section>

    <?php include "footer.php" ?>

    
</body>

</html>
