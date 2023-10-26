<?php
include_once "../config.php";
checkAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | E - Coach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "admin_header.php";
?>
<div class="bg-success text-white px-3 py-3">
    <h2>Admin / Dashboard</h2>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-3 bg">
            <?php
            include_once "sidebar.php";
            ?>
        </div>
    <div class="col-9">
        <div class="row">
            <div class="col-3">
                <div class="card border border-danger">
                    <div class="card-body">
                        <h2><?=countRecords('students',"status='0'");?></h2>
                        <h6>Total Admission</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h2><?=countRecords('students',"status='1'");?></h2>
                        <h6>Total Students</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border border-success">
                    <div class="card-body">
                        <h2><?= countRecords('courses');?></h2>
                        <h6>Total Courses</h6>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border border-warning">
                    <div class="card-body">
                        <h2><?= countRecords('categories');?></h2>
                        <h6>Total Categories </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
    
</body>
</html>