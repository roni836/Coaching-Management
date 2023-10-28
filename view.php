<?php
include_once "config.php";

if(!isset($_GET['course_id'])){
    redirect('index.php');
}
$course_id = $_GET['course_id'];
$courseData = callingData("courses","course_id='$course_id'");

$courseData = $courseData[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$courseData['title'];?> E - Coach | Application For Coaching</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "include/header.php";
?>

<div class="container mt-5">
    <!-- Course Header -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
            <img src="<?=$courseData['image'];?>" alt="Course Image" class="img-fluid">
            </div>
        <div class="card-body">
        <p>Description: <?=$courseData['description'];?></p>
        </div>
        </div>
        </div>  
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
            <h1 class="text-capitalize"><?=$courseData['title'];?></h1>
            <p><strong>Instructor:</strong> <?=$courseData['instructor'];?></p>
            <p class="text-capitalize"><strong>Language:</strong> <?=$courseData['language'];?></p>
            <p><strong>Price:</strong> Rs. <?=$courseData['discount_price'];?><del> Rs.<?=$courseData['price'];?></del></p>
            <a href="?enroll=<?=$courseData['course_id'];?>&course_id=<?=$courseData['course_id'];?>" class="btn btn-primary">Enroll Now</a>
            </div>
            </div>
        </div>
    </div>


    <!-- Course Reviews -->
    <div class="row mt-4">
        <div class="col-md-12">
            <h2>Student Reviews</h2>
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">John Smith</h5>
                    <p class="card-text">This course is excellent! I learned a lot.</p>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">Alice Johnson</h5>
                    <p class="card-text">Highly recommended course.</p>
                </div>
            </div>
        </div>
    </div>
</div>  
</body>
</html>

<?php
if(isset($_GET['enroll'])){
    $enroll = $_GET['enroll'];

    // Check If Login Or Not
    if(!isset($_SESSION['student'])) redirect("login.php");

    $user = getUser();
    $student_id = $user['roll'];

    $data = [
        'student_id' => $student_id,
        'course_id' => $course_id
    ];
    if(insertData("student_courses",$data)){
        redirect("student/index.php");
    }
    else{
        alert('Something Went Wrong Try Again');
    }
}

?>
