<!<?php
include_once "../config.php";

$user = getUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Coach | Application For Coaching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
  <!-- Container wrapper -->
  <div class="container">
    <!-- Navbar brand -->
    <a class="navbar-brand me-2" href="../index.php">
      <h2>E - Coach</h2>
    </a>

    <!-- Toggle button -->
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarButtonsExample"
      aria-controls="navbarButtonsExample"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="bi bi-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div>    
      <div class="d-flex align-items-center ms-auto gap-3">
        <a href="" class="text-decoration-none fw-bold text-capitalize"> <strong><?=$user['name'];?></strong></a>
        <a href="logout.php" type="button" class="btn btn-danger me-2">
          Logout
        </a>
      </div>
    </div>
    <!-- Collapsible wrapper -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->

<div class="container mt-5">
    <div class="row">
       <div class="col-md-8">
        <h1>My Courses</h1>
        <?php
            $callingMyCourses = callingData("student_courses JOIN courses ON student_courses.course_id=courses.course_id");
            foreach($callingMyCourses as $value):
        ?>

        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../admin/images/courses/<?=$value['image'];?>" class="img-fluid rounded-start" alt="">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?=$value['title'];?></h5>
                        <p class="card-text"><?=$value['description'];?></p>
                        <p class="card-text"> Rs. <?=$value['discount_price'];?> Rs.<del><?=$value['price'];?></del></p>
                    <?php
                        if(!$value['payment_id']):
                    ?>
                    <a href="" class="btn btn-success">Pay Now</a>
                    <?php endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
       </div>
        

        <!-- Payment Information -->
        <div class="col-md-4">
            <h1>Payments</h1>
            <div class="card">
                <div class="card-body">
                    <p><strong>Payment Status:</strong> Paid</p>
                    <p><strong>Next Payment Date:</strong> 2023-11-01</p>
                    <p><strong>Payment Amount:</strong> $99.99</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@2.11.6/dist/umd/popper.min.js"></script>

</body>
</html>
