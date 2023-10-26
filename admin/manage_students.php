<?php
include_once "../config.php";
checkAdmin();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students - Admin Panel | E - Coach</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>

<?php
include_once "admin_header.php";
?>
<div class="bg-success text-white px-3 py-3">
    <h2>Admin / Manage Students</h2>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-3 bg">
            <?php
            include_once "sidebar.php";
            ?>
        </div>
        <div class="col-9">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $callingData = callingData("students","status>0");
                        foreach($callingData as $value):
                    ?>
                        <tr>
                            <td><?=$value['roll'];?></td>
                            <td><?=$value['name'];?></td>
                            <td><?=$value['contact'];?></td>
                            <td><?=$value['email'];?></td>
                            <td><?=$value['gender'];?></td>
                            <td><?=$value['address'];?></td>
                            <td><?php
                            if($value['status']==2){
                                echo "<span class='badge bg-danger text-white'>Disabled</span>";
                            }
                            else if($value['status']==1){
                                echo "<span class='badge bg-success text-white'>Active</span>";
                            }
                            ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="" class="btn btn-success">View</a>
                                    <?php
                                    if($value['status']==1):?>
                                        <a href="?disable=<?=$value['roll'];?>" class="btn btn-danger">Disabled</a>
                                    <?php endif;
                                    ?>
                                    <a href="" class="btn btn-primary">Edit</a>
                                </div>
                            </td>
                        </tr>
                    <?php  endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
    
</body>
</html>

<?php
if(isset($_GET['disable'])){
    $roll = $_GET['disable'];

    if(disableStudent($roll)){
        redirect('manage_students.php');
    }
}
?>