<html>

<head>
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
    
    
    <?php 
     $search = $_POST['search'];
    ?>

    <?php 
    
    
     
    
     if (!isset($_GET['page'])) {
      $page = 1;
    } else {
      $page = $_GET['page'];
    }
    
    $results_per_page = 4;
    $sql='SELECT * FROM post';
    $result = $db->query($sql);
    $number_of_results = mysqli_num_rows($result);
    $number_of_pages = ceil($number_of_results/$results_per_page);
    
    $this_page_first_result = ($page-1)*$results_per_page;
    $sql="SELECT * FROM post where post_category LIKE '%$search%' OR post_title LIKE '%$search%' OR post_tag LIKE '%$search%' ". 'LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
    $result = $db->query($sql); 
    ?>



    <section class="site-section">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h2 class="mb-4">Search For: <?php echo $search; ?></h2>
                </div>
            </div>
            <div class="row blog-entries">


                <div class="col-md-12 col-lg-12 main-content">

                    <div class="row">
                        <?php foreach ($result as $row): ?>
                        <div class="col-md-6 col-sm-12">

                            <div class="post-entry-horzontal">
                                <a href="blog-single.php?post=<?php echo $row['post_id']; ?>">
                                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(images/post/<?php echo $row['post_image']; ?>"></div>
                                    <span class="text">
                                        <div class="post-meta">
                                            <span class="category"><?php echo $row['post_category']; ?></span>
                                            <span class="mr-2"><?php echo $row['post_time']; ?> </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                                        </div>
                                        <h2><?php echo $row['post_title']; ?></h2>
                                    </span>
                                </a>
                            </div>
                            <!-- END post -->

                        </div>
                        <?php endforeach ?>

                    </div>


                    <div class="row">
                        <div class="col-md-12 text-center">
                            <nav aria-label="Page navigation" class="text-center">
                                <ul class="pagination">
                                    <li class="page-item"><a class="page-link" href="search.php?page=<?php echo $page; ?>">Prev</a></li>

                                    <li class="page-item">
                                        <?php for ($page=1;$page<=$number_of_pages;$page++) { ?>
                                        <a class="page-link" href="search.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                                        <?php } ?>
                                    </li>

                                    <li class="page-item"><a class="page-link" href="search.php ?page=<?php echo $page; ?>">Next</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include "footer.php"?>


</body>


</html>
