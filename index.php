<?php
include_once "config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E - Coach | Application For Coaching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .card-hover:hover{
            background: linear-gradient(red,yellow);
            border: 0;
            color: white;
        }
    </style>
</head>
<body>

<?php
include_once "include/header.php";
?>

<div class="container-fluid px-5 w-full bg-info" style="height:500px">
    <h1 class="pt-5 text-white display-1">Welcome To E-Coaching</h1>
    <p class="text-white display-6">We explore the fascinating world of programming, learning languages like Python, JavaScript, and more. Our dynamic instructor guides us through hands-on projects, problem-solving, and debugging. It's an exciting journey of creativity and logic, where we unlock the power of code to build digital solutions.</p>
    <a href="" class="btn btn-warning btn-lg mt-3">Start Learning Now</a>
</div>

<div class="container mt-4">
    <div class="row">
        <div class="row">
            <div class="col-12">
                <h2>Category</h2>
            </div>
        </div>
        <div class="row mb-3">
            <?php
            $callingCat = callingData("categories");
            foreach($callingCat as $cat):
            ?>
            <div class="col">
               <a href="" class="text-decoration-none">
               <div class="card rounded-xl text-center card-hover">
                   <div class="card-body">
                        <h6 class="text-capitalize"><?=$cat['cat_title'];?></h6>
                   </div>
                </div>
               </a>
            </div>

            <?php endforeach;?>
        </div>
    </div>
    <div class="row">
    <div class="row">
            <div class="col-12">
                <h2>All Courses</h2>
            </div>
        </div>
        <?php
            $callingCourse = callingData("courses");
            foreach($callingCourse as $value):
        ?>
        <div class="col-md-3">
            <div class="card">
                <img src="<?=$value['image'];?>" class="card-img-top" alt="Course Image">
                <div class="card-body">
                    <h5 class="card-title"><?=$value['title'];?></h5>
                    <p class="card-text"><?=$value['description'];?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Instructor: <?=$value['instructor'];?></li>
                    <li class="list-group-item">Language: <?=$value['language'];?></li>
                    <li class="list-group-item">Price: Rs.<?=$value['discount_price'];?>/- <del>Rs.<?=$value['price'];?>/-</del></li>
                </ul>
                <div class="card-body">
                    <a href="view.php?course_id=<?=$value['course_id'];?>" class="btn btn-primary">Enroll Now</a>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>
    </div>
</div>

    
</body>
</html>